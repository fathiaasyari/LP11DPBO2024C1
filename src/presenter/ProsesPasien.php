<?php

include_once("presenter/KontrakPresenter.php");

class ProsesPasien implements KontrakPresenter
{
	private $tabelpasien;
	private $data = [];

	function __construct()
    {
        //konstruktor
        try {
            $db_host = "localhost"; // host 
            $db_user = "root"; // user
            $db_password = ""; // password
            $db_name = "mvp_php"; // nama basis data
            $this->tabelpasien = new TabelPasien($db_host, $db_user, $db_password, $db_name); //instansi TabelPasien
            $this->data = array(); //instansi list untuk data Pasien
            //data = new ArrayList<Pasien>;//instansi list untuk data Pasien
        } catch (Exception $e) {
            echo "wiw error" . $e->getMessage();
        }
    }

	function prosesDataPasien()
	{
		try {
			// mengambil data di tabel pasien
			$this->tabelpasien->open();
			$this->tabelpasien->getPasien();
			while ($row = $this->tabelpasien->getResult()) {
				// ambil hasil query
				$pasien = new Pasien(); // instansiasi objek pasien untuk setiap data pasien
				$pasien->setId($row['id']); // mengisi id
				$pasien->setNik($row['nik']); // mengisi nik
				$pasien->setNama($row['nama']); // mengisi nama
				$pasien->setTempat($row['tempat']); // mengisi tempat
				$pasien->setTl($row['tl']); // mengisi tl
				$pasien->setGender($row['gender']); // mengisi gender
				$pasien->setEmail($row['email']); 
				$pasien->setTelp($row['telp']);

				$this->data[] = $pasien; // tambahkan objek pasien ke dalam list
			}
			// tutup koneksi
			$this->tabelpasien->close();
		} catch (Exception $e) {
			 //memproses error
			 echo "wiw error part 2" . $e->getMessage();
		}
	}

	
	function getId($i)
	{
		// mengembalikan id Pasien dengan indeks ke i
		return $this->data[$i]->getId();
	}

	function getNik($i)
	{
		// mengembalikan nik Pasien dengan indeks ke i
		return $this->data[$i]->getNik();
	}
	
	function getNama($i)
	{
		// mengembalikan nama Pasien dengan indeks ke i
		return $this->data[$i]->getNama();
	}
	
	function getTempat($i)
	{
		// mengembalikan tempat Pasien dengan indeks ke i
		return $this->data[$i]->getTempat();
	}
	
	function getTl($i)
	{
		// mengembalikan tanggal tl(TL) Pasien dengan indeks ke i
		return $this->data[$i]->getTl();
	}
	
	function getGender($i)
	{
		// mengembalikan gender Pasien dengan indeks ke i
		return $this->data[$i]->getGender();
	}
	
	function getEmail($i)
	{
		// mengembalikan email Pasien dengan indeks ke i
		return $this->data[$i]->getEmail();
	}
	
	function getTelp($i)
	{
		// mengembalikan telp Pasien dengan indeks ke i
		return $this->data[$i]->getTelp();
	}
	
	function getSize()
	{
		return sizeof($this->data);
	}


	function add($data)
	{
		$this->tabelpasien->open();
		$this->tabelpasien->add($data);
		$this->tabelpasien->close();
		header("location:index.php");
	}

	function update($data)
	{
		$this->tabelpasien->open();
		$this->tabelpasien->edit($data);
		$this->tabelpasien->close();
		header("location:index.php");
	}

	function deleteData($id)
	{
		try {
			$this->tabelpasien->open();
			$this->tabelpasien->hapus($id);
			$this->tabelpasien->close();
		} catch (Exception $e) {
            echo "wiw error" . $e->getMessage();
		}
	}

}

?>