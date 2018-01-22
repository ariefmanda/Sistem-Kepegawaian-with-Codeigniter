<div class="container">
    <h3 style="text-align:center;">Edit Nilai Kelompok</h3>
    <hr>
    <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/profile_matcing/editkan/nilai_kelompok/<?php echo $_GET['nama_kelompok']; ?>" enctype="multipart/form-data">
        <div class="col-md-12">
            <div class="col-md-9">
                <div class="col-md-8">
                    <label class="control-label col-md-4">Kelompok :</label>
                    <div class="col-md-7">
                        <select class="form-control" name="nama_kelompok" disabled>
                            <option value="core" <?php if($_GET['nama_kelompok'] == 'core'){ echo "selected"; } ?>>Core</option>
                            <option value="secondary" <?php if($_GET['nama_kelompok'] == 'secondary'){ echo "selected"; } ?>>Secondary</option>
                        </select>
                    </div>
                </div>
                <br><br>
                <div class="col-md-8">
                    <label class="control-label col-md-4">Prosentase :</label>
                    <div class="col-md-7">
                        <input type="number" class="form-control" name="prosentase" placeholder="Prosentase" value="<?php echo $_GET['prosentase']; ?>" required>
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