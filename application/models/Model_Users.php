<?php
class Model_Users extends Model
{



    public function get_data()
    {
        $query ="SELECT * FROM users";
        $result = mysqli_query($this->link, $query) or die("Ошибка " . mysqli_error(($this->link)));

        return $result->fetch_all();
    }

    public function login($login, $password)
    {
        $query ="SELECT login FROM users WHERE login = '{$login}' AND password = md5('{$password}')";
        $result = mysqli_query($this->link, $query) or die("Ошибка " . mysqli_error(($this->link)));

        $result = $result->fetch_all();
        if ($result[0]) {
            return $result[0][0];
        }else {
            return false;
        }
    }
}