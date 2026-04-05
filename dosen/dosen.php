<?php
include "../db.php";
$db = new db;

switch ($_GET['action']) {

    case 'save':
        $kd_dosen = $_POST['kd_dosen'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];

        $query = $db->add_dosen($kd_dosen, $nama, $alamat);
        if ($query) {
            echo "Simpan Data Dosen Berhasil";
        } else {
            echo "Simpan Data Dosen Gagal :";
        }
        break;

    case 'edit':

        $kd_dosen = $_POST['kd_dosen'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];

        $query = $db->update_dosen($kd_dosen, $nama, $alamat);

        if ($query) {
            echo "Edit Data Dosen Berhasil";
        } else {
            echo "Edit Data Dosen Gagal :";
        }
        break;

    case 'delete':

        $kd_dosen = $_POST['kd_dosen'];
        $query = $db->del_dosen($kd_dosen);
        if ($query) {
            echo "Hapus Data Dosen Berhasil";
        } else {
            echo "Hapus Data Dosen Gagal :";
        }
        break;
}
