<?php


class Controller_Main extends Controller
{

    function __construct()
    {
        $this->add_model('Model_Users');
        $this->add_model('Model_Task');

        $this->model = new Model_Main();
        $this->view = new View();

    }

    function index()
    {
        $data = $this->model->get_data();

        $user_model = new Model_Users();
        $data['users'] = $user_model->get_data();

        $data['action'] = '/user/login';

        $modal_tasks = new Model_Task();

        $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        $parts = parse_url($url);
        parse_str($parts['query'], $query);

        $data['url_pagination'] = '';
        foreach ($query as $key => $item) {
            if ($key != 'page') {
                $data['url_pagination'] .= '&' . $key . '=' . $item;
            }
        }

        $data['sord_def_active'] = false;
        $data['user_name_asc_active'] = false;
        $data['user_name_desc_active'] = false;
        $data['user_email_asc_active'] = false;
        $data['user_email_desc_active'] = false;
        $data['status_asc_active'] = false;
        $data['status_desc_active'] = false;

        if (isset($query['sort'])) {

            if ($query['sort'] == 'user_name' && $query['sort_type'] == 'ASC') {
                $data['user_name_asc_active'] = true;
            }
            if ($query['sort'] == 'user_name' && $query['sort_type'] == 'DESC') {
                $data['user_name_desc_active'] = true;
            }

            if ($query['sort'] == 'user_email' && $query['sort_type'] == 'ASC') {
                $data['user_email_asc_active'] = true;
            }
            if ($query['sort'] == 'user_email' && $query['sort_type'] == 'DESC') {
                $data['user_email_desc_active'] = true;
            }

            if ($query['sort'] == 'status' && $query['sort_type'] == 'ASC') {
                $data['status_asc_active'] = true;
            }
            if ($query['sort'] == 'status' && $query['sort_type'] == 'DESC') {
                $data['status_desc_active'] = true;
            }

        }else {
            $data['sord_def_active'] = true;
        }

        if (isset($query['page'])) {
            $data['sord_def'] = '/?page=' . $query['page'];
            $data['user_name_asc'] = '/?sort=user_name&sort_type=ASC&page='. $query['page'];
            $data['user_name_desc'] = '/?sort=user_name&sort_type=DESC&page='. $query['page'];
            $data['user_email_asc'] = '/?sort=user_email&sort_type=ASC&page='. $query['page'];
            $data['user_email_desc'] = '/?sort=user_email&sort_type=DESC&page='. $query['page'];
            $data['status_asc'] = '/?sort=status&sort_type=ASC&page='. $query['page'];
            $data['status_desc'] = '/?sort=status&sort_type=DESC&page='. $query['page'];

        }else {
            $data['sord_def'] = '/';
            $data['user_name_asc'] = '/?sort=user_name&sort_type=ASC';
            $data['user_name_desc'] = '/?sort=user_name&sort_type=DESC';
            $data['user_email_asc'] = '/?sort=user_email&sort_type=ASC';
            $data['user_email_desc'] = '/?sort=user_email&sort_type=DESC';
            $data['status_asc'] = '/?sort=status&sort_type=ASC';
            $data['status_desc'] = '/?sort=status&sort_type=DESC';
        }


        $filter = '';
        if (isset($_GET['sort'])) {
            $filter .= ' ORDER BY '. $_GET['sort'];
        }

        if (isset($_GET['sort_type'])) {
            $filter .= ' '. $_GET['sort_type'];
        }


        $filter .= ' LIMIT 3';
        if (isset($_GET['page'])) {
            $filter .= ' OFFSET ' . ($_GET['page']-1)*3;
        }





        $data['tasks'] = $modal_tasks->get_data($filter);

        $data['count_tasks'] = $modal_tasks->get_count();
        $data['count_tasks'] = ceil($data['count_tasks'][0][0] / 3);

        $this->view->generate('main_view.php', 'template_view.php', $data);
    }

}