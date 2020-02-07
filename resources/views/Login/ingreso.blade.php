<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bienvenido</title>
	<meta charset="UTF-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
  	{{--TOKEN PARA CAMBIOS--}}
    <meta name="token" id="token" value="{{ csrf_token() }}">
    {{--META PARA RUTA DINAMICA--}}

	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script src="js/font-awesome.css"></script>
	<script src="js/vue-resource.min.js"></script>
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<!--===============================================================================================-->
</head>
<body>
		<form action="{{url('login')}}" method="POST" class="login-form">
			@csrf
			<span>Iniciar Sesión</span>
			<input type="text" class="login-username" autofocus="true" placeholder="Usuario" name="user" />
  			<input type="password" class="login-password" placeholder="Password" name="password"/>
  			<input type="submit" value="Ingresar" class="login-submit" />
		</form>
</body>
</html>