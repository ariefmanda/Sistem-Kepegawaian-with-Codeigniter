<div class="container">
    <h3 style="text-align:center;">Tambah Pendidikan Karyawan</h3>
    <hr>
    <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/karypendidikan/tambahkan" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $idKaryawan; ?>" name="idKaryawan">
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="col-md-12">
                    <label class="control-label col-md-4">Nama Karyawan :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" value="<?php echo $namaLengkap; ?>" disabled>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <label class="control-label col-md-4">Nama Sekolah :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="namaSekolah" placeholder="Nama Sekolah" required>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <label class="control-label col-md-4">Tingkat Pendidikan :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="tingkatPend" placeholder="Tingkat Pendidikan" required>
                    </div>
                </div>
                <br><br>
                    <div class="col-md-12">
                    <label class="control-label col-md-4">Jurusan :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="jurusan" placeholder="Jurusan" >
                    </div>
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="col-md-12">
                    <label class="control-label col-md-4">Program :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="program" >
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <label class="control-label col-md-4">Kota :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="kota" required>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <label class="control-label col-md-4">Graduate :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="Graduate" >
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <label class="control-label col-md-4">Tahun Tamat :</label>
                    <div class="col-md-7">
                        <input type="date" class="form-control" name="thnTamat" required>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <label class="control-label col-md-4"></label>
                    <div class="col-md-7">
                        <input type="submit" name="btnSubmit" value="Simpan">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>