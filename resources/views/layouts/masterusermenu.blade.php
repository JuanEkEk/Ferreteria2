<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title></title>
</head>
<body>
<div class="container">
	<div class="nav-bar">
		<ul>
			<li><a href="">PERFIL</a></li>
			<li><a href="">VENTA</a></li>
			<li><a href="">CERRAR SESIÓN</a></li>
		</ul>
	</div>
	<div class="nav-mobile">
		<div class="menu-icon">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
</div>
</body>
</html>
<script src="js/jquery-3.4.1.min.js"></script>
<!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->
<script>
	$(document).ready(function(){
		$('menu-icon').click(function(){
			$('nav-bar').toggleClass('visible');
		});
	});
</script>