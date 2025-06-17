<?php
namespace App\Modules\Category\Controllers;

use App\Controllers\BaseController;
use App\Modules\Category\Models\CategoryModel;

class Category extends BaseController {
    protected $categoryModel;

    public function __construct() {
        $this->categoryModel = new CategoryModel();
    }

    public function index() {
        $data = [
            'title' => 'Category Management',
            'content' => 'App\Modules\Category\Views\v_category',
            'getData' => $this->categoryModel->getAllData() 
        ];
        return view('App\Views\template', $data);
    }

    public function addCategory() {
        $data = [
            'title' => 'Add Category',
            'content' => 'App\Modules\Category\Views\v_add_category',
        ];
        return view('App\Views\template', $data);
    }

    public function create() {
        $data = $this->request->getPost();
        $this->categoryModel->insertData($data);
        return redirect()->to(base_url('category'));
    }

    public function edit($id) {
        $data = [
            'title' => 'Edit Category',
            'content' => 'App\Modules\Category\Views\v_edit_category',
            'getData' => $this->categoryModel->getDataById($id),
            'id' => $id
        ];
        
        return view('App\Views\template', $data);
    }

    public function update($id) {
        $data = $this->request->getPost();
        $this->categoryModel->updateData($id, $data);
        return redirect()->to(base_url('category'));
    }

    public function delete($id) {
        $this->categoryModel->deleteData($id);
        return redirect()->to(base_url('category'));
    }
}
