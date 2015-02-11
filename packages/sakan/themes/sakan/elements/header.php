<?php  defined('C5_EXECUTE') or die(_("Access Denied.")); ?><!DOCTYPE html>
<html lang="ja">
<head>
<?php  Loader::element('header_required'); ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href="<?php echo $this->getThemePath();?>/css/styles.css" rel="stylesheet">
<?php if ($c->isEditMode()) { ?>
	<link href="<?php echo $this->getThemePath();?>/css/editmode.css" rel="stylesheet">
<? }?>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
	<header>
		<div class="navbar-inverse">
			<div class="container">
				<a class="navbar-brand" href="/"><img src="<?php echo $this->getThemePath();?>/images/dogenzaka_univ_logo.png" alt="学校法人渋谷学園道玄坂大学" class="img-responsive"></a>
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#masthead" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div id="masthead" class="collapse navbar-collapse">
					<form class="navbar-form navbar-right" action="/search_result" id="header_search_form">
						<input type="text" class="form-control" name="query" value="" placeholder="Search...">
						<a href="#" onclick="$('#header_search_form').submit();"><span class="glyphicon glyphicon-search"></span></a>
					</form>
					<?php 
					$a = new GlobalArea('navibar');
					$a->display($c);
					?>
				</div><!-- /.nav-collapse -->
			</div>
		</div>
		<nav id="globalNav" role="navigation">
			<div class="container">
				<?php 
				$a = new GlobalArea('Header Nav');
				$a->display($c);
				?>
			</div>
		</nav>
	</header>