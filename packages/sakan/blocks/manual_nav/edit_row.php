<?php  defined('C5_EXECUTE') or die(_("Access Denied.")); ?> 
<div id="ccm-edit-row<?php  echo $rowInfo['rowId']?>" class="ccm-edit-row">
	<input type="hidden" name="linkToCIDs[]" value="<?php  echo $rowInfo['linkToCID']?>">
	<div class="ccm-edit-rowIcons">
		<div style="float:right">
			<a onclick="ManualNavBlock.moveUp('<?php  echo $rowInfo['rowId']?>')" class="moveUpLink"></a>
			<a onclick="ManualNavBlock.moveDown('<?php  echo $rowInfo['rowId']?>')" class="moveDownLink"></a>									  
		</div>
		<div><a onclick="ManualNavBlock.removeRow('<?php  echo $rowInfo['rowId']?>')"><img src="<?php  echo ASSETS_URL_IMAGES?>/icons/delete_small.png" /></a></div>
	</div>
	<strong><?php  echo $rowInfo['pageName']; ?></strong>
	<br />
	<?php  echo t('Link Text'); ?>: <input type="text" name="linkTexts[]" value="<?php  echo $rowInfo['linkText']?>" style="margin: 5px 0; width: 150px;" />
</div>
