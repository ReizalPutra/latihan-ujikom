<?php
include "../db.php";
$db = new db;

switch ($_GET['action']) {

    case 'save':
        $kd_matkul = $_POST['kd_matkul'];
        $nama = $_POST['nama'];
        $sks = $_POST['sks'];

        $query = $db->add_matkul($kd_matkul, $nama, $sks);
        if ($query) {
            echo "Simpan Data Matkul Berhasil";
        } else {
            echo "Simpan Data Matkul Gagal :";
        }
        break;

    case 'edit':
        $kd_matkul = $_POST['kd_matkul'];
        $nama = $_POST['nama'];
        $sks = $_POST['sks'];

        $query = $db->update_matkul($kd_matkul, $nama, $sks);

        if ($query) {
            echo "Edit Data Matkul Berhasil";
        } else {
            echo "Edit Data Matkul Gagal :";
        }
        break;

    case 'delete':

        $kd_matkul = $_POST['kd_matkul'];
        $query = $db->del_matkul($kd_matkul);
        if ($query) {
            echo "Hapus Data Matkul Berhasil";
        } else {
            echo "Hapus Data Matkul Gagal :";
        }
        break;
}
