<script type="text/javascript">
$(document).ready(function(){

$("#eMail").change(function (){
        $("#pesan_email").hide();
        // ambil value email dari form
        var eMail = $("#eMail").val();
        if(eMail != ""){
                // proses pengecekan email tersedia atau tidak.
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>karyawan/cek_status_email", //arahkan pada proses_tambah di controller member
                    data: "eMail="+eMail,
                    success: function(msg){
                        if(msg==1){
                            $("#pesan_email").css("color","#fc5d32");
                            $("#eMail").css("border-color","#fc5d32");
                            $("#pesan_email").html("Maaf Email sudah digunakan.");
                            error = 1;
                        }else{
                            error = 0;
                        }
                        $("#pesan_email").fadeIn(1000);
                    }
                });
            
        }
         
});

$("#idOrg").change(function (){
                var idOrg=$("#idOrg").val();
                $.ajax({
                    type : "POST",
                    url : "<?php echo base_url(); ?>index.php/karyawan/departemen",
                    data : "idOrg="+idOrg,
                    success : function(data){
                $("#idDept").html(data);
            }
               
            });
});

$("#idDept").change(function (){
                var idDept=$("#idDept").val();
                $.ajax({
                    type : "POST",
                    url : "<?php echo base_url(); ?>index.php/karyawan/jabatan",
                    data : "idDept="+idDept,
                    success : function(data){
                $("#idJabatan").html(data);
            }
               
            });
});
});
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
    <h3 style="text-align:center;">Tambah Karyawan</h3>
    <hr>
    <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/karyawan/tambahkan/<?php echo $idKaryawan; ?>" enctype="multipart/form-data">
        <input type="hidden" class="form-control" name="page" value="anak">
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Nama Lengkap :</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="namaLengkap" placeholder="Nama Lengkap"   required>
                        </div>
                    </div>
                </div>    
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Nama Panggil :</label>
                        <div class="col-md-7">       
                           <input type="text" class="form-control" name="namaPanggil" placeholder="Nama Panggil"  required >
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Alamat :</label>
                        <div class="col-md-7">
                            <textarea type="text" class="form-control" name="alamat" placeholder="Alamat"   required></textarea>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Kota :</label>
                        <div class="col-md-7">
                            <input text="text" class="form-control" name="kota" placeholder="Kota"   required>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Propinsi :</label>
                        <div class="col-md-7">
                            <input text="text" class="form-control" name="propinsi" placeholder="Propinsi"   required>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4">Kode Pos :</label>
                    <div class="col-md-7">
                        <input type="number" class="form-control" name="kodepos" placeholder="Kode Pos"  >
                    </div>
                </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">EMail :</label>
                        <div class="col-md-7">       
                           <input type="email" class="form-control" name="eMail" id="eMail" placeholder="EMail"  required >
                           <span id='pesan_email'></span>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Telephone Rumah:</label>
                        <div class="col-md-7">       
                           <input type="number" class="form-control" name="telpRumah" placeholder="Telephone Rumah">
                        </div>
                    </div>
                </div>    
                <br><br>
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4">Nomer Handphone :</label>
                    <div class="col-md-7">
                        <input type="number" class="form-control" name="handphone" placeholder="Nomer Handphone"   required>
                    </div>
                </div>
                </div>
                <br><br>
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4">Tempat Lahir :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="tmpLahir" placeholder="Tempat Lahir"   required>
                    </div>
                </div>
                </div>
                <br><br>
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4">Tanggal Lahir :</label>
                    <div class="col-md-7">
                        <input type="date" class="form-control" name="tglLahir" id="tglLahir" placeholder="Tanggal Lahir"  required >
                    </div>
                </div>
                </div>
                <br><br>
            </div>

            <div class="col-md-6">
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4">Tipe Identitas :</label>
                    <div class="col-md-7">
                        <select name="tipeIdentitas" class="form-control"  >
                            <option value="KTP"><button id="g">KTP</button></option>
                            <option value="SIM">SIM</option>
                            <option value="Lain-lain">Lain-lain</option>
                        </select>
                    </div>
                </div>
                </div>
                <br><br>
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4">Nomer Identitas :</label>
                    <div class="col-md-7">
                        <input type="number" class="form-control" name="noIdentitas" placeholder="Nomer Identitas"  required >
                    </div>
                </div>
                </div>
                <br><br>
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4">Golongan Darah :</label>
                    <div class="col-md-7">
                        <select name="golDarah" class="form-control"  >
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>
                </div>
                </div>
                <br><br>
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4">Agama :</label>
                    <div class="col-md-7">
                        <select name="agama" class="form-control"  >
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Budha">Budha</option>
                            <option value="Katolik">Katolik</option>
                        </select>
                    </div>
                </div>
                </div>
                <br><br>
                 <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4">Jenis Kelamin :</label>
                    <div class="col-md-7">
                        <select name="jenisKelamin" class="form-control"  >
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4">Status Menikah :</label>
                    <div class="col-md-7">
                        <select name="statusMenikah" class="form-control"  >
                            <option value="Belum Menikah">Belum Menikah</option>
                            <option value="Sudah Menikah">Sudah Menikah</option>
                            <option value="Janda">Janda</option>
                            <option value="Duda">Duda</option>
                        </select>
                    </div>
                </div>
                </div>
                <br><br>
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4" for="nama">Foto Baru :</label>
                    <div class="col-md-6">
                        <input type="file" name="file" required>
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
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4">Status Kerja :</label>
                    <div class="col-md-7">
                        <select name="statusKerja" class="form-control" required >
                            <option value="aktif">Aktif</option>
                            <option value="keluar">Keluar</option>
                        </select>
                    </div>
                </div>
                </div>
                <br><br>
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4">Level login:</label>
                    <div class="col-md-7">
                        <select name="level" class="form-control" required >
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <h3 style="text-align:center;">Pekerjaan Karyawan</h3>
        <hr>
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label col-md-4">Organisasi :</label>
                    <div class="col-md-6">
                        <select name="idOrg" id="idOrg" onchange="" class="form-control" required >
                            <option value="">Pilih Organisasi</option>
                            <?php foreach ($data_organisasi as $d) {?>
                            <option value="<?php echo $d['idOrg']; ?>"><?php echo $d['namaOrg']; ?></option>
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
                            </select>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Tanggal Masuk :</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control" name="tglMasuk" placeholder="Tanggal Masuk"  required >
                        </div>
                    </div>
                </div>
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
                            <input type="text" class="form-control" name="namaPasangan" placeholder="Nama Pasangan">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h3 style="text-align:center;">Orang Tua</h3>
        <hr>
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Nama Ayah :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="namaAyah" placeholder="Nama Ayah">
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Nama Ibu</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="namaIbu" placeholder="Nama Ibu">
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Alamat Orang Tua :</label>
                        <div class="col-md-6">
                            <textarea type="text" class="form-control" name="alamatOrtu" placeholder="Alamat Orang Tua"></textarea>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Kota Orang Tua</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="kotaOrtu" placeholder="Kota Orang Tua">
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Provinsi Orang Tua</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="provOrtu" placeholder="Provinsi Orang Tua" >
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Kode POS Orang Tua</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="kodeposOrtu" placeholder="Kode POS Alamat Orang Tua" >
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Nomor Telpon Orang Tua</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="telpOrtu" placeholder="Nomor Telpon Orang Tua">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h3 style="text-align:center;">Mertua</h3>
        <hr>
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Nama Ayah Mertua :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="namaAyahMertua" placeholder="Nama Ayah Mertua" >
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Nama Ibu Mertua :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="namaIbuMertua" placeholder="Nama Ibu Mertua" >
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Alamat Mertua :</label>
                        <div class="col-md-6">
                            <textarea type="text" class="form-control" name="alamatMertua" placeholder="Alamat Mertua" ></textarea>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Kota Mertua :</label>
                        <div class="col-md-6">
                            <textarea type="text" class="form-control" name="kotaMertua" placeholder="kota Mertua" ></textarea>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Prov Mertua :</label>
                        <div class="col-md-6">
                            <textarea type="text" class="form-control" name="provinsiMertua" placeholder="Prov Mertua" ></textarea>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Kode POS Mertua</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="kodeposMertua" placeholder="Kode POS Alamat Orang Tua" >
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Nomor Telpon Mertua</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="telpMertua" placeholder="Nomor HP Mertua" r>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4"></label>
                        <div class="col-md-6">
                            <input type="submit" name="btnSubmit" value="Tambah">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>