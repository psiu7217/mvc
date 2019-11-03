<?php
class Controller_User extends Controller
{
    function __construct()
    {
        $this->add_model('Model_Users');
        $this->model = new Model_Users();
        $this->view = new View();
    }

    function index()
    {
        $data = $this->model->get_data();
        $data['action'] = '/user/login';
//        $_COOKIE['login_user'] = 'test';
//        setcookie("login_user", 'test');
//        print_r($_COOKIE);
        $this->view->generate('user_view.php', 'template_view.php', $data);

    }

    function login()
    {

        $result = false;
        if (isset($_GET['login']) && $_GET['login']
        && isset($_GET['password']) && $_GET['password']) {
            $result = $this->model->login($_GET['login'], $_GET['password']);
        }

        if ($result) {
            echo $result;

        }else {
            echo 'Error';
        }

    }

}