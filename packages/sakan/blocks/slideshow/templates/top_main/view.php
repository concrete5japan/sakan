<?php defined('C5_EXECUTE') or die("Access Denied."); ?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
	<?php foreach($images as $no => $imgInfo): ?>
		<li data-target="#carousel-example-generic" data-slide-to="<?php echo $no ?>" class="<?php if($no == 0) echo 'active'; ?>"></li>
	<?php endforeach; ?>
	</ol>
	<div class="carousel-inner" role="listbox">
		<?php foreach($images as $no => $imgInfo): ?>
		<?php 
			$f = File::getByID($imgInfo['fID']); 
			$fp = new Permissions($f);
		?>
		<?php if($fp->canRead()): ?>
		<div class="item<?php if($no == 0) echo ' active'; ?>">
			<?php if($imgInfo['url']): ?>
			<a href="<?php echo $imgInfo['url'] ?>"><img src="<?php echo $f->getRelativePath() ?>" alt=""></a>
			<?php else: ?>
			<img src="<?php echo $f->getRelativePath() ?>" alt="">
			<?php endif; ?>
			<div class="carousel-caption">
				<h3>1</h3>
				<p>説明</p>
			</div>
		</div>
		<?php endif; ?>
		<?php endforeach; ?>
	</div>
	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		<span class="fa fa-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		<span class="fa fa-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
