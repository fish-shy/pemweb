<?php
namespace App\Modules\User\Controllers;

use App\Controllers\BaseController;
use App\Modules\User\Models\UserModel;

class User extends BaseController {
    protected $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }
    
    private function checkAdminAccess() {
        if(!session()->get('logged_in') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('login'));
        }
        return true;
    }
    
    public function index() {
        if($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $data = [
            'title' => 'User Management',
            'content' => 'App\Modules\User\Views\v_user',
            'getData' => $this->userModel->getAllData() 
        ];
        return view('App\Views\template', $data);
    }
    
    public function addUser() {
        if($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $data = [
            'title' => 'Add User',
            'content' => 'App\Modules\User\Views\v_add_user',
        ];
        return view('App\Views\template', $data);
    }

    public function create() {
        if($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $data = $this->request->getPost();
        $this->userModel->insertData($data);
        return redirect()->to(base_url('user'));
    }

    public function edit($id) {
        if($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $data = [
            'title' => 'Edit User',
            'content' => 'App\Modules\User\Views\v_edit_user',
            'getData' => $this->userModel->getDataById($id),
            'id' => $id
        ];
        return view('App\Views\template', $data);
    }

    public function update($id) {
        if($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $data = $this->request->getPost();
        $this->userModel->updateData($id, $data);
        return redirect()->to(base_url('user'));
    }

    public function delete($id) {
        if($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $this->userModel->deleteData($id);
        return redirect()->to(base_url('user'));
    }
}
