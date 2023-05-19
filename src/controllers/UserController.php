<?php

class UserController 
{
    public function getUsers()
    {
        $users = ['Alice', 'Pedro','Jhon'];
        echo json_encode($users);
    }

    public function getUserById()
    {
        //Logica para capturar o usuario por id
        
        
        $id = $_GET['id'];
        echo json_encode($id);
    }
}