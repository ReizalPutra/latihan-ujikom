<?php

class db
{
    private $koneksi;
    function __construct()
    {
        $this->koneksi = $koneksi = new mysqli("localhost", "root", "", "db_pelatihan_muhamadreizalputrahidayat");
    }
    function get_user($username, $password)
    {
        $data = $this->koneksi->query("select * from tbl_user where username='$username' and password='$password'");
        return $data;
    }
    // mahasiswa
    function get_allMhs()
    {
        $data = $this->koneksi->query("select * from tbl_mahasiswa");
        return $data;
    }

    function add_mhs($nim, $nama, $jurusan, $alamat)
    {
        $this->koneksi->query("insert into tbl_mahasiswa(nim,nama,jurusan,alamat) values('$nim','$nama','$jurusan','$alamat')");
        return true;
    }

    function update_mhs($nim, $nama, $alamat)
    {
        $this->koneksi->query("UPDATE tbl_mahasiswa SET nama = '$nama', alamat = '$alamat' WHERE nim='$nim'");
        return true;
    }

    function get_MhdByNim($nim)
    {
        $data = $this->koneksi->query("select * from tbl_mahasiswa where nim='$nim'");
        return $data;
    }

    function del_mhs($nim)
    {
        $this->koneksi->query("delete from tbl_mahasiswa where nim='$nim'");
        return true;
    }

    // Dosen
    function get_allDosen()
    {
        $data = $this->koneksi->query("select * from tbl_dosen");
        return $data;
    }
    function add_dosen($kd_dosen, $nama,  $alamat)
    {
        $this->koneksi->query("insert into tbl_dosen(kd_dosen,nama,alamat) values('$kd_dosen','$nama','$alamat')");
        return true;
    }
    function update_dosen($kd_dosen, $nama, $alamat)
    {
        $this->koneksi->query("UPDATE tbl_dosen SET nama = '$nama', alamat = '$alamat' WHERE kd_dosen='$kd_dosen'");
        return true;
    }
    function get_dosenByKd($kd_dosen)
    {
        $data = $this->koneksi->query("select * from tbl_dosen where kd_dosen='$kd_dosen'");
        return $data;
    }

    function del_dosen($kd_dosen)
    {
        $this->koneksi->query("delete from tbl_dosen where kd_dosen='$kd_dosen'");
        return true;
    }

    // Matkul
    function get_allMatkul()
    {
        $data = $this->koneksi->query("select * from tbl_matkul");
        return $data;
    }
    function add_matkul($kd_matkul, $nama,  $sks)
    {
        $this->koneksi->query("insert into tbl_matkul(kd_matkul,nama,sks) values('$kd_matkul','$nama','$sks')");
        return true;
    }
    function update_matkul($kd_matkul, $nama, $sks)
    {
        $this->koneksi->query("UPDATE tbl_matkul SET nama = '$nama', sks = '$sks' WHERE kd_matkul='$kd_matkul'");
        return true;
    }
    function get_matkulByKd($kd_matkul)
    {
        $data = $this->koneksi->query("select * from tbl_matkul where kd_matkul='$kd_matkul'");
        return $data;
    }

    function del_matkul($kd_matkul)
    {
        $this->koneksi->query("delete from tbl_matkul where kd_matkul='$kd_matkul'");
        return true;
    }
    // Matkul
    function get_allJadwal()
    {
        $data = $this->koneksi->query("
        SELECT j.id, m.nama as matkul, d.nama as dosen, j.waktu, j.ruang
        FROM tbl_jadwal j
        JOIN tbl_matkul m ON j.kd_matkul = m.kd_matkul
        JOIN tbl_dosen d ON j.kd_dosen = d.kd_dosen
    ");
        return $data;
    }
    function add_jadwal($kd_dosen, $kd_matkul, $waktu, $ruang)
    {
        $this->koneksi->query("INSERT INTO tbl_jadwal (kd_dosen, kd_matkul, waktu, ruang)
              VALUES ('$kd_dosen', '$kd_matkul', '$waktu', '$ruang')");
        return true;
    }
    function update_jadwal($id, $kd_dosen, $kd_matkul, $waktu, $ruang)
    {
        $this->koneksi->query("UPDATE tbl_jadwal SET 
        kd_dosen = '$kd_dosen',
        kd_matkul = '$kd_matkul',
        waktu = '$waktu',
        ruang = '$ruang'
        WHERE id='$id'");
        return true;
    }
    function get_jadwalByKd($id)
    {
        $data = $this->koneksi->query("select * from tbl_jadwal where id='$id'");
        return $data;
    }

    function del_jadwal($id)
    {
        $this->koneksi->query("delete from tbl_jadwal where id='$id'");
        return true;
    }
}
