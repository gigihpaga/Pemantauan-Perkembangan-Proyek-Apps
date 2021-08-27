<?php

namespace App\Controllers;

use CodeIgniter\Config\ForeignCharacters;
use App\Models\m_mastersubproduk;
use App\Models\m_masterproduk;

class Mastersubproduk extends BaseController
{
    protected $tb_mastersubproduk;
    protected $tb_masterproduk;

    public function __construct()
    {
        if (!session()->get('username')) return redirect()->to(base_url());

        $this->tb_masterproduk = new m_masterproduk();
        $this->tb_mastersubproduk = new m_mastersubproduk();
    }

    public function index()
    {
        if (!session()->get('username')) return redirect()->to(base_url());

        $segment = $this->request->uri->getSegment(1);

        $query_subproduk = $this->tb_mastersubproduk->getMastersubproduk();
        // dd($query_subproduk);
        $query_produk = $this->tb_masterproduk->getMasterproduk();

        // ini untuk form_dropdown
        $produk[null] = '--pilih data--';
        foreach ($query_produk as $pdk) {
            $produk[$pdk['idproduk']] = $pdk['namaproduk'];
        }
        // dd($produk);

        $data = [
            'titlemenu' => 'Master Sub Produk',
            'data_mastersubproduk' => $query_subproduk,
            'data_masterproduk' => $query_produk,
            'data_masterproduk2' => $produk, 'selectedproduk' => null,   // ini untuk form_dropdown
            'untukmenu' => $segment
        ];
        return view('/master/v_mastersubproduk', $data);
        // dd($data);
    }

    public function add()
    {
        if (!session()->get('username')) return redirect()->to(base_url());

        $datadariform = [
            'namasubproduk' => $this->request->getPost('txtNamasubproduk'),
            'idproduk' => $this->request->getPost('cbProduk'),
            'deskripsi' => $this->request->getPost('txtDeskripsi'),
            'createdate' => date("Y-m-d H:i:s")
        ];
        $this->tb_mastersubproduk->insertketabel($datadariform);
        session()->setFlashdata('pesan', 'Data berhasil disimpan');
        return redirect()->to(base_url() . '/mastersubproduk');
    }

    public function edit($iddariform)
    {
        if (!session()->get('username')) return redirect()->to(base_url());

        $datadariform = [
            'namasubproduk' => $this->request->getPost('txtNamasubproduk'),
            'idproduk' => $this->request->getPost('cbProduk'),
            'deskripsi' => $this->request->getPost('txtDeskripsi'),
            'modifdate' => date("Y-m-d H:i:s")
        ];
        $this->tb_mastersubproduk->updateketabel($iddariform, $datadariform);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to(base_url() . '/mastersubproduk');
    }

    public function delete($iddariform)
    {
        if (!session()->get('username')) return redirect()->to(base_url());
        
        $this->tb_mastersubproduk->deleteketabel($iddariform);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url() . '/mastersubproduk');
    }



    //--------------------------------------------------------------------

}
