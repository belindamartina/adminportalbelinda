<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentsModel extends Model
{
    protected $table = 'students';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'Photo', 'sn', 'email', 'phone', 'adress'];

    public function getStudent($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function search($keyword)
    {
        return $this->table('students')->like('name', $keyword)->orLike('sn', $keyword);
    }
}
