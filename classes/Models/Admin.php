<?php

namespace TechStore\Classes\Models;

use  TechStore\Classes\Db;
use TechStore\Classes\Session;


class Admin extends Db
{

    public function __construct()
    {
        $this->table = 'admins';
        $this->connect();
    }

    // login
    public function login(string $email, string $password, Session $session)
    {

        $sql = "SELECT * FROM `$this->table` WHERE `email`='$email' LIMIT 1";
        $query = mysqli_query($this->connectation, $sql);
        $admin = mysqli_fetch_assoc($query);

        if (!empty($email)) {
            $passwordHash = $admin['password'];
            $isSame = password_verify($password, $passwordHash);
            if ($isSame) {
                $session->set('adminId', $admin['id']);
                $session->set('adminEmail', $admin['email']);
                $session->set('adminName', $admin['name']);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    // logout
    public function logout( Session $session)
    {
        $session->remove('adminId');
        $session->remove('adminEmail');
        $session->remove('adminName');

    }
}
