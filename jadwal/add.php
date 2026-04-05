<?php
include "../db.php";
$db = new db;

// ambil data dosen & matkul
$dosen = $db->get_allDosen();
$matkul = $db->get_allMatkul();
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Mata Kuliah</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Mata Kuliah</h6>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <form method="POST" id="formJadwal">
                    <div class="form-group">
                        <label>Dosen</label>
                        <select class="form-control" name="kd_dosen" required>
                            <option value="">-- Pilih Dosen --</option>
                            <?php while ($d = $dosen->fetch_array()) { ?>
                                <option value="<?= $d['kd_dosen'] ?>">
                                    <?= $d['nama'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mata Kuliah</label>
                        <select class="form-control" name="kd_matkul" required>
                            <option value="">-- Pilih Matkul --</option>
                            <?php while ($m = $matkul->fetch_array()) { ?>
                                <option value="<?= $m['kd_matkul'] ?>">
                                    <?= $m['nama'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">waktu</label>
                        <input type="text" class="form-control" name="waktu">

                    </div>
                    <div class="form-group">
                        <label>Ruangan</label>
                        <input type="text" class="form-control" name="ruang" required>
                    </div>

                    <button type="submit" class="btn btn-primary" id="simpanMatkul">Simpan</button>
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