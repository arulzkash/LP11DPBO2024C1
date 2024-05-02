<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function getPasienbyId($id)
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien WHERE id = '$id'";
		// Mengeksekusi query
		return $this->execute($query);
	}

	// Method untuk menambahkan data pasien ke dalam database
	function tambahPasien($data)
	{
		// Ambil data dari array POST
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];

		// Query MySQL untuk menambahkan data pasien ke dalam tabel pasien
		$query = "INSERT INTO pasien (nik, nama, tempat, tl, gender, email, telp) 
                  VALUES ('$nik', '$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";

		// Eksekusi query
		return $this->execute($query);
	}

	function updatePasien($data, $id)
	{
		// Ambil data dari array POST
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];

		// Query MySQL untuk menambahkan data pasien ke dalam tabel pasien
		$query = "UPDATE pasien SET 
		nik = '$nik', 
		nama = '$nama', 
		tempat = '$tempat', 
		tl = '$tl', 
		gender = '$gender', 
		email = '$email', 
		telp = '$telp' 
		WHERE id = '$id'";

		// Eksekusi query
		return $this->execute($query);
	}

	function hapusPasien($data, $id)
	{
		// Query MySQL untuk menambahkan data pasien ke dalam tabel pasien
		$query = "DELETE FROM pasien WHERE id = '$id'";

		// Eksekusi query
		return $this->execute($query);
	}
}
