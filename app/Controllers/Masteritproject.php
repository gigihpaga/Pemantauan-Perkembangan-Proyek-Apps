<?php

namespace App\Controllers;

use CodeIgniter\Config\ForeignCharacters;
use \App\Models\m_masteritproyek;

class Masteritproject extends BaseController
{
	protected $tb_masteritproyek;

	public function __construct()
	{
		if (!session()->get('username')) return redirect()->to(base_url());

		// ini kontruktor dari model biar bisa di panggil dimanapun method pada class ini
		$this->tb_masteritproyek = new m_masteritproyek();
	}

	public function index()
	{
		if (!session()->get('username')) return redirect()->to(base_url());

		// $data_masteritproyek = $this->tb_masteritproyek->findAll();
		//dd($data_masteritproyek); untuk menampilkan data db
		$data = [
			'titlemenu' => 'Master Proyek IT',
			'data_masteritproyek' => $this->tb_masteritproyek->getMasteritproyek()
		];
		return view('/master/v_masteritproject', $data);

		// // cara konek ke db tanpa model
		// $db = \config\Database::connect();
		// $datamasteritproyek = $db->query("select * from it_project");
		// //dd($datakomik);
		// foreach($datamasteritproyek->getResultArray() as $row){
		// 	d($row);	
		// }

		//$tb_masteritproyek = new \App\Models\m_masteritproyek();

		// $this->load->view('layout/v_index');
		// echo view('layout/v_wrapper', $data);
	}

	// form ubah
	public function edit($slug)
	{
		if (!session()->get('username')) return redirect()->to(base_url());

		$data = [
			'titlemenu' => 'Ubah Data Master Proyek IT',
			'data_masteritproyek' => $this->tb_masteritproyek->getMasteritproyek($slug)
		];
		//dd($data);
		// jika data tidak ada maka
		if (empty($data['data_masteritproyek'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Data' . $slug . ' tidak ditemukan');
		}
		return view('/master/v_masteritprojectedit', $data);
	}

	// form tambah
	public function add()
	{
		if (!session()->get('username')) return redirect()->to(base_url());

		$data = [
			'titlemenu' => 'Tambah Data Proyek IT',
			// 'data_masteritproyek' => $this->tb_masteritproyek->getMasteritproyek($slug)
		];
		//dd($data);
		return view('/master/v_masteritprojectadd', $data);
	}

	// action insert data
	public function save()
	{
		if (!session()->get('username')) return redirect()->to(base_url());

		// dd($this->request->getVar());
		$buatslug = url_title($this->request->getVar('txtNama'), '-', true);
		$this->tb_masteritproyek->save([
			'namaproyek' => $this->request->getVar('txtNama'),
			'slug' => $buatslug,
			'deskripsi' => $this->request->getVar('txtDeskripsi')

		]);
		session()->setFlashdata('pesan', 'Data berhasil disimpan');
		return redirect()->to(base_url() . '/masteritproject');
	}

	// action delete data
	public function delete($id)
	{
		if (!session()->get('username')) return redirect()->to(base_url());

		$this->tb_masteritproyek->delete($id);
		session()->setFlashdata('pesan', 'Data berhasil dihapus');
		return redirect()->to(base_url() . '/masteritproject');
	}

	// action update
	public function update($id)
	{
		if (!session()->get('username')) return redirect()->to(base_url());
		
		$buatslug = url_title($this->request->getVar('txtNama'), '-', true);
		$this->tb_masteritproyek->save([
			'idproyek' => $id,
			'namaproyek' => $this->request->getVar('txtNama'),
			'slug' => $buatslug,
			'deskripsi' => $this->request->getVar('txtDeskripsi')

		]);
		session()->setFlashdata('pesan', 'Data berhasil diubah');
		return redirect()->to(base_url() . '/masteritproject');
	}


	//--------------------------------------------------------------------

}
