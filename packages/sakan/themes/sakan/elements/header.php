<?php defined('C5_EXECUTE') or die("Access Denied."); ?>
<!DOCTYPE html>
<html lang="<?php echo Localization::activeLanguage()?>">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php Loader::element('header_required', array('pageTitle' => $pageTitle));?>
	<link href="<?php echo $this->getThemePath(); ?>/css/bootstrap-modified.css" rel="stylesheet">
	<link href="<?php echo $this->getThemePath(); ?>/css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <div class="<?php echo $c->getPageWrapperClass()?>">

	<header>
		<div class="navbar-inverse">
			<div class="container">
				<?php
					$a = new GlobalArea('Header Site Title');
					$a->display($c);

					$header_search = new GlobalArea('Header Search');
					$header_sub = new GlobalArea('Header Sub Navigation');

					if ($header_sub->getTotalBlocksInArea() + $header_search->getTotalBlocksInArea() > 0 || $c->isEditMode()) :
				?>
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#masthead" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div id="masthead" class="collapse navbar-collapse">
				<?php
					$header_search->display($c);
					$header_sub->display($c);
				?>
				</div><!-- /.nav-collapse -->
				<?php
					endif;
				?>
			</div>
		</div>
    <?php
      $a = new GlobalArea('Header Navigation');
      $a->display($c);
    ?>
	</header>


	

