<?php
include "../db.php";
$db = new db;

// ambil data mahasiswa, jadwal, dan semester
$mahasiswa = $db->get_allMhs();
$jadwal = $db->get_allJadwal();
$semester = $db->get_allSemester();
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah KRS</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form KRS</h6>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <form method="POST" id="formKrs">
                    <div class="form-group">
                        <label>NIM</label>
                        <select class="form-control" name="nim" required>
                            <option value="">-- Pilih Mahasiswa --</option>
                            <?php while ($mhs = $mahasiswa->fetch_array()) { ?>
                                <option value="<?= $mhs['nim'] ?>">
                                    <?= $mhs['nim'] ?> - <?= $mhs['nama'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kode Jadwal</label>
                        <select class="form-control" name="id_jadwal" required>
                            <option value="">-- Pilih Jadwal --</option>
                            <?php while ($j = $jadwal->fetch_array()) { ?>
                                <option value="<?= $j['id'] ?>">
                                    <?= $j['id'] ?> - <?= $j['matkul'] ?> (<?= $j['dosen'] ?>)
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kode Semester</label>
                        <select class="form-control" name="kd_semester" required>
                            <option value="">-- Pilih Semester --</option>
                            <?php while ($s = $semester->fetch_array()) { ?>
                                <option value="<?= $s['kd_semester'] ?>">
                                    <?= $s['kd_semester'] ?> - <?= $s['semester'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" id="simpanKrs">Simpan</button>
                </form>

            </div>
        </div>
    </div>

</div>

<!-- Page level plugins -->
<script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="asset/js/demo/datatables-demo.js"></script>