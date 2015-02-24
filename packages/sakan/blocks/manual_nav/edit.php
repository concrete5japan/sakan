<?php  defined('C5_EXECUTE') or die(_("Access Denied."));
// LOAD FOR PAGE SELECTOR
$pageSelector = Loader::helper('form/page_selector');

// LOAD FOR REDACTOR & FILE SELECTOR
$fp = FilePermissions::getGlobal();
$tp = new TaskPermission();
 ?>

<style type="text/css">
#ccm-edit-addRow { text-decoration: none; }
#ccm-edit-rows a { cursor:pointer }
#ccm-edit-rows .ccm-edit-row { margin-bottom:12px;clear:both;padding:7px;background-color:#eee }
#ccm-edit-rows .ccm-edit-row a.moveUpLink { display:block; background:url(<?php  echo DIR_REL?>/concrete/images/icons/arrow_up.png) no-repeat center; height:10px; width:16px; }
#ccm-edit-rows .ccm-edit-row a.moveDownLink { display:block; background:url(<?php  echo DIR_REL?>/concrete/images/icons/arrow_down.png) no-repeat center; height:10px; width:16px; }
#ccm-edit-rows .ccm-edit-row a.moveUpLink:hover { background:url(<?php  echo DIR_REL?>/concrete/images/icons/arrow_up_black.png) no-repeat center; }
#ccm-edit-rows .ccm-edit-row a.moveDownLink:hover { background:url(<?php  echo DIR_REL?>/concrete/images/icons/arrow_down_black.png) no-repeat center; }
#ccm-edit-rows .ccm-edit-rowIcons { float:right; width:45px; text-align:left; margin-top: 10px; }
</style>

<div id="ccm-edit-rows">
<?php  foreach($links as $rowInfo) {
	$rowInfo['rowId'] = $rowInfo['position']; //we need some arbitrary unique number, so use the position (can't use link cID because there might be more than one menu item pointing to the same page)
	$rowInfo['pageName'] = Page::getByID($rowInfo['linkToCID'])->getCollectionName();
	$this->inc('edit_row.php', array('rowInfo' => $rowInfo));
} ?>
</div>

<div id="rowTemplateWrap" style="display:none">
<?php 
$tmpRowInfo = array(
	'rowId' => 'tempRowId',
	'linkToCID' => 'tempLinkToCID',
	'linkText' => 'tempLinkText',
	'pageName' => 'tempLinkText',
);
$this->inc('edit_row.php', array('rowInfo' => $tmpRowInfo));
?>
</div>


<div style="font-weight: bold;">
	[<a id="ccm-edit-addRow" class="ccm-sitemap-select-page" dialog-title="<?php  echo t('Choose Page'); ?>" href="<?php echo REL_DIR_FILES_TOOLS_REQUIRED; ?>/sitemap_search_selector.php?sitemap_select_mode=select_page&callback=manualNav_selectSitemapNode"><?php  echo t('Add Link To Menu...'); ?></a>]
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#ccm-edit-addRow').unbind();
		$('#ccm-edit-addRow').dialog();
	});
</script>
<hr />
