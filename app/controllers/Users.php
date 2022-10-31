<?php

class Users extends Controller
{
    public function __construct()
    {

    }

    public function register()
    {
        // Check for POST (form submission)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Process form
        } else {
            // Init data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirmPassword' => '',
                'nameErr' => '',
                'emailErr' => '',
                'passwordErr' => '',
                'confirmPasswordErr' => '',
            ];

            // Load view
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        // Check for POST (form submission)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Process form
        } else {
            // Init data
            $data = [
                'email' => '',
                'password' => '',
                'emailErr' => '',
                'passwordErr' => '',
            ];

            // Load view
            $this->view('users/login', $data);
        }
    }
}
