<?php
header('Content-type: text/html; charset=utf-8'); 
session_start(); 

include_once('../config/includes.php'); 
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="<?php echo $route['libraries']?>main/css/login.css">
<head>
<body>
<div class="container">
	<div class="login-container">
		<div id="output"></div>
		<div class="avatar" style="background-image: url('<?php echo $route['doc']?>user.png');">
		</div>
		<div class="form-box">
		<?php if(empty($_SESSION['nombre'])) { ?>
			<form action="comprobar.php" method="post" name="login"> 
				<div class="row">
					<input type="text" name="usuario_nombre" placeholder="<?php echo $language['ingrese']." ".$language['usuario']?>" autofocus/>
					<input type="password" name="usuario_clave" placeholder=<?php echo $language['ingrese']." ".$language['password']?>"/>
					<hr>
					<button class="btn btn-default" type="submit" name="enviar" value="1"/>
						<?php echo $language['ingresar']?>
					</button>
				</div>
				<br>
				<a href="" type="button" data-toggle="modal" data-target="#myModal">
				  <?php echo $language['no_ingreso']?>
				</a>
			</form>
		<?php } else { ?> 
			<div class="row">
				<b><?php echo $language['usuario']?>: </b>
				<?php echo $_SESSION['nombre']?>
				<hr>
				<a class="btn btn-default" href="transacciones.php">
					<?php echo $language['volver']?>
				</a>
				<a class="btn btn-default" href="logout.php">
					<?php echo $language['salir']?>
				</a>
			</div>
		<?php } ?>
		</div>
	</div>
</div> 

  
<!----------------------------------------------------------------------------
		Modal
----------------------------------------------------------------------------->
    

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<form action="correo.php" method="get">
		<div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only"><?php echo $language['cerrar'] ?></span>
				</button>
				<h4 class="modal-title" id="myModalLabel"><?php echo $language['no_acceso']	?></h4>
			</div>
			
			<div class="modal-body">
				<div class="form-group">
					<label><?php echo $language['mensaje'] ?></label>
					<textarea name="mensaje" type="text" class="form-control" required>
					</textarea>
				</div>
					<div class="form-group">
					<label><?php echo $language['email'] ?></label>
					<input name="email" type="email" class="form-control"placeholder="<?php echo $language['ingrese']." ".$language['email'] ?>" maxlength="64" required>
				</div>
			</div>
			
			<div class="modal-footer">
				<button type="submit" class="btn btn-default"><?php echo $language['enviar'] ?></button>
			</div>
			
		</div>
		</form>
	</div>
</div>
</body>
</html>

