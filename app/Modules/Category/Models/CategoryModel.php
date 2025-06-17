<?php

namespace App\Modules\Category\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'deskripsi'];
    protected $useTimestamps = true;
    protected $returnType = 'object';

    public function getAllData()
    {
        return $this->select('id, nama, deskripsi, created_at, updated_at')->findAll();
    }

    public function insertData($data)
    {
        return $this->insert($data);
    }

    public function getDataById($id)
    {
        return $this->find($id);
    }

    public function updateData($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteData($id)
    {
        return $this->delete($id);
    }
}