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
</script>>
<div class="wrapper">
    <div class="content-wrapper">
    <section class="content-header">
      <h1> 
      </h1>
    </section>
    <section class="content" style="margin:10px 10px 0px 10px; background-color:white;">
    	<div class="container">
        <h3 style="text-align:center;">Ganti Akun <?php echo $this->session->userdata('username');?></h3>
        <font color="red"><center>*Otomatis Logout</center></font>
    <hr>
        	<form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>login/editkanAkun/<?php echo $idKaryawan; ?>" enctype="multipart/form-data">
    			   <div class="col-md-12">
                    <div class="col-md-6">
                    <div class="col-md-12">
                            <label class="control-label col-md-4">Nama Lengkap:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" value="<?php echo $username; ?>" disabled>
                            </div>
                        </div>    
                        <br><br>
                        <div class="col-md-12">
                            <label class="control-label col-md-4">Email:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>" required />
                            </div>
                        </div>    
                        <br><br>
                        <div class="col-md-12">
                            <label class="control-label col-md-4">Password :</label>
                            <div class="col-md-7">
                                <input type="Password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" required />
                                
                            </div>
                            <div class="col-md-1">
                            <input type=button class="btn btn- add-more" id="show" value="Show Password" onclick="ShowPassword()">
                                <input type=button class="btn btn-default btn-sm" style="display:none" id="hide" value="Hide Password" onclick="HidePassword()">
                        </div>
                        </div>

                        <br><br>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    
  </footer>

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>