<script type="text/javascript">

function ShowPassword()
{
  if(document.getElementById("password").value!="")
  {
    document.getElementById("password").type="text";
    document.getElementById("show").style.display="none";
    document.getElementById("hide").style.display="block";
  }
}

function HidePassword()
{
  if(document.getElementById("password").type == "text")
  {
    document.getElementById("password").type="password"
    document.getElementById("show").style.display="block";
    document.getElementById("hide").style.display="none";
  }
}
</script>
<div class="container">
    <h3 style="text-align:center;">Edit Karyawan</h3>
    <hr>
    <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/karyawan/editkan/<?php echo $idKaryawan; ?>/<?php echo $namaFoto; ?>" enctype="multipart/form-data">
        <input type="hidden" class="form-control" name="page" value="anak">
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Nama Lengkap (Username) :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="namaLengkap" placeholder="Nama Lengkap" value="<?php echo $namaLengkap; ?>">
                        </div>
                    </div>
                </div>    
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Nama Panggil :</label>
                        <div class="col-md-6">       
                           <input type="text" class="form-control" name="namaPanggil" placeholder="Nama Panggil" value="<?php echo $namaPanggil; ?>">
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Alamat :</label>
                        <div class="col-md-6">
                            <textarea type="text" class="form-control" name="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Kota :</label>
                        <div class="col-md-6">
                            <input text="text" class="form-control" name="kota" placeholder="Kota" value="<?php echo $kota; ?>">
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Propinsi :</label>
                        <div class="col-md-6">
                            <input text="text" class="form-control" name="propinsi" placeholder="Propinsi" value="<?php echo $propinsi; ?>">
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4">Kode Pos :</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control" name="kodepos" placeholder="Kode Pos" value="<?php echo $kodepos; ?>">
                    </div>
                </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Telephone Rumah:</label>
                        <div class="col-md-6">       
                           <input type="number" class="form-control" name="telpRumah" placeholder="Telephone Rumah" value="<?php echo $telpRumah; ?>">
                        </div>
                    </div>
                </div>    
                <br><br>
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4">Nomer Handphone :</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control" name="handphone" placeholder="Nomer Handphone" value="<?php echo $handphone; ?>">
                    </div>
                </div>
                </div>
                <br><br>
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4">Tipe Identitas :</label>
                    <div class="col-md-6">
                        <select name="tipeIdentitas" class="form-control">
                            <option value="KTP" <?php if($tipeIdentitas == 'KTP'){ echo "selected";} ?>><button>KTP</button></option>
                            <option value="SIM" <?php if($tipeIdentitas == 'SIM'){ echo "selected";} ?>>SIM</option>
                            <option value="Lain-lain" <?php if($tipeIdentitas == 'Lain-lain'){ echo "selected";} ?>>Lain-lain</option>
                        </select>
                    </div>
                </div>
                </div>
                <br><br>
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4">Nomer Identitas :</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control" name="noIdentitas" placeholder="Nomer Identitas" value="<?php echo $noIdentitas; ?>">
                    </div>
                </div>
                </div>
                <br><br>
                <br><br>
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4">Golongan Darah :</label>
                    <div class="col-md-6">
                        <select name="golDarah" class="form-control">
                            <option value="A" <?php if($golDarah == 'A'){ echo "selected";} ?>>A</option>
                            <option value="B" <?php if($golDarah == 'B'){ echo "selected";} ?>>B</option>
                            <option value="AB" <?php if($golDarah == 'AB'){ echo "selected";} ?>>AB</option>
                            <option value="O" <?php if($golDarah == 'O'){ echo "selected";} ?>>O</option>
                        </select>
                    </div>
                </div>
                </div>
                <br><br>
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4">Agama :</label>
                    <div class="col-md-6">
                        <select name="agama" class="form-control">
                            <option value="Islam" <?php if($agama == 'Islam'){ echo "selected";} ?>>Islam</option>
                            <option value="Kristen" <?php if($agama == 'Kristen'){ echo "selected";} ?>>Kristen</option>
                            <option value="Budha" <?php if($agama == 'Budha'){ echo "selected";} ?>>Budha</option>
                            <option value="Katolik" <?php if($agama == 'Katolik'){ echo "selected";} ?>>Katolik</option>
                        </select>
                    </div>
                </div>
                </div>
                <br><br>
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4">Status Menikah :</label>
                    <div class="col-md-6">
                        <select name="statusMenikah" class="form-control">
                            <option value="Belum Menikah" <?php if($statusMenikah == 'Belum Menikah'){ echo "selected";} ?>>Belum Menikah</option>
                            <option value="Sudah Menikah" <?php if($statusMenikah == 'Sudah Menikah'){ echo "selected";} ?>>Sudah Menikah</option>
                            <option value="Janda" <?php if($statusMenikah == 'Janda'){ echo "selected";} ?>>Janda</option>
                            <option value="Duda" <?php if($statusMenikah == 'Duda'){ echo "selected";} ?>>Duda</option>
                        </select>
                    </div>
                </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4">Jenis Kelamin :</label>
                    <div class="col-md-6">
                        <select name="jenisKelamin" class="form-control">
                            <option value="Laki-laki" <?php if($jenisKelamin == 'Laki-laki'){ echo "selected";} ?>>Laki-laki</option>
                            <option value="Perempuan" <?php if($jenisKelamin == 'Perempuan'){ echo "selected";} ?>>Perempuan</option>
                        </select>
                    </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4">Tempat Lahir :</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="tmpLahir" placeholder="Tempat Lahir" value="<?php echo $tmpLahir; ?>">
                    </div>
                </div>
                </div>
                <br><br>
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4">Tanggal Lahir :</label>
                    <div class="col-md-6">
                        <input type="date" class="form-control" name="tglLahir" id="tglLahir" placeholder="Tanggal Lahir" value="<?php echo $tglLahir; ?>">
                    </div>
                </div>
                </div>
                <br><br>
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4" for="nama"></label>
                    <div class="col-md-6">
                        <img src="<?php echo base_url(); ?>karyawan/tampil_gambar/<?php echo $idKaryawan;?>" width=150 height=150>
                    </div>
                </div>
                </div>
                <br><br>
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4" for="nama">Foto Baru :</label>
                    <div class="col-md-6">
                        <input type="file" name="file" value="">
                    </div>
                </div>
                </div>
                <br><br>
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4" for="nama"></label>
                    <div class="col-md-6">
                        <p>Ukuran maksimal 300kb</p>
                    </div>
                </div>
                </div>
                <br><br>
            </div>
        </div>
        <h3 style="text-align:center;">Nama Pasangan atau Istri</h3>
        <hr>
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Nama Pasangan :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="namaPasangan" placeholder="Nama Pasangan" value="<?php echo $namaPasangan; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h3 style="text-align:center;">Pekerjaan</h3>
        <hr>
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4">Organisasi :</label>
                    <div class="col-md-6">
                        <select name="idOrg" id="idOrg" onchange="" class="form-control" required >
                            <option value="">Pilih Organisasi</option>
                            <?php 
                            foreach ($data_organisasi as $d) {?>
                                <option value="<?php echo $d['idOrg']; ?>" <?php if($data_pekerjaan[0]['idOrg'] == $d['idOrg']){ echo "selected";} ?> ><?php echo $d['namaOrg']; ?></option>
                            <?php
                                } 
                            ?>
                        </select>
                    </div>
                </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Departemen :</label>
                        <div class="col-md-6">
                            <select name="idDept" id="idDept" class="form-control" required >
                            <option value="">Pilih Departemen</option>
                            <?php 
                                    foreach ($data_departemen as $d) { 
                                        if($data_pekerjaan[0]['idOrg'] == $d['idOrg']){ 
                                            ?>
                                            <option value="<?php echo $d['idDept']; ?>" <?php if($data_pekerjaan[0]['idDept'] == $d['idDept']){ echo "selected";} ?>><?php echo $d['namaDept']; ?></option>
                                            <?php
                                        } 
                                    } 
                                ?>
                            </select>
                        </div>
                    </div>
                </div> 
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Jabatan :</label>
                        <div class="col-md-6">
                            <select name="idJabatan" id="idJabatan" class="form-control" required >
                            <option value="">Pilih Jabatan</option>
                            <?php 
                                    foreach ($data_jabatan as $d) { 
                                        if($data_pekerjaan[0]['idDept'] == $d['idDept']){ 
                                            ?>
                                            <option value="<?php echo $d['idJabatan']; ?>" <?php if($data_pekerjaan[0]['idJabatan'] == $d['idJabatan']){ echo "selected";} ?>><?php echo $d['namaJabatan']; ?></option>
                                            <?php
                                        } 
                                    } 
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Tanggal Masuk :</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control" name="tglMasuk" placeholder="Tanggal Masuk" value="<?php echo $data_pekerjaan[0]['tglMasuk']; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4"></label>
                        <div class="col-md-6">
                            <input type="submit" name="btnSubmit" value="Edit" style="float:right;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>