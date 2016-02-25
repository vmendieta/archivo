<?php 

/*if (isset($_SESSION['username'])) {
	echo "<script>window.top.location = 'home';</script>";
	exit;
}*/
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>.: Archivo Nacional :.</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="http://localhost/archivo/app/views/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost/archivo/app/views/assets/font-awesome/css/font-awesome.min.css">
         <link rel="stylesheet" href="http://localhost/archivo/app/views/assets/css/style.css">
		<link rel="stylesheet" href="http://localhost/archivo/app/views/assets/css/form-elements.css">
       

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="http://localhost/archivo/app/views/assets/ico/favicon.png">
       

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                                  			<h3><strong>Archivo Nacional<br>Sistema de Control de Documentos</strong></h3>
                            		<p>Ingrese su Usuario y Contraseña</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="home/index" method="post" class="login-form" id="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Usuario</label>
			                        	<input id="username" type="text" name="username" placeholder="Usuario..." class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Contraseña</label>
			                        	<input id="password" type="password" name="password" placeholder="Contraseña..." class="form-password form-control" id="form-password">
			                        </div>
			                        <button id="btn_enviar" type="submit" class="btn" >Ingresar</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                   <!-- <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                        	<h3>...or login with:</h3>
                        	<div class="social-login-buttons">
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-facebook"></i> Facebook
	                        	</a>
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-twitter"></i> Twitter
	                        	</a>
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-google-plus"></i> Google Plus
	                        	</a>
                        	</div>
                        </div>
                    </div>-->
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="http://localhost/archivo/app/views/assets/js/jquery-1.11.1.min.js"></script>
        <script src="http://localhost/archivo/app/views/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="http://localhost/archivo/app/views/assets/js/jquery.backstretch.min.js"></script>
        <script src="http://localhost/archivo/app/views/assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="http://localhost/archivo/app/views/assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>