<?php
namespace App\Modules\Category\Controllers;

use App\Controllers\BaseController;
use App\Modules\Category\Models\CategoryModel;

class Category extends BaseController {
    protected $categoryModel;

    public function __construct() {
        $this->categoryModel = new CategoryModel();
    }

        private function checkAdminAccess()
    {
        if (!session()->get('logged_in') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('login'));
        }
        return true;
    }
    private function checkLoggedIn()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }
        return true;
    }

    public function index() {
        if ($this->checkLoggedIn() !== true) return $this->checkLoggedIn();
        $data = [
            'title' => 'Category Management',
            'content' => 'App\Modules\Category\Views\v_category',
            'getData' => $this->categoryModel->getAllData() 
        ];
        return view('App\Views\template', $data);
    }

    public function addCategory() {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        $data = [
            'title' => 'Add Category',
            'content' => 'App\Modules\Category\Views\v_add_category',
        ];
        return view('App\Views\template', $data);
    }

    public function create() {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        $data = $this->request->getPost();
        $this->categoryModel->insertData($data);
        return redirect()->to(base_url('category'));
    }

    public function edit($id) {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        $data = [
            'title' => 'Edit Category',
            'content' => 'App\Modules\Category\Views\v_edit_category',
            'getData' => $this->categoryModel->getDataById($id),
            'id' => $id
        ];
        
        return view('App\Views\template', $data);
    }

    public function update($id) {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        $data = $this->request->getPost();
        $this->categoryModel->updateData($id, $data);
        return redirect()->to(base_url('category'));
    }
    
    public function delete($id) {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        $this->categoryModel->deleteData($id);
        return redirect()->to(base_url('category'));
    }
}
