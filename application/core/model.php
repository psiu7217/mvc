<?php
class Model
{
    public $link;

    public function __construct()
    {
        $host = 'localhost'; // адрес сервера
        $database = 'jb-test'; // имя базы данных
        $user = 'root'; // имя пользователя
        $password = ''; // пароль


        $this->link  = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($this->link));

    }

    public function __destruct()
    {
        // закрываем подключение
        mysqli_close($this->link);

    }

    public function get_data()
    {
    }
}