<?php include_once('../config/includes.php'); ?>
 
<!----------------------------------------------------------------------------
		Head
----------------------------------------------------------------------------->

<title><?php echo $config['title'] ?></title>

<META NAME="keywords" CONTENT="">
<META NAME="description" CONTENT="<?php echo $config['title'] ?>">
<META NAME="rating" CONTENT="General">
<META NAME="ROBOTS" CONTENT="ALL">
<META http-equiv="Content-type" content="text/html; charset=<?php echo $config['charset'];?>" />

<!-- Iconos -->
<link type="image/x-icon" href="<?php echo $route['doc'].$config['icono']?>" rel="icon" />
<link type="image/x-icon" href="<?php echo $route['doc'].$config['icono']?>" rel="shortcut icon" />

 
<!----------------------------------------------------------------------------
		Menu
----------------------------------------------------------------------------->


<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#"><?php echo $language['config']?></a>
	</div>
  
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<?php echo $language['transacciones'] ?><b class="caret"></b>
				</a>
        		<ul class="dropdown-menu">
        			<?php echo item_menu(BASE_URL.'views/transacciones.php', $language['transacciones']);?>
        			<?php echo item_menu(BASE_URL.'views/reporte_interbanking.php', $language['reporte']);?>        			
        			<?php echo item_menu(BASE_URL.'views/estados_transferencias.php', $language['estado']);?>
        		</ul>
      		</li>
      		<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<?php echo $language['config'] ?><b class="caret"></b>
				</a>
        		<ul class="dropdown-menu">
        			<?php echo item_menu(BASE_URL.'views/config_general.php', $language['config']);?>
        		</ul>
      		</li>
    	</ul>
	</div>
</nav>

<div class="container">
