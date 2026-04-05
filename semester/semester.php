<?php
include "../db.php";
$db = new db;

switch ($_GET['action']) {

    case 'save':
        $kd_semester = $_POST['kd_semester'];
        $semester = $_POST['semester'];

        $query = $db->add_semester($kd_semester, $semester);
        if ($query) {
            echo "Simpan Data semester Berhasil";
        } else {
            echo "Simpan Data semester Gagal :";
        }
        break;

    case 'edit':
        $kd_semester = $_POST['kd_semester'];
        $semester = $_POST['semester'];

        $query = $db->update_semester($kd_semester, $semester);

        if ($query) {
            echo "Edit Data semester Berhasil";
        } else {
            echo "Edit Data semester Gagal :";
        }
        break;

    case 'delete':

        $kd_semester = $_POST['kd_semester'];
        $query = $db->del_semester($kd_semester);
        if ($query) {
            echo "Hapus Data semester Berhasil";
        } else {
            echo "Hapus Data semester Gagal :";
        }
        break;
}
