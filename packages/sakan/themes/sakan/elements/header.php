<?php defined('C5_EXECUTE') or die("Access Denied."); ?>
<!DOCTYPE html>
<html lang="<?php echo Localization::activeLanguage()?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php Loader::element('header_required', array('pageTitle' => $pageTitle));?>
	  <link rel="stylesheet" href="<?php echo $this->getThemePath(); ?>/css/normalize.css">
	  <link rel="stylesheet" href="<?php echo $this->getThemePath(); ?>/css/foundation.min.css">
	  <link rel="stylesheet" href="<?php echo $this->getThemePath(); ?>/css/typography.css">
	  <link rel="stylesheet" href="<?php echo $this->getThemePath(); ?>/css/styles.less">
    <script src="<?php echo $this->getThemePath(); ?>/js/vendor/modernizr.js"></script>
  </head>

  <body>
  <div class="<?php echo $c->getPageWrapperClass()?>">
	<header>
			<div class="container">
				<div class="row">
					<div class="small-12 large-8 columns">
						<?php
		                  $a = new GlobalArea('Header Site Title');
		                  $a->display($c);
		                ?>
		            </div>
					<div class="small-12 large-4 columns">
		                <?php
		                  $a = new GlobalArea('Header Search');
		                  $a->display($c);
		                ?>
		            </div>
		        </div>
				<div class="row">
					<div class="contain-to-grid">
						<nav class="top-bar" data-topbar role="navigation">
							<ul class="title-area">
								<li class="name">
		                		</li>
		                		<li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
		                	</ul>
				                <?php
				                  $a = new GlobalArea('Header Sub Navigation');
				                  $a->display($c);
				                ?>
			            </nav>
			        </div>
				</div>
			</div>
	</header>
	
    <?php
      $a = new GlobalArea('Header Navigation');
      $a->display($c);
    ?>
