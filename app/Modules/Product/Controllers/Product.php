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

    public function index()
    {
        $data = [
            'title' => 'Product Management',
            'content' => 'App\Modules\Product\Views\v_product',
            'getData' => $this->productModel->getAllProducts()
        ];
        
        return view('App\Views\template', $data);
    }

    public function addProduct()
    {
        $data = [
            'title' => 'Add Product',
            'content' => 'App\Modules\Product\Views\v_add_product',
            'categories' => $this->categoryModel->findAll()
        ];
        return view('App\Views\template', $data);
    }

    public function create()
    {
        $data = $this->request->getPost();

        if (isset($data['category_id'])) {
            $data['category_id'] = (int)$data['category_id'];
        }
        if (isset($data['harga'])) {
            $data['harga'] = (double)$data['harga'];
        }

        $this->productModel->insertProduct($data);
        return redirect()->to(base_url('product'));
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Product',
            'content' => 'App\Modules\Product\Views\v_edit_product',
            'getData' => $this->productModel->getProductById($id),
            'id' => $id
        ];
        return view('App\Views\template', $data);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $this->productModel->updateProduct($id, $data);
        return redirect()->to(base_url('product'));
    }

    public function delete($id)
    {
        $this->productModel->deleteProduct($id);
        return redirect()->to(base_url('product'));
    }
}
