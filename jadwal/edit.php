<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Jadwal Kuliah</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Jadwal Kuliah</h6>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <?php
                include "../db.php";
                $id = $_GET['id'];
                $db = new db;

                $jadwal = $db->get_jadwalByKd($id);
                $result = $jadwal->fetch_array();
                $dosen = $db->get_allDosen();
                $matkul = $db->get_allMatkul();
                ?>
                <form method="POST" id="formEditJadwal">
                    <input type="hidden" name="id" value="<?= $result['id'] ?>">
                    <div class="form-group">
                        <label>Dosen</label>
                        <select name="kd_dosen" class="form-control">
                            <?php while ($d = $dosen->fetch_array()) { ?>
                                <option value="<?= $d['kd_dosen'] ?>" <?= $result['kd_dosen'] == $d['kd_dosen'] ? 'selected' : '' ?>>
                                    <?= $d['nama'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Mata Kuliah</label>
                        <select name="kd_matkul" class="form-control">
                            <?php while ($m = $matkul->fetch_array()) { ?>
                                <option value="<?= $m['kd_matkul'] ?>" <?= $result['kd_matkul'] == $m['kd_matkul'] ? 'selected' : '' ?>>
                                    <?= $m['nama'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Waktu</label>
                        <input type="text" class="form-control" name="waktu" value="<?= $result['waktu'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Ruangan</label>
                        <input type="text" class="form-control" name="ruang" value="<?= $result['ruang'] ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
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