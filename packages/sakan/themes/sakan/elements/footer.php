<?php  defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
	<footer>
		<div id="footArea">
			<div class="container">
				<h1 class="foot-heading">学校法人渋谷学園　道玄坂大学</h1>
				<div class="row">
					<div class="col-sm-9">
						<?php 
						$a = new GlobalArea('footer_navi');
						$a->display($c);
						?>
					</div>
					<div class="col-sm-3">
						<a href="#"><img src="<?php echo $this->getThemePath();?>/images/dogenzaka_univ_logo.png" alt="学校法人渋谷学園道玄坂大学" class="logo img-responsive center-block" width="150"></a>
					</div>
				</div>
			</div>
		</div>
		<div id="copyArea">
			<div class="container">
				<div class="pull-right">
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
				</div>
				<div>
					&copy 2015 Dogenzaka University.
				</div>
			</div>
		</div>
	</footer>
	<?php global $cp;
	$canViewToolbar = (isset($cp) && is_object($cp) && $cp->canViewToolbar());
	if (!$c->isEditMode()) {?>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="<?php echo $this->getThemePath();?>/js/bootstrap.min.js"></script>
	<?php } ?>
	<?php  Loader::element('footer_required'); ?>
</body>
</html>