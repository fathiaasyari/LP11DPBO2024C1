<?php

interface KontrakView{
	public function read();
	
	 // Method untuk menambahkan data pasien
	 function add($nik, $nama, $tempat, $tl, $gender, $email, $telp);

	 // Method untuk menghapus data pasien
	 function hapus($id);
 
	 // Method untuk mengupdate data pasien
	 function edit($id, $nik, $nama, $tempat, $tl, $gender, $email, $telp);
}

?>