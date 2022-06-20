<?php

namespace App\Controllers;

use App\Models\PengumumanModel;
use App\Models\GaleriModel;

class Pages extends BaseController
{
	protected $db;
	protected $pengumumanModel;
	public function __construct()
	{
		$this->db = \Config\Database::connect();
		$this->pengumumanModel = new PengumumanModel();
		$this->galeriModel = new GaleriModel();
	}
	public function index()
	{
		$pengumuman =  $this->pengumumanModel->getPengumuman();
		$kegiatan =  $this->db->table('kegiatan')->get()->getResultArray();
		$prestasi =  $this->db->table('prestasi')->get()->getResultArray();
		// dd($pengumuman);
		$data = [
			"title" => "Home | MTs Al-Hidayah",
			"ppdb" => "",
			"akademik" => "",
			"galeri" => "",
			"about" => "",
			"kontak" => "",
			"login" => "",
			"pengumuman" => $pengumuman,
			"kegiatan" => $kegiatan,
			"prestasi" => $prestasi
		];

		return view('pages/home', $data);
	}
	public function profil()
	{
		$data = [
			"title" => "Profil | MTs Al-Hidayah",
			"ppdb" => "",
			"akademik" => "",
			"galeri" => "",
			"about" => "active",
			"kontak" => "",
			"login" => ""
		];

		return view('pages/profil', $data);
	}

	public function galeri()
	{
		$keyword = filter_var($this->request->getVar('keyword'), FILTER_SANITIZE_STRING);
		if ($keyword != null) {
			$daftar = $this->galeriModel->search($keyword);
		} else {
			$daftar = $this->galeriModel->getGaleri();
		}
		$data = [
			"title" => "Galeri | MTs Al-Hidayah",
			"ppdb" => "",
			"akademik" => "",
			"galeri" => "active",
			"about" => "",
			"kontak" => "",
			"login" => "",
			"daftar" => $daftar
		];
		return view('pages/galeri', $data);
	}

	public function getKegiatan($id)
	{
		header('Content-Type: application/json');
		$data = $this->db->table('kegiatan')->getWhere(['id' => $id])->getResultArray();
		$data = json_encode($data);
		echo $data;
		die();
	}

	public function getPres()
	{
		header('Content-Type: application/json');
		$data = $this->db->table('prestasi')->orderBy('tahun', "ASC")->get()->getResultArray();
		// $data = json_encode($data);
		echo json_encode($data);
		die();
	}
	//--------------------------------------------------------------------

}