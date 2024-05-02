<?php
include("KontrakView.php");
include("presenter/ProsesPasien.php");

class TambahPasien implements KontrakView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
	{
		$this->prosespasien->prosesDataPasien();
		$data = null;
		$data .= '<label for="nik">NIK:</label>
        <input type="text" id="nik" name="nik">

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama">

        <label for="tempat">Tempat Lahir:</label>
        <input type="text" id="tempat" name="tempat">

        <label for="tl">Tanggal Lahir:</label>
        <input type="date" id="tl" name="tl">

        <label for="gender">Gender:</label>
        <input type="text" id="gender" name="gender">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">

        <label for="telp">Telepon:</label>
        <input type="text" id="telp" name="telp">

        <input type="submit" value="Submit" name="submit">';

		// Memuat template skin.html
		$this->tpl = new Template("templates/tambahUpdate.html");


		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);
		$this->tpl->replace("LINK_ACTION", 'tambahPasien.php');
		$this->tpl->replace("JUDUL_HEADER", 'Tambah Pasien');
		$this->tpl->replace("TITLE", 'Tambah Pasien');


		// Menampilkan ke layar
		$this->tpl->write();
	}

	function tambah($data)
	{
		// Memanggil method untuk memproses data pasien yang ditambahkan
		$this->prosespasien->tambahDatapasien($data);

		// Mengarahkan kembali ke halaman utama setelah proses penambahan selesai
		header("Location: index.php");
		exit();
	}
}
