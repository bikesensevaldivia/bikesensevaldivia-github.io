<?php header( "refresh:5;url=index.html" );
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Bike Sense - Tu pedaleo es nuestra prioridad</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
<script src="js/wow.min.js"></script>
<!--<script src="js/jquery.easydropdown.js"></script>-->
<!--start slider -->
<link rel="stylesheet" href="css/fwslider.css" media="all">
<script src="js/jquery-ui.min.js"></script>
<script src="js/fwslider.js"></script>
<!--end slider -->
<script >
	$(function(){
            new WOW().init();
        });
</script>

</head>
<body>
	<div class="header">
		<div class="container">
			<div class="row">
			    <div class="col-md-12">
				 	<div class="header-left">
					  <div class="logo">
						<a href="index.html"><img src="images/logo.png" alt=""/></a>
					  </div>
					  <div class="menu wow bounceInLeft"  data-wow-delay="0.5s">
						  <a class="toggleMenu" href="#"><img src="images/nav.png" alt="" /></a>
						    <ul class="nav" id="nav">
						    	<li><a href="#idea">Idea</a></li>
						    	<li><a href="#impacto">Impacto</a></li>
						    	<li><a href="#video">Video</a></li>
						    	<li><a href="#staff">Staff</a></li>
						    	<li><a href="#contacto">Contacto</a></li>					
								<div class="clear"></div>
							</ul>
							<script type="text/javascript" src="js/responsive-nav.js"></script>
				      </div>							
	    		    <div class="clear"></div>
	    	    	</div>
	       		</div>
	      	</div>
		</div>
	</div>

<!--contacto ---------->
	
<!--contacto ---------->
		<div class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<ul class="footer_box">
							<h4>BikeSense Valdivia 2017</h4>
							<li></li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>

<?php
if(isset($_POST['email'])) {
 
    // Edita las dos líneas siguientes con tu dirección de correo y asunto personalizados
 
    $email_to = "abanderas2003@hotmail.com";
 
    $email_subject = "Contacto por Bikesense";   
 
    function died($error) {
 
        // si hay algún error, el formulario puede desplegar su mensaje de aviso
 
        echo "Lo sentimos, hubo un error en sus datos y el formulario no puede ser enviado en este momento. ";
 
        echo "Detalle de los errores.<br /><br />";
        
        echo $error."<br /><br />";
 
        echo "Porfavor corrija estos errores e inténtelo de nuevo.<br /><br />";
        die();
    }
 
    // Se valida que los campos del formulairo estén llenos
 
    if(!isset($_POST['first_name']) ||
 
        !isset($_POST['last_name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['telephone']) ||
 
        !isset($_POST['message'])) {
 
        died('Lo sentimos pero parece haber un problema con los datos enviados.');       
 
    }
 //En esta parte el valor "name" nos sirve para crear las variables que recolectaran la información de cada campo
    
    $first_name = $_POST['first_name']; // requerido
 
    $last_name = $_POST['last_name']; // requerido
 
    $email_from = $_POST['email']; // requerido
 
    $telephone = $_POST['telephone']; // no requerido 

    $message = $_POST['message']; // requerido
 
    $error_message = "";

//En esta parte se verifica que la dirección de correo sea válida 
    
   $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'La dirección de correo proporcionada no es válida.<br />';
 
  }

//En esta parte se validan las cadenas de texto

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'El formato del nombre no es válido<br />';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= 'el formato del apellido no es válido.<br />';
 
  }
 
  if(strlen($message) < 2) {
 
    $error_message .= 'El formato del texto no es válido.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
//A partir de aqui se contruye el cuerpo del mensaje tal y como llegará al correo

    $email_message = "Contenido del Mensaje.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Nombre: ".clean_string($first_name)."\n";
 
    $email_message .= "Apellido: ".clean_string($last_name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Teléfono: ".clean_string($telephone)."\n";
 
    $email_message .= "Mensaje: ".clean_string($message)."\n";
  
 
//Se crean los encabezados del correo
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion(); 
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
 
 
<!-- incluye aqui tu propio mensaje de Éxito-->
 
<h2>¡Gracias por su interés! Nos pondremos en contacto con usted a la brevedad</h2>
<?php

}
 
?>

</body>	
</html>