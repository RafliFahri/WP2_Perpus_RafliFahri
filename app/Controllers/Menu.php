<?php
// Tugas Pertemuan 5.2
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelMenu;
use CodeIgniter\HTTP\ResponseInterface;

class Menu extends BaseController
{
    private $mod;
    private $rules;
    // private $data;
    //  = [
    //     'menu' => [
    //         'label' => 'Menu Matakuliah',
    //         'rules' => 'required',
    //         'errors' => [
    //             'required' => 'Field Menu harus diisi'
    //         ]
    //     ],
    //     'harga' => [
    //         'label' => 'Nama Matakuliah',
    //         'rules' => 'required',
    //         'errors' => [
    //             'required' => 'Nama matakuliah Harus diisi'
    //         ]
    //     ],
    // ];
    public function __construct() {
        $this->mod = new ModelMenu();
        // $this->data = $this->mod->getMenu();
        helper('form');
        $this->rules =
        [
            'menu' => [
                'label' => 'Menu',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field Menu harus diisi'
                ]
            ],
            'harga' => [
                'label' => 'Harga',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama matakuliah Harus diisi'
                ]
            ],
        ];
    }

    public function index()
    {
        $data['table'] = $this->mod->getMenu();
        // return var_dump($data);
        return view('vmenu', $data);
        // if (!$this->request->is('post')) {
        //     return view('vmenu');
        // } else {
        //     // $data = $this->mod->getMenu();   
        //     // if (!$this->validate($this->rules)) {
        //     //     return redirect()->to('/menu')->withInput();
        //     // } else {
        //     //     $input = $this->request->getVar();
        //     //     $this->mod->simpan($input);
        //     //     redirect()->to('menu');
        //     // }
        //     // $input = $this->request->getVar();
        //     // echo dd($input);
        // }
    }

    public function create()
    {
        $data = $this->mod->getMenu();
        if (!$this->request->is('post')) {
            return view('vmenu', ['table' => $data, 'notif' => "get"]);
        }
        if (!$this->validate($this->rules)) {
            // print_r('ashdjash');
            // $eror = $this->validator->getErrors();
            return redirect()->to('menu')->withInput();
            // return view('vmenu', ['table' => $data, 'notif' => "ga kekirim", 'error' => $eror]);
        } else {
            $value['nmmenu'] = $this->request->getPost('menu');
            $value['harga'] = $this->request->getPost('harga');
            // $value['nmmenu'] = $this->request->getVar('menu');
            // $value['harga'] = $this->request->getVar('harga');
            // var_dump($value);
            // print_r('ashdjash');
            $this->mod->simpan($value);
            return redirect()->to('/menu');
            // return view('vmenu', ['table' => $data, 'notif' => "kirim"]);
            
        }

        // $input = $this->request->getVar('kode');
        // echo dd($input);
    }

    public function update()
    {
        // $this->mod = new ModelMenu();
        $data = $this->mod->getMenu();
        if (!$this->request->is('post')) {
            return view('vmenu', ['table' => $data]);
        }
        //Pastiin input namenya sama kaya di db
        // $value = $this->request->getPost();
        // foreach ($value as $key => $val) {
        //     // print_r($key . empty($val));
        //     if (empty($val)) {
        //         unset($value[$key]);
        //     }
        // }
        // $id = $value['kode'];
        // unset($value['kode'], $value['submit']);
        // dd($value);
        $id = $this->request->getVar('kode');
        $value['nmmenu'] = $this->request->getVar('menu');
        $value['harga'] = $this->request->getVar('harga');
        $this->mod->updateMenu($id, $value);
        return redirect()->to('/menu');
    }

    public function delete($kdmenu)
    {
        // if (!$this->request->is('delete')) {
        //     return redirect()->to('/menu');
        // }

        $this->mod->deleteMenu($kdmenu);
        return redirect()->to('/menu');
    }
}
