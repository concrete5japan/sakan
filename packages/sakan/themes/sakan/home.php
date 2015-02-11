<?php  defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<?php  $this->inc('elements/header.php'); ?>
	<main>
		<div id="mainimagesArea" class="container">
			<?php 
			$a = new Area('Header');
			$a->display($c);
			?>
		</div>
		<div id="visitorsArea" class="container">
			<?php 
			$a = new Area('visitorsArea');
			$a->display($c);
			?>
		</div>
		<div id="mainArea" class="container">
            <?php 
                $ae = new Area('Emergency');
				if ($c->isEditMode() | $ae->getTotalBlocksInArea($c) > 0) {
				$ae->display($c);
				}
			$a = new Area('Main');
			$a->display($c);
			?>
		</div>
	</main>

<?php  $this->inc('elements/footer.php'); ?>
