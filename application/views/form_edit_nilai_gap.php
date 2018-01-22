<div class="container">
    <h3 style="text-align:center;">Edit Nilai Gap</h3>
    <hr>
    <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/profile_matcing/editkan/nilai_gap/<?php echo $_GET['selisih']; ?>" enctype="multipart/form-data">
        <div class="col-md-12">
            <div class="col-md-9">
                <div class="col-md-8">
                    <label class="control-label col-md-4">Selisih :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" value="<?php echo $_GET['selisih']; ?>" disabled>
                        <input type="hidden" class="form-control" name="selisih" value="<?php echo $_GET['selisih']; ?>">
                    </div>
                </div>
                <br><br>
                <div class="col-md-8">
                    <label class="control-label col-md-4">Bobot :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" value="<?php echo $_GET['bobot']; ?>" disabled>
                        <input type="hidden" class="form-control" name="bobot" value="<?php echo $_GET['selisih']; ?>">
                    </div>
                </div>
                <br><br>
                <div class="col-md-8">
                    <label class="control-label col-md-4">Keterangan :</label>
                    <div class="col-md-7">
                        <textarea type="text" class="form-control" name="keterangan"><?php echo $_GET['keterangan']; ?></textarea>
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