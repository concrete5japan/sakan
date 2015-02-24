<?php defined('C5_EXECUTE') or die("Access Denied."); ?>
<!DOCTYPE html>
<html lang="<?php echo Localization::activeLanguage()?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $html->css($view->getStylesheet('main.less'))?>
    
    <?php Loader::element('header_required', array('pageTitle' => $pageTitle));?>
  </head>

  <body>
  <div class="<?php echo $c->getPageWrapperClass()?>">
	<header>
		<div class="navbar-inverse">
			<div class="container">
                <?php
                  $a = new GlobalArea('Header Site Title');
                  $a->display($c);
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
                  $a = new GlobalArea('Header Search');
                  $a->display($c);
                ?>
						<a href="#" onclick="$('#header_search_form').submit();"><span class="glyphicon glyphicon-search"></span></a>
					</form>
                <?php
                  $a = new GlobalArea('Header Sub Navigation');
                  $a->display($c);
                ?>
				</div><!-- /.nav-collapse -->
			</div>
		</div>

	</header>
	
    <?php
      $a = new GlobalArea('Header Navigation');
      $a->display($c);
    ?>
