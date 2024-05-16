<?php

namespace App\Models;

use CodeIgniter\Model;

use function PHPUnit\Framework\isEmpty;

// Tugas Pertemuan 5
class ModelBuku extends Model
{
    protected $table            = 'buku';
    protected $primaryKey       = 'id_buku';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
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

    public function getBuku()
    {
        return $this->findAll();
    }

    public function bukuWhere($var = null)
    {
        return $this->select('*')->where('buku', $var);
    }

    public function simpanBuku($data)
    {
        $this->insert($data);
    }

    public function updateBuku($where, $data)
    {
        $this->update($where, $data);
    }

    public function hapusBuku($data)
    {
        $this->delete($data);
    }

    public function total($field, $where)
    {
        return $this->selectSum($field)->where($where)->first();
    }

    // manajemen kategori
    public function getKategori()
    {
        return $this->db->table('kategori')->get()->getResult();
    }
    public function kategoriWhere($where) // Dalam menggunakan method ini harus gunakan forloop atau foreach untuk menampilakan datanya
    {
        return $this->db->table('kategori')->where('kategori', $where)->get()->getResult();
    }
    public function simpanKategori($data = null)
    {
        $this->db->table('kategori')->insert($data);
    }
    public function hapusKategori($where = null)
    {
        $this->db->table('kategori')->delete($where);
    }
    public function updateKategori($where = null, $data = null)
    {
        $this->db->table('kategori')->update($where, $data);
    }

    // join
    public function joinKategoriBuku($where)
    {
        return $this->join('kategori', 'kategori.id_kategori = buku.id_kategori')->where($where)->findAll();
    }
}
