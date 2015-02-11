<?php  defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<?php  $this->inc('elements/header.php'); ?>

	<main>
		<div id="breadcrumbArea">
		<?php 
		$a = new GlobalArea('Breadcrumb');
		$a->display($c);
		?>
		</div>
		<div id="mainArea" class="container">
			<div class="row">
				<div class="main-contents col-sm-9 col-sm-push-3 clearfix">
					<?php 
					$a = new Area('Main');
					$a->display($c);
					?>
				</div>
				<div class="sidebar col-sm-3 col-sm-pull-9">
					<?php 
					echo Loader::element('wgp/snav_title');
					$a = new GlobalArea('Sidebar');
					$a->display($c);
					?>
				</div>
			</div>
		</div>
	</main>

<?php  $this->inc('elements/footer.php'); ?>