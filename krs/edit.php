<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit KRS</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit KRS</h6>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <?php
                include "../db.php";
                $id = $_GET['id'];
                $db = new db;

                $krs = $db->get_krsById($id);
                $result = $krs->fetch_array();
                $mahasiswa = $db->get_allMhs();
                $jadwal = $db->get_allJadwal();
                $semester = $db->get_allSemester();
                ?>
                <form method="POST" id="formEditKrs">
                    <input type="hidden" name="id" value="<?= $result['id'] ?>">
                    <div class="form-group">
                        <label>NIM</label>
                        <select name="nim" class="form-control" required>
                            <?php while ($mhs = $mahasiswa->fetch_array()) { ?>
                                <option value="<?= $mhs['nim'] ?>" <?= $result['nim'] == $mhs['nim'] ? 'selected' : '' ?>>
                                    <?= $mhs['nim'] ?> - <?= $mhs['nama'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Kode Jadwal</label>
                        <select name="id_jadwal" class="form-control" required>
                            <?php while ($j = $jadwal->fetch_array()) { ?>
                                <option value="<?= $j['id'] ?>" <?= $result['id_jadwal'] == $j['id'] ? 'selected' : '' ?>>
                                    <?= $j['id'] ?> - <?= $j['matkul'] ?> (<?= $j['dosen'] ?>)
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kode Semester</label>
                        <select name="kd_semester" class="form-control" required>
                            <?php while ($s = $semester->fetch_array()) { ?>
                                <option value="<?= $s['kd_semester'] ?>" <?= $result['kd_semester'] == $s['kd_semester'] ? 'selected' : '' ?>>
                                    <?= $s['kd_semester'] ?> - <?= $s['semester'] ?>
                                </option>
                            <?php } ?>
                        </select>
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