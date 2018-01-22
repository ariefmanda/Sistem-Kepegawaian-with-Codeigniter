<form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/cuti/tambahkan" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $idKaryawan; ?>" name="idKaryawan">
    <div class="col-md-12">
        <div class="col-md-9">
            <div class="col-md-8">
                <label class="control-label col-md-4">Nama Lengkap :</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="namaLengkap" value="<?php echo $namaLengkap; ?>" disabled>
                </div>
            </div>
            <br><br>
            <div class="col-md-8">
                <label class="control-label col-md-4">Mulai Cuti :</label>
                <div class="col-md-7">
                    <input type="date" class="form-control" name="mulaiCuti" placeholder="Mulai Cuti" required>
                </div>
            </div>
            <br><br>
            <div class="col-md-8">
                <label class="control-label col-md-4">Jumlah Hari Cuti :</label>
                <div class="col-md-7">
                    <input type="number" class="form-control" name="jumlahHari" min="1" max="6" placeholder="Jumlah Hari" value="1" required>
                </div>
            </div>
            <br><br>
            <div class="col-md-8">
                <label class="control-label col-md-4">Keterangan :</label>
                <div class="col-md-7">
                    <textarea type="text" class="form-control" name="keterangan" placeholder="Keterangan" required></textarea>
                </div>
            </div>
            <br><br><br>
            <div class="col-md-8">
                <label class="control-label col-md-4"></label>
                <div class="col-md-7">
                    <button type="submit" class="btn btn-info btn-sm">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>