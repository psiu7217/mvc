<?php
class Controller_Tasks extends Controller
{
    function __construct()
    {
        $this->add_model('Model_Task');
        $this->model = new Model_Task();
        $this->view = new View();
    }

    function index()
    {
        $data = $this->model->get_data();

        $data['action'] = '/tasks/add';

        $this->view->generate('task_add_view.php', 'template_view.php', $data);
    }

    function add()
    {
        $result = false;
        $error = false;

        if (isset($_GET['title']) && $_GET['title']) {
            $title = $_GET['title'];
        }else {
            $error = true;
        }

        if (isset($_GET['description'])) {
            $description = $_GET['description'];
        }else {
            $error = true;
        }

        if (isset($_GET['user_email']) && $_GET['user_email']) {
            $user_email = $_GET['user_email'];
        }else {
            $error = true;
        }

        if (isset($_GET['user_name']) && $_GET['user_name']) {
            $user_name = $_GET['user_name'];
        }else {
            $error = true;
        }

        if (!$error) {
            $this->model->add_task($title, $user_name, $user_email, $description);
//            echo $title .'; <br>';
//            echo $user_name .'; <br>';
//            echo $user_email .'; <br>';
//            echo $description .'; <br>';
        }else {
            echo 'Error';
        }

    }

    function edit()
    {

        if (isset($_COOKIE['login_user']) && $_COOKIE['login_user'] =='admin'
        && isset($_GET['id']) && $_GET['id']) {

            $data['info'] = $this->model->get_item($_GET['id']);

            $data['action'] = '/tasks/update';

            $this->view->generate('task_edit_view.php', 'template_view.php', $data);
        }else {
            header('Location: /');
        }

    }

    public function update()
    {
        $error = false;

        if (isset($_GET['id']) && $_GET['id']) {
            $id = $_GET['id'];
        }else {
            $error = true;
        }


        if (isset($_GET['title']) && $_GET['title']) {
            $title = $_GET['title'];
        }else {
            $error = true;
        }


        if (isset($_GET['description'])) {
            $description = $_GET['description'];
        }else {
            $error = true;
        }

        if (isset($_GET['old_description'])) {
            $old_description = $_GET['old_description'];
        }else {
            $error = true;
        }

        if (isset($_GET['user_email']) && $_GET['user_email']) {
            $user_email = $_GET['user_email'];
        }else {
            $error = true;
        }

        if (isset($_GET['user_name']) && $_GET['user_name']) {
            $user_name = $_GET['user_name'];
        }else {
            $error = true;
        }

        if (isset($_GET['status'])) {
            $status = $_GET['status'];
        }else {
            $error = true;
        }



        if (!$error) {
            if ($old_description == $description) {
                $edit = 0;
            }else {
                $edit = 1;
            }
            if (isset($_COOKIE['login_user']) && $_COOKIE['login_user'] =='admin') {
                $this->model->update_task($id, $title, $user_name, $user_email, $description, $status, $edit);
            }else {
                echo 'Error';
            }

//            echo $id .'; <br>';
//            echo $title .'; <br>';
//            echo $user_name .'; <br>';
//            echo $user_email .'; <br>';
//            echo $description .'; <br>';
//            echo $status .'; <br>';
//            echo $edit .'; <br>';

        }else {
            echo 'Error';
        }
    }
}