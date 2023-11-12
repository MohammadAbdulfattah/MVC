<?php
// app/models/UserModel.php
namespace M;
class UserModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getUsers()
    {
        return $this->db->get('users');
    }
    public function getUserByID($userID)
    {
        $this->db->Where('userID',$userID);
        return $this->db->get('users');
    }

    public function addUser($data)
    {
        return $this->db->insert('users', $data);
    }
    public function editUser($data,$userID)
    {
        
        $this->db->Where('userID',$userID);
        return $this->db->update('users', $data);
    }
    public function deleteUser($userID)
    {
        $this->db->Where('userID', $userID);
        $this->db->delete('users');
    }
}