<?php
defined('C5_EXECUTE') or die("Access Denied.");
$textHelper = Loader::helper("text");
$imgHelper = Loader::Helper('image');
global $c;
?>
<dl class="entry">
	<?php 
	$isFirst = true; //So first item in list can have a different css class (e.g. no top border)
	$excerptBlocks = ($controller->truncateSummaries ? 1 : null); //1 is the number of blocks to include in the excerpt
	$truncateChars = ($controller->truncateSummaries ? $controller->truncateChars : 0);
	$dateHelper = Loader::helper('date');
	/* @var $dateHelper DateHelper */
	foreach ($cArray as $cobj):
		$title = $cobj->getCollectionName();
		//$date = $dateHelper->formatDate($cobj->getCollectionDatePublic(), true);
		$date = $cobj->getCollectionDatePublic('Y年m月d日');
		$author = $cobj->getVersionObject()->getVersionAuthorUserName();
		$link = $nh->getLinkToCollection($cobj);
		$firstClass = $isFirst ? 'first-entry' : '';
		$entryController = Loader::controller($cobj);
		if(method_exists($entryController,'getCommentCountString')) {
			$comments = $entryController->getCommentCountString('%s '.t('Comment'), '%s '.t('Comments'));
		}
		$isFirst = false;

		// アイコン
		$news_type = $cobj->getAttribute('news_type');
		$news_type_handle = '';
		$news_type_name = '';
		if ($news_type instanceof SelectAttributeTypeOptionList) {
			$news_type_options = $news_type->getOptions();
			foreach ($news_type_options as $o) {
				$news_type_handle = $o->getSelectAttributeOptionValue();
				$news_type_handle = $textHelper->handle($news_type_handle);
				$news_type_name = $o->getSelectAttributeOptionDisplayValue();
			}
		}
	?>
	<dt class="published"><?php echo $date; ?></dt>
	<dd class="entry-meta <?php echo $news_type_handle; ?>"><?php echo $news_type_name; ?></dd>
	<dd class="entry-title"><a href="<?php echo $link; ?>" rel="bookmark"><?php echo $title; ?></a></dd>
	<?php endforeach; ?>
</dl>

<?php if ($paginate && $num > 0 && is_object($pl)): ?>
<div id="pagination">
	<?php
	$summary = $pl->getSummary();
	if ($summary->pages > 1):
		$paginator = $pl->getPagination();
	?>
		<span class="pagination-left">&laquo; <?php echo $paginator->getPrevious('Newer Posts'); ?></span>
		<span class="pagination-right"><?php echo $paginator->getNext('Older Posts'); ?> &raquo;</span>
		<?php echo $paginator->getPages(); ?>
	<?php endif; ?>
</div>
<?php endif; ?>
