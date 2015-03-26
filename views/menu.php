<?php include_once('../config/includes.php'); ?>

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
