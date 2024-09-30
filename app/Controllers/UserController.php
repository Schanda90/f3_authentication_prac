<?php
namespace Controllers;

class UserController {
    private $f3;
    private $db;

    public function __construct() {
        $this->f3 = \Base::instance();
        $this->db = new \DB\SQL('mysql:host=localhost;port=3306;dbname=f3loginDB', 'root', '');
        session_start();
    }

    public function login() {
        // $this->f3->set('SESSION.csrf', bin2hex(random_bytes(32)));
        if ($this->f3->exists('POST.email') && $this->f3->exists('POST.password')) {
            $email = $this->f3->get('POST.email');
            $password = $this->f3->get('POST.password');

            // $submittedToken = $this->f3->get('POST.csrf_token');
            // $storedToken = $this->f3->get('SESSION.csrf');
            // if ($submittedToken !== $storedToken) {
            //     $this->f3->set('error', 'Invalid CSRF token');
            //     $this->f3->reroute('/login');
            // }


            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->f3->set('error', 'Invalid email format');
            } elseif (empty($password)) {
                $this->f3->set('error', 'Password is required');
            } else {
                $user = new \Models\User($this->db);
                $userData = $user->authenticate($email, $password);
                if ($userData && $userData[0]) {
                    $this->f3->set('SESSION.user', $userData[1]['name']);
                    $this->f3->reroute('/dashboard');
                } else {
                    $this->f3->set('error', 'Invalid credentials');
                }
            }
        }

        if (!$this->f3->exists('error')) {
            $this->f3->set('error', '');
        }

        $this->f3->set('title', 'Login');
        echo \Template::instance()->render('app/views/login.html');
    }

    public function signup() {
        // $this->f3->set('SESSION.csrf', bin2hex(random_bytes(32)));
        if ($this->f3->exists('POST.email')) {
            $name = $this->f3->get('POST.name');
            $email = $this->f3->get('POST.email');
            $password = $this->f3->get('POST.password');

            // $submittedToken = $this->f3->get('POST.csrf_token');
            // $storedToken = $this->f3->get('SESSION.csrf');
            // if ($submittedToken !== $storedToken) {
            //     $this->f3->set('error', 'Invalid CSRF token');
            //     $this->f3->reroute('/signup');
            // }

            if (empty($name) || empty($email) || empty($password)) {
                $this->f3->set('error', 'All fields are required');
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->f3->set('error', 'Invalid email format');
            } else {
                $user = new \Models\User($this->db);
                // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $user->create($name, $email, $password);
                $this->f3->reroute('/login');
            }
        }

        if (!$this->f3->exists('error')) {
            $this->f3->set('error', '');
        }


        $this->f3->set('title', 'Sign Up');
        echo \Template::instance()->render('app/views/signup.html');
    }

    public function dashboard() {
        if (!$this->f3->exists('SESSION.user')) {
            $this->f3->reroute('/login');
        }
        
        $this->f3->set('title', 'Dashboard');
        $userName = $this->f3->get('SESSION.user');
        echo $userName. ' '. var_dump($userName);
        echo \Template::instance()->render('app/views/dashboard.html');
    }

    public function logout() {
        session_unset();
        // $this->f3->clear('SESSION');
        session_destroy();
        $this->f3->reroute('/');
    }

    public function dd() {
        echo "hello";
    }
}
