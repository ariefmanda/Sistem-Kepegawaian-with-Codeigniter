<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>suara Merdeka</title>
<link href="<?php echo base_url() ?>images/logo_sm.png" rel="shortcut icon">
</head>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
<body>
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
<section class="login">

    <center>
    <h1>Sistem Informasi Pegawai Suara Merdeka</h1>
    <h4>Reset Password</h4>
    <font color="red">Hey <?php echo $username; ?> Pastikan pasword anda sama agar diproses oleh sistem</font>
    </center>
    <br><br><br>
  
          <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>login/resetPass" enctype="multipart/form-data">
             <div class="col-md-12">
                    <div class="col-md-10">
                    <input type="hidden" value="<?php echo $idKaryawan; ?>" name="idKaryawan">
                        <div class="col-md-12">
                            <label class="control-label col-md-4">Password Baru:</label>
                            <div class="col-md-7">
                                <input type="Password" class="form-control" name="password" id="password" placeholder="Password" required />
                                
                            </div>
                            <div class="col-md-1">
                            <input type=button class="btn btn- add-more" id="show" value="Show" onclick="ShowPassword()">
                                <input type=button class="btn btn-default btn-sm" style="display:none" id="hide" value="Hide" onclick="HidePassword()">
                            </div>
                        </div>
                        <br><br><br>
                        <div class="col-md-12">
                            <label class="control-label col-md-4"></label>
                            <div class="col-md-7">
                                <input type="submit" class="btn btn-default btn-sm" name="btnSubmit" value="Simpan">
                            </div>
                        </div>
                    </div>
                </div>
        </form>
        </div>
    </section>
</body>
</html>
