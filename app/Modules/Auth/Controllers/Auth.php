<?php

namespace App\Modules\Auth\Controllers;

use App\Controllers\BaseController;
use App\Modules\User\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        $data = [
            'title' => 'Login',
            'validation' => \Config\Services::validation(),
        ];
        return view('App\Modules\Auth\Views\v_login', $data);
    }

    public function processLogin()
    {
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required'
        ];
        if (!$this->validate($rules)) {
            return redirect()->to('/login')->withInput()->with('validation', $this->validator);
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $this->userModel->authenticate($email, $password);

        if ($user) {
            $sessionData = [
                'id' => $user->id,
                'nama' => $user->nama,
                'email' => $user->email,
                'role' => $user->role,
                'logged_in' => true
            ];
            session()->set($sessionData);

            return redirect()->to('');
        } else {
            return redirect()->to('/login')->with('error', 'Invalid email or password');
        }
    }

    public function register()
    {
        $data = [
            'title' => 'Register',
            'validation' => \Config\Services::validation(),
        ];
        return view('App\Modules\Auth\Views\v_register', $data);
    }

    public function processRegister()
    {
        $rules = [
            'nama' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/register')->withInput()->with('validation', $this->validator);
        }

        $email = $this->request->getPost('email');

        if ($this->userModel->isEmailExists($email)) {
            return redirect()->to('/register')->withInput()->with('error', 'Email already exists');
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $email,
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => 'user'
        ];

        $this->userModel->insertData($data);

        return redirect()->to('/login')->with('success', 'Registration successful. Please login.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
