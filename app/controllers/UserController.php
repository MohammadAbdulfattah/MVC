<?php
// app/controllers/UserController.php
namespace C;

use M\UserModel;
class UserController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index() {
        $users = $this->model->getUsers();
        
        include 'app/views/user_list.php';
    }
    public function getUserByID($userID='') {
        $userInfo = $this->model->getUserByID($_GET['userID']);
        
        include 'app/views/userInfo.php';
    }
    public function showUsers() {
        $users = $this->model->getUsers();
        
        include 'app/views/userInfo.php';
    }

    public function addUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userName=$_POST['userName'];
            $password=$_POST['password'];
            $role = $_POST['role'];
            $data = [
                'userName' =>$userName ,
                'password' => $password ,
                'role' => $role
            ];
            
            if ($this->model->addUser($data)) {
                echo "User added successfully!";
                header("REFRESH:0 ; URL=".BASE_PATH);
            } else {
                echo "Failed to add user.";
            }
        }
    }
    public function editUser($userID='')
    {
        $users = $this->model->getUserByID($_GET['userID']);
        include 'app/views/editUserInfo.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userName = $_POST['userName'];
            $password = $_POST['password'];
            $role = $_POST['role'];
            $data = [
                'userName' => $userName,
                'password' => $password,
                'role' => $role
            ];

            if ($this->model->editUser($data,$_GET['userID'])) {
                echo "User edited successfully!";
                header("REFRESH:0 ; URL= ".BASE_PATH);
            } else {
                echo "Failed to edit user.";
            }
        }
    }
    public function deleteUser(){
        $this->model->deleteUser($_GET["userID"]);
        header('Location: '.BASE_PATH);
    }
}
?>
