<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $title ?></title>
<link href="<?php echo base_url() ?>images/logo_sm.png" rel="shortcut icon">
</head>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
<script src="<?php echo base_url(); ?>js/jquery-3.2.1.js"></script>
<script src="<?php echo base_url(); ?>js/app.min.js"></script>
<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%;
  
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
<body>

<section class="login">
<br><br><br><br><br><br><br><br><br><br><br>
    <section class="login">
    <div class="col-sm-8 col-sm-offset-4 col-md-6 col-md-offset-5 col-lg-4 col-lg-offset-4">
    <center><img src="images/sm.png"/></center>
     <?php
     // Cetak session
    if($this->session->flashdata('sukses')) {
        echo '<p class="text-warning" style="margin: 10px 20px;">'.$this->session->flashdata('sukses').'</p>';
    }

    // Cetak error
    echo validation_errors('<p class="warning" style="margin: 10px 20px;">','</p>');
    ?>
            <form action="<?php echo base_url('login') ?>" method="post">
      <p>
        <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
        
      </p>
      <p>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
      </p>
      <p>

      <a href="#" id="lupaPass">Lupa Password??</a><br>

      <center>
        <input type="submit" class="btn btn-outline btn-sm" name="submit" id="submit" value="Login" class="full">
      </center>
      </p>
    </form>
    <div id="myModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <center><img src="images/sm.png"/></center>
        <br>
        <center><h5>FORM LUPA PASSWORD</h5></center>
        <form action="<?php echo base_url('login/veriPass'); ?>" method="post">
          <p>
            <input type="text" class="form-control" name="email" id="email" placeholder="Masukan Email Anda Pada Sistem Pegawai Suara Merdeka" required>
          </p>
          <center>
            <input type="submit" class="btn btn-outline btn-sm" name="submit"  value="Kirim">
          </center>
          </p>
        </form>
      </div>
      </div>
            <script>
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("lupaPass");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        </script>
            </div>
</section>

</body>
</html>
