<?php
namespace App\Modules\Product\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    
    protected $allowedFields = [
        'nama', 
        'deskripsi', 
        'harga', 
        'category_id'
    ];
    
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $returnType = 'object';

    public function getAllProducts()
    {
        return $this->select('id, nama, deskripsi, harga, category_id, created_at, updated_at')
                    ->findAll();
    }
    
    public function getProductsWithCategory()
    {
        return $this->select('products.*, categories.name as category_name')
                    ->join('categories', 'categories.id = products.category_id', 'left')
                    ->findAll();
    }
    
    public function getProductById($id)
    {
        return $this->find($id);
    }
    
    public function getProductWithCategory($id)
    {
        return $this->select('products.*, categories.name as category_name')
                    ->join('categories', 'categories.id = products.category_id', 'left')
                    ->find($id);
    }
    
    public function insertProduct($data)
    {
        return $this->insert($data);
    }
    
    public function updateProduct($id, $data)
    {
        return $this->update($id, $data);
    }
    
    public function deleteProduct($id)
    {
        return $this->delete($id);
    }
    
    public function getProductsByCategory($categoryId)
    {
        return $this->where('category_id', $categoryId)->findAll();
    }
    
    public function searchProducts($keyword)
    {
        return $this->groupStart()
                    ->like('nama', $keyword)
                    ->orLike('deskripsi', $keyword)
                    ->groupEnd()
                    ->findAll();
    }
    
    public function getProductsPaginated($limit = 10, $offset = 0)
    {
        return $this->limit($limit, $offset)->findAll();
    }
    
    public function getProductsByPriceRange($minPrice, $maxPrice)
    {
        return $this->where('harga >=', $minPrice)
                    ->where('harga <=', $maxPrice)
                    ->findAll();
    }
    
    public function getLatestProducts($limit = 5)
    {
        return $this->orderBy('created_at', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }
    
    public function countProductsByCategory($categoryId)
    {
        return $this->where('category_id', $categoryId)->countAllResults();
    }
    
    // Get product statistics
    public function getProductStats()
    {
        return [
            'total_products' => $this->countAll(),
            'avg_price' => $this->selectAvg('harga')->get()->getRow()->harga,
            'min_price' => $this->selectMin('harga')->get()->getRow()->harga,
            'max_price' => $this->selectMax('harga')->get()->getRow()->harga
        ];
    }
}