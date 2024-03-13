<?php

namespace App\Models;

use CodeIgniter\Model;

class StockModel extends Model
{
    protected $table = 'stock';
    protected $priamryKey = 'id';
    protected $allowedFields = ['item_name', 'stock'];
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $useTimeStamps = true;
    protected $dateFormat = 'datetime';

    public function getAll()
    {
        return $this->findAll();
    }

    public function getDataById($id)
    {
        $result = $this->find($id);

        return $result;
    }
}
