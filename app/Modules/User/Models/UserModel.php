<?php

namespace App\Modules\User\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'email', 'password', 'role'];
    protected $useTimestamps = true;
    protected $returnType = 'object';

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (!isset($data['data']['password'])) {
            return $data;
        }

        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        return $data;
    }

    public function getAllData()
    {
        return $this->select('id, nama, email, role, created_at, updated_at')->findAll();
    }

    public function insertData($data)
    {
        return $this->insert($data);
    }
    public function getDataById($id)
    {
        return $this->select('nama, email, role,password')->find($id);
    }
    public function updateData($id, $data)
    {
        return $this->update($id, $data);
    }
    public function deleteData($id)
    {
        return $this->delete($id);
    }

    public function isEmailExists($email)
    {
        return $this->where('email', $email)->countAllResults() > 0;
    }
    public function authenticate($email, $password)
    {
        $user = $this->where('email', $email)->first();

        if (!$user || !password_verify($password, $user->password)) {
            return false;
        }

        return $user;
    }
}
