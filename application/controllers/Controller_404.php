<?php
class Controller_404 extends Controller
{
    function index()
    {
        $this->view->generate('Page_404.php', 'template_view.php');
    }
}