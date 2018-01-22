<div class="container">
    <h3 style="text-align:center;">Tambah Kriteria</h3>
    <hr>
    <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/profile_matcing/tambahkan/kriteria" enctype="multipart/form-data">
        <div class="col-md-12">
            <div class="col-md-9">
                <div class="col-md-8">
                    <label class="control-label col-md-4">Aspek :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="aspek" placeholder="Aspek" required>
                    </div>
                </div>
                <br><br>
                <div class="col-md-8">
                    <label class="control-label col-md-4">Presentase :</label>
                    <div class="col-md-7">
                        <input type="number" min="1" max="100" class="form-control" name="prosentase" placeholder="Presentase" required>
                    </div>
                </div>
                <br><br>
                <div class="col-md-8">
                    <label class="control-label col-md-4"></label>
                    <div class="col-md-7">
                        <input type="submit" name="btnSubmit" value="Simpan">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>