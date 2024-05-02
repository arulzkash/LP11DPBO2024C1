<?php
include("presenter/ProsesPasien.php");

class UpdatePasien 
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil($id)
	{
		$this->prosespasien->prosesDataPasienbyId($id);
		$data = null;
		$data .= '<label for="nik">NIK:</label>
        <input type="text" id="nik" name="nik" value="'.$this->prosespasien->getNik(0).'">

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="'.$this->prosespasien->getNama(0).'">

        <label for="tempat">Tempat Lahir:</label>
        <input type="text" id="tempat" name="tempat" value="'.$this->prosespasien->getTempat(0).'">

        <label for="tl">Tanggal Lahir:</label>
        <input type="date" id="tl" name="tl" value="'.$this->prosespasien->getTl(0).'">

        <label for="gender">Gender:</label>
        <input type="text" id="gender" name="gender" value="'.$this->prosespasien->getGender(0).'">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="'.$this->prosespasien->getEmail(0).'">

        <label for="telp">Telepon:</label>
        <input type="text" id="telp" name="telp" value="'.$this->prosespasien->getTelp(0).'">

        <input type="submit" value="Submit" name="submit">';

		// Memuat template skin.html
		$link_action = null;
		$this->tpl = new Template("templates/tambahUpdate.html");
		$link_action .= 'updatePasien.php?id_edit='.$this->prosespasien->getId(0);


		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);
		$this->tpl->replace("LINK_ACTION", $link_action);
		$this->tpl->replace("JUDUL_HEADER", 'Update Pasien');
		$this->tpl->replace("TITLE", 'Update Pasien');

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function update($data, $id)
	{
		// Memanggil method untuk memproses data pasien yang ditambahkan
		$this->prosespasien->updateDataPasien($data, $id);

		// Mengarahkan kembali ke halaman utama setelah proses penambahan selesai
		header("Location: index.php");
		exit();
	}
}
