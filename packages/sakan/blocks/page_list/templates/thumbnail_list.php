<?php 
	defined('C5_EXECUTE') or die("Access Denied.");
	$textHelper = Loader::helper("text");
	$imgHelper = Loader::Helper('image');
?>

	<ul class="thumbnail-page-list">
	<?php for ($i = 0; $i < count($cArray); $i++ ): ?>
	<?php
		$cobj = $cArray[$i]; 
		$target = $cobj->getAttribute('nav_target');
		$title = $cobj->getCollectionName();
		$page_thumbnail_path = "";
		if ($cobj->getAttribute('page_thumbnail')) {
			$page_thumbnail_path = $cobj->getAttribute('page_thumbnail')->getVersion()->getRelativePath();
		}
	?>
		<li>
			<a href="<?php echo $nh->getLinkToCollection($cobj)?>">
				<?php if($page_thumbnail_path): ?>
				<img src="<?php echo $page_thumbnail_path ?>" alt="<?php echo $title ?>" />
				<?php endif; ?>
				<h3><?php echo $title ?></h3>
			</a>
		</li>
	<?php endfor; ?>
	</ul>

<?php if ($showPagination): ?>
	<div class="pagination__box">
		<ul class="pagination__list">
		<li><?php echo $paginator->getPrevious('＜') ?></li>
		<?php echo $paginator->getPages('li') ?>
		<li><?php echo $paginator->getNext('＞') ?></li>
	</div>
<?php endif; ?>
