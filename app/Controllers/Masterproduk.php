<?php

namespace App\Controllers;

use CodeIgniter\Config\ForeignCharacters;
// use \App\Models\m_masteritproduk;
use App\Models\m_masterproduk;

class Masterproduk extends BaseController
{
    protected $tb_masteritproduk;

    public function __construct()
    {
        if (!session()->get('username')) return redirect()->to(base_url());

        $this->tb_masteritproduk = new m_masterproduk();
        // helper('form'); ini tidak perlu di pakai karena sudah di load di file basecontroler pada bagian $helpers

    }

    public function index()
    {
        if (!session()->get('username')) return redirect()->to(base_url());

        // $encrypter = \Config\Services::encrypter();
        // $plainText = 'admin';
        // $ciphertext = $encrypter->encrypt($plainText);
        // echo $ciphertext;
        // // Outputs: This is a plain-text message!
        // echo $encrypter->decrypt($ciphertext);

        $segment = $this->request->uri->getSegment(1);
        // $uri = $this->uri->segment(1);
        $data = [
            'titlemenu' => 'Master Produk',
            'data_masteritproduk' => $this->tb_masteritproduk->getMasterproduk(),
            'untukmenu' => $segment
        ];
        // $uri = $this->request->uri->getSegment(1); //$this->uri->segment(1);
        // // $uri = $this->uri->segment(1);
        // echo $uri;

        return view('/master/v_masterproduk', $data);
    }

    // action insert data
    public function add()
    {
        if (!session()->get('username')) return redirect()->to(base_url());

        // cara pertama, lebih simple dan tidak perlu buat method untuk insert data di modelnya
        // $buatslug = url_title($this->request->getVar('txtNamaproduk'), '-', true);
        // $this->tb_masteritproduk->save([
        //     'namaproduk' => $this->request->getVar('txtNamaproduk'),
        //     'slug' => $buatslug,
        //     'deskripsi' => $this->request->getVar('txtDeskripsi')
        // ]);
        // // ------------------------------------------------------------------------------------

        // cara kedua, lebih panjang dan harus buat method untuk insert data di modelnya
        if (!$this->validate([
            'txtNamaproduk' => 'required'
        ])) {
            // return redirect()->to(base_url() . '/masterproduk');
            // kalo tidak bisa ngapain
        }
        // $buatslug = url_title($this->request->getPost('txtNamaproduk'), '-', true);
        $datadariform = [
            'namaproduk' => $this->request->getPost('txtNamaproduk'),
            // 'slug' => $buatslug,
            'deskripsi' => $this->request->getPost('txtDeskripsi'),
            'createdate' => date("Y-m-d H:i:s")
        ];
        $this->tb_masteritproduk->insertketabel($datadariform);

        session()->setFlashdata('pesan', 'Data berhasil disimpan');
        return redirect()->to(base_url() . '/masterproduk');
    }

    public function edit($iddariform)
    {
        if (!session()->get('username')) return redirect()->to(base_url());

        // $buatslug = url_title($this->request->getPost('txtNamaproduk'), '-', true);
        $datadariform = [
            'namaproduk' => $this->request->getPost('txtNamaproduk'),
            // 'slug' => $buatslug,
            'deskripsi' => $this->request->getPost('txtDeskripsi'),
            'modifdate' => date("Y-m-d H:i:s")
        ];
        $this->tb_masteritproduk->updateketabel($iddariform, $datadariform);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to(base_url() . '/masterproduk');
    }

    public function delete($iddariform)
    {
        if (!session()->get('username')) return redirect()->to(base_url());
        
        $this->tb_masteritproduk->deleteketabel($iddariform);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url() . '/masterproduk');
    }



    //--------------------------------------------------------------------

}
