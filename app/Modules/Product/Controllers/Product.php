<?php

namespace App\Modules\Product\Controllers;

use App\Controllers\BaseController;
use App\Modules\Product\Models\ProductModel;
use App\Modules\Category\Models\CategoryModel;

class Product extends BaseController
{
    protected $productModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
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
    public function index()
    {
        if ($this->checkLoggedIn() !== true) return $this->checkLoggedIn();

        $data = [
            'title' => 'Product Management',
            'content' => 'App\Modules\Product\Views\v_product',
            'getData' => $this->productModel->getAllProducts()
        ];

        return view('App\Views\template', $data);
    }

    public function addProduct()
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();

        $data = [
            'title' => 'Add Product',
            'content' => 'App\Modules\Product\Views\v_add_product',
            'categories' => $this->categoryModel->findAll()
        ];
        return view('App\Views\template', $data);
    }

    public function create()
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();

        $data = $this->request->getPost();

        if (isset($data['category_id'])) {
            $data['category_id'] = (int)$data['category_id'];
        }
        if (isset($data['harga'])) {
            $data['harga'] = (float)$data['harga'];
        }

        $this->productModel->insertProduct($data);
        return redirect()->to(base_url('product'));
    }

    public function edit($id)
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();

        $data = [
            'title' => 'Edit Product',
            'content' => 'App\Modules\Product\Views\v_edit_product',
            'getData' => $this->productModel->getProductById($id),
            'id' => $id,
            'categories' => $this->categoryModel->findAll()
        ];
        return view('App\Views\template', $data);
    }

    public function update($id)
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();

        $data = $this->request->getPost();
        $this->productModel->updateProduct($id, $data);
        return redirect()->to(base_url('product'));
    }

    public function delete($id)
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();

        $this->productModel->deleteProduct($id);
        return redirect()->to(base_url('product'));
    }
}
