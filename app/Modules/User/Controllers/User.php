<?php
namespace App\Modules\User\Controllers;

use App\Controllers\BaseController;
use App\Modules\User\Models\UserModel;


class User extends BaseController {
    protected $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }
    public function index() {
        $data = [
            'title' => 'User Management',
            'content' => 'App\Modules\User\Views\v_user',
            'getData' => $this->userModel->getAllData() 
        ];
        return view('App\Views\template', $data);
    }

    
    public function addUser() {
        $data = [
            'title' => 'Add User',
            'content' => 'App\Modules\User\Views\v_add_user',
        ];
        return view('App\Views\template', $data);
    
    }

    public function create() {
        $data = $this->request->getPost();
        $this->userModel->insertData($data);
        return redirect()->to(base_url('user'));
    }

    public function edit($id) {
        $data = [
            'title' => 'Edit User',
            'content' => 'App\Modules\User\Views\v_edit_user',
            'getData' => $this->userModel->getDataById($id),
            'id' => $id
        ];
        
        return view('App\Views\template', $data);
    }

    public function update($id) {
        $data = $this->request->getPost();
        $this->userModel->updateData($id, $data);
        return redirect()->to(base_url('user'));
    }

    public function delete($id) {
        $this->userModel->deleteData($id);
        return redirect()->to(base_url('user'));
    }
}
