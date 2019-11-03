<?php

class Model_Task extends Model
{

    public function get_data($filter = false)
    {
        $query ="SELECT * FROM tasks " . $filter;

//        print_r($query);
//        exit;
        $result = mysqli_query($this->link, $query) or die("Ошибка " . mysqli_error(($this->link)));

        return $result->fetch_all();
    }

    public function add_task($title, $user_name, $user_email, $description)
    {
        $description = mysqli_real_escape_string($this->link, $description);
        $query ="INSERT INTO tasks (title, description, user_email, user_name) VALUES ('{$title}','{$description}','{$user_email}','{$user_name}')";
        $result = mysqli_query($this->link, $query) or die("Ошибка " . mysqli_error(($this->link)));

        return true;
    }

    public function update_task($id, $title, $user_name, $user_email, $description, $status, $edit)
    {
        $description = mysqli_real_escape_string($this->link, $description);
        $query ="UPDATE tasks SET title='{$title}', description='{$description}', status='{$status}', edit={$edit}, user_email='{$user_email}', user_name='{$user_name}' WHERE id = {$id}";
        $result = mysqli_query($this->link, $query) or die("Ошибка " . mysqli_error(($this->link)));

        return true;
    }

    public function get_count() {
        $query ="SELECT count(id) FROM tasks ";
        $result = mysqli_query($this->link, $query) or die("Ошибка " . mysqli_error(($this->link)));

        return $result->fetch_all();
    }

    public function get_item($id)
    {
        $query ="SELECT * FROM tasks WHERE id = {$id}";

        $result = mysqli_query($this->link, $query) or die("Ошибка " . mysqli_error(($this->link)));

        return $result->fetch_all();
    }


}