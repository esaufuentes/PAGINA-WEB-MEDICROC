<?php

use PHPMailer\PHPMailer\{PHPMailer, SMTP, Exception};

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

if (isset($_POST['submit'])) {

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $fecha = $_POST['fecha'];
    $telefono = $_POST['telefono'];
    $mensaje = $_POST['mensaje'];

    $ip = $_SERVER["REMOTE_ADDR"];
   

    $errors = array();

   

    $atributos = json_decode($response, TRUE);

   

    if (empty($nombre)) {
        $errors[] = 'El campo nombre es obligatorio';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'La dirección de correo electrónico no es válida';
    }

    if (empty($asunto)) {
        $errors[] = 'El campo asunto es obligatorio';
    }
    if (empty($fecha)) {
      $errors[] = 'El campo fecha es obligatorio';
    }

    if (empty($telefono)) {
      $errors[] = 'El campo Telefono es obligatorio';
    }

    if (empty($mensaje)) {
        $errors[] = 'El campo mensaje es obligatorio';
    }

    if (count($errors) == 0) {

        $msj = "De: $nombre <a href='mailto:$email'>$email</a><br>";
        $msj .= "Asunto: $asunto<br><br>";
        $msj .= "Fecha: $fecha<br><br>";
        $msj .= "Teléfono: $telefono<br><br>";
        $msj .= "Cuerpo del mensaje:";
        $msj .= '<p>' . $mensaje . '</p>';
        $msj .= "--<p>Este mensaje se ha enviado desde un formulario de contacto https://www.192.168.10.10.com/ </p>";

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->Host = 'mail.sindicatoautomotriz.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'info@sindicatoautomotriz.com';
            $mail->Password = '?.}m4n$z%S)=';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('info@sindicatoautomotriz.com', 'Contacto');
            $mail->addAddress('esaufuentes22@gmail.com', 'info@sindicatoautomotriz.com');
            //$mail->addReplyTo('otro@dominio.com');

            $mail->isHTML(true);
            $mail->Subject = 'Formulario de contacto';
            $mail->Body = utf8_decode($msj);

            $mail->send();

            $respuesta = 'Su Mensaje ha sido enviado y en breve recibira una respuesta';
        } catch (Exception $e) {
            $respuesta = 'Mensaje ' . $mail->ErrorInfo;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MEDICROC- Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="align-items-center d-none d-md-flex">
        <i class="bi bi-clock"></i> Lunes - Viernes, 9AM a 5PM
      </div>
      <div class="d-flex align-items-center">
        <i class="bi bi-phone"></i> Agenda tu Cita 9985838288
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

    
      <a href="index.html" ><img src="../assets/img/logo.jpg" alt="280" width="160"></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

      <?php include ('../pages/menu.php');?> 
    


  </header><!-- End Header -->


 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <!-- ======= Contact Section ======= -->
 <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Agenda Tu Cita</h2>
          <h4>Favor de llenar el formulario y en breve uno de nuestros agentes se comunicará con usted por via telefónica o WhatsApp</h4>

      </div>

     

      <div class="container">

        
          </div>

            <?php
            if (isset($errors)) {
                if (count($errors) > 0) {
            ?>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php
                                foreach ($errors as $error) {
                                    echo $error . '<br>';
                                }
                                ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

            <div class="col-lg-6">
          
                    <form class="form" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                        <div class="mb-3">
                            <label for="nombre" class="form-label"> Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label"> Correo electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="asunto" class="form-label"> Asunto</label>
                            <input type="text" class="form-control" id="asunto" name="asunto" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="fecha" class="form-label"> Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" required>
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label"> Telefono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" required>
                        </div>

                        <div class="mb-3">
                            <label for="mensaje" class="form-label"> Mensaje</label>
                            <textarea class="form-control" id="mensaje" name="mensaje" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                        <div class="loading">Loading</div>
                          <div class="error-message"></div>
                         <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
                    </form>

                </div>
            </div>

            <?php if (isset($respuesta)) { ?>
                <div class="row py-3">
                    <div class="col-lg-6 col-md-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo $respuesta; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            <?php } ?>
            


    </section><!-- End Contact Section -->  
 
   
   
  <!-- ======= Footer ======= -->

  <?php include ('../pages/footer.php');?> 
 <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>