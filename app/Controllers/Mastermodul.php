<?php

namespace App\Controllers;

use CodeIgniter\Config\ForeignCharacters;
use App\Models\m_masterproduk;
use App\Models\m_mastersubproduk;
use App\Models\m_mastermodul;
use CodeIgniter\Exceptions\AlertError;

class Mastermodul extends BaseController
{
    protected $tb_masterproduk;
    protected $tb_mastersubproduk;
    protected $tb_mastermodul;

    public function __construct()
    {
        if (!session()->get('username')) return redirect()->to(base_url());

        $this->tb_masterproduk = new m_masterproduk();
        $this->tb_mastersubproduk = new m_mastersubproduk();
        $this->tb_mastermodul = new m_mastermodul();
    }

    public function index()
    {
        if (!session()->get('username')) return redirect()->to(base_url());

        $segment = $this->request->uri->getSegment(1);

        $query_produk = $this->tb_masterproduk->getMasterproduk();
        $query_subproduk = $this->tb_mastersubproduk->getMastersubproduk();
        $query_modul = $this->tb_mastermodul->getMastermodul();
        $query_tipe = $this->tb_mastermodul->getTipemodul();
        $data = [
            'titlemenu' => 'Master Modul',
            'data_masterproduk' => $query_produk,
            'data_mastersubproduk' => $query_subproduk,
            'data_mastermodul' => $query_modul,
            'data_tipemodul' => $query_tipe,
            'untukmenu' => $segment
        ];

        return view('/master/v_mastermodul', $data);
        // dd($data);
    }

    public function add()
    {
        if (!session()->get('username')) return redirect()->to(base_url());

        // $query_maximodul = $this->tb_mastermodul->getMaxidmodul();
        $datadariform = [
            'idproduk' => $this->request->getPost('cbProduk'),
            'idsubproduk' => $this->request->getPost('cbSubproduk'),
            'namamodul' => $this->request->getPost('txtNamamodul'),
            'tipemodul' => $this->request->getPost('cbTipemodul'),
            'status' => $this->request->getPost('cbStatus'),
            'deskripsi' => $this->request->getPost('txtDeskripsi'),
            'createdate' => date("Y-m-d H:i:s")
        ];
        $this->tb_mastermodul->insertketabel($datadariform);
        session()->setFlashdata('pesan', 'Data berhasil disimpan');
        return redirect()->to(base_url() . '/mastermodul');
    }

    public function edit($iddariform)
    {
        if (!session()->get('username')) return redirect()->to(base_url());

        $datadariform = [
            'idproduk' => $this->request->getPost('cbProduk'),
            'idsubproduk' => $this->request->getPost('cbSubproduk'),
            'namamodul' => $this->request->getPost('txtNamamodul'),
            'tipemodul' => $this->request->getPost('cbTipemodul'),
            'status' => $this->request->getPost('cbStatus'),
            'deskripsi' => $this->request->getPost('txtDeskripsi'),
            'modifdate' => date("Y-m-d H:i:s")
        ];
        $this->tb_mastermodul->updateketabel($iddariform, $datadariform);
        session()->setFlashdata('pesan', 'Data berhasil diubah sdasd');
        return redirect()->to(base_url() . '/mastermodul');
    }

    public function delete($iddariform)
    {
        $this->tb_mastermodul->deleteketabel($iddariform);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url() . '/mastermodul');
    }

    public function getDatasubproduk()
    {
        if (!session()->get('username')) return redirect()->to(base_url());
        
        if ($this->request->isAJAX()) {

            // $idproduk = $this->input->post('id');
            $idproduk = $this->request->getPost('paramidproduk');
            $data = $this->tb_mastersubproduk->getMastersubprodukbyproduk($idproduk);
            // dd($data);
            $output[] = '<option value="">--pilih data--</option>';
            foreach ($data as $row) {
                $output[] = '<option value="' . $row['idsubproduk'] . '">' . $row['namasubproduk'] . '</option>';
            }

            echo json_encode($output);
            // $this->output->set_content_type('application/json')->set_output(json_encode($output));
        } else {
            exit('maaf tidak bisa diproses');
        }
    }



    //--------------------------------------------------------------------

}
