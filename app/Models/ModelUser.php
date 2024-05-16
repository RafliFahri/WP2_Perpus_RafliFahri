<?php

namespace App\Models;

use CodeIgniter\Model;

// Tugas Pertemuan 5
class ModelUser extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function simpanData($data = null)
    {
        $this->insert($data);
    }

    public function cekData($where = null)
    {
        return $this->where($where)->first();
        // return $this->where('email', 'asd.asd@asd.asd')->first();
    }
    
    public function getUserWhere($getWhere = null)
    {
        return $this->where($getWhere)->first();
    }

    public function cekUserAccess($userAcc = null)
    {
        return $this->db->table('access_menu')->where($userAcc);
    }

    public function getUserLimit()
    {
        return $this->findAll(10, 0);
    }
}
