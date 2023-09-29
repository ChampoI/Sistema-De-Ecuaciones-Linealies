<?php
    $filas = $_POST['filas'];    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portfolio Details - Personal Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: MyResume - v4.3.0
  * Template URL: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
      .col-md-6 {
        display: block ruby;
    }
  </style>
</head>

<body>

    <!-- ======= Mobile nav toggle button ======= -->
    <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
    <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex flex-column justify-content-center">

        <nav id="navbar" class="navbar nav-menu">
            <ul>
                <li><a href="index.php" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
            </ul>
        </nav><!-- .nav-menu -->
    </header><!-- End Header -->

    <main id="main">
        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">
                <form action="<?php echo $_POST['metodo'];?>.php" method="post">
                    <fieldset>
                        <legend>Datos de la matriz</legend>
                        <table>
                            <?php for($i = 1; $i <= $filas; $i++ ) { ?>
                                <tr>
                                    <?php for($j = 1; $j <= $filas+1; $j++ ) { ?>
                                        <td>
                                            
                                            <div class="col-md-6 form-group mt-3 mt-md-0">    
                                                <?php 
                                                    if($j == ($filas+1)){
                                                        echo " =";
                                                    }
                                                ?>                                            
                                                <input style="text-align:center;" class="form-control" name="A[<?php echo $i;?>][<?php echo $j;?>]" value="0" multiple>
                                                <?php 
                                            
                                                    if($j < ($filas+1)){
                                                        echo "X".$j;
                                                    }   
                                                    
                                                    if($j < ($filas)){
                                                        echo "+";
                                                    }
                                                ?>  
                                            </div>                                        
                                                                
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </table>
                        <br>
                        <?php 
                            if($_POST['metodo'] == "seidel"){
                        ?>
                            <label for="error">Ingrese error estimado</label>
                            <input name="error" type="number" step="0.01" placeholder="0">
                        <?php
                            }
                        ?>
                       
                        <div class="text-center"><button type="submit">Calcular Incognitas</button></div>
                    </fieldset>
                </form> 
            </div>
        </section>
    </main><!-- End #main -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/purecounter/purecounter.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/typed.js/typed.min.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>
</html>