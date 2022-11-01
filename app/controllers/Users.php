<?php

class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        // Check for POST (form submission)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process form
            $name = $email = $password = $confirmPassword = '';

            // Sanitize POST data
            $name = trim(htmlspecialchars($_POST['name']));
            $email = trim(htmlspecialchars($_POST['email']));
            $password = trim(htmlspecialchars($_POST['password']));
            $confirmPassword = trim(htmlspecialchars($_POST['confirmPassword']));

            // Init data
            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'confirmPassword' => $confirmPassword,
                'nameErr' => '',
                'emailErr' => '',
                'passwordErr' => '',
                'confirmPasswordErr' => '',
            ];

            // Vaidate Name
            if (empty($data['name'])) {
                $data['nameErr'] = 'Please enter your name.';
            }

            // Vaidate Email
            if (empty($data['email'])) {
                $data['emailErr'] = 'Please enter your email address.';
            } else {
                // Check email
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['emailErr'] = 'Email address is already taken.';
                }
            }

            // Vaidate Password
            if (empty($data['password'])) {
                $data['passwordErr'] = 'Please enter a password.';
            } elseif (strlen(($data['password'])) < 12) {
                $data['passwordErr'] = 'Password must be at least 12 characters long.';
            }

            // Vaidate ConfirmPassword
            if (empty($data['confirmPassword'])) {
                $data['confirmPasswordErr'] = 'Please confirm your password.';
            } elseif ($data['confirmPassword'] !== $data['password']) {
                $data['confirmPasswordErr'] = 'Passwords do not match.';
            }

            // Make sure errors are empty
            if (
                empty($data['nameErr'])
                && empty($data['emailErr'])
                && empty($data['passwordErr'])
                && empty($data['confirmPasswordErr'])
            ) {
                //Vaidated

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if ($this->userModel->register($data)) {
                    flash('registerSuccess', 'You are now registered and can now log in.');
                    redirect('users/login');
                } else {
                    die('Something went wrong.');
                }
            } else {
                // Load view with errors
                $this->view('users/register', $data);
            }
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
            $email = $password = '';

            // Sanitize POST data
            $email = trim(htmlspecialchars($_POST['email']));
            $password = trim(htmlspecialchars($_POST['password']));

            // Init data
            $data = [
                'email' => $email,
                'password' => $password,
                'emailErr' => '',
                'passwordErr' => '',
            ];

            // Vaidate Email
            if (empty($data['email'])) {
                $data['emailErr'] = 'Please enter your email address.';
            }

            // Vaidate Password
            if (empty($data['password'])) {
                $data['passwordErr'] = 'Please enter a password.';
            }

            // Make sure errors are empty
            if (
                empty($data['nameErr'])
                && empty($data['passwordErr'])
            ) {
                //Vaidated
                die('success');
            } else {
                // Load view with errors
                $this->view('users/login', $data);
            }
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
