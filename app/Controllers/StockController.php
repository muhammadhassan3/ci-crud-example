<?php

namespace App\Controllers;

use App\Models\StockModel;
use CodeIgniter\Config\Factories;
use Config\Services;

class StockController extends BaseController
{
    private $parser;
    private $stockModel;

    public function __construct()
    {
        $this->parser = Services::parser();
        $this->stockModel = Factories::models('StockModel');

        helper('form');
    }

    public function index()
    {
        $list = $this->stockModel->getAll();
        $data['page_title'] = 'Daftar stock';
        $data['list'] = [];
        $data['heading'] = 'Daftar Barang';
        $i = 1;
        foreach ($list as $item) {
            array_push($data['list'], [
                'no' => $i++,
                'nama_barang' => $item['item_name'],
                'stok' => $item['stock'],
                'edit_url' => '/stock/' . $item['id'],
                'delete_url' => '/stock/' . $item['id'] . '/confirm'
            ]);
        }

        return $this->parser->setData($data)->render('template/header') .
            $this->parser->setData($data)->render('stock/list_stock') . view('template/footer');
    }

    public function create()
    {
        $data['page_title'] = "Tambah Stok";
        $data['isDisabled'] = false;
        return $this->parser->setData($data)->render('template/header') . $this->parser->setData($data)->render('stock/create_stock');
    }

    public function insert()
    {
        $data = $this->request->getPost(['item_name', 'stock']);

        if (!$this->validateData($data, [
            'item_name' => 'required|min_length[3]',
            'stock' => 'required|integer'
        ])) {
            return $this->create();
        }

        $validData = $this->validator->getValidated();

        $this->stockModel->save([
            'item_name' => $validData['item_name'],
            'stock' => $validData['stock']
        ]);

        return redirect()->to('/stock')->withHeaders()->withCookies();
    }

    public function edit($id)
    {
        $data = $this->stockModel->getDataById($id);

        return $this->parser->setData(['page_title' => "Ubah data stok"])->render('template/header') .
            $this->parser->setData($data)->render('stock/edit_stock');
    }

    public function update($id)
    {
        $data = $this->request->getPost(['item_name', 'stock']);

        if (!$this->validateData($data, [
            'item_name' => 'required|min_length[3]',
            'stock' => 'required|integer'
        ])) {
            return $this->create();
        }

        $validData = $this->validator->getValidated();

        $this->stockModel->update($id, [
            'stock' => $validData['stock'],
            'item_name' => $validData['item_name']
        ]);

        return redirect()->to('/stock')->withCookies()->withHeaders();
    }

    public function confirm($id)
    {
        $data = $this->stockModel->getDataById($id);

        return $this->parser->setData(['page_title' => "Hapus data stok"])->render('template/header') .
            $this->parser->setData($data)->render('stock/confirm_delete');
    }

    public function delete($id)
    {
        $this->stockModel->delete($id);

        return redirect()->to('/stock')->withCookies()->withHeaders();
    }
}
