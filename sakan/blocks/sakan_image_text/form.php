<?php 
defined('C5_EXECUTE') or die("Access Denied.");
$al = Core::make('helper/concrete/asset_library');
$bf = null;

if ($controller->getFileID() > 0) {
    $bf = $controller->getFileObject();
}
?>

<fieldset>

    <legend><?php echo t('Files')?></legend>
<?php
$args = array();
?>

<div class="form-group">
	<label class="control-label"><?php echo t('Image')?></label>
	<?php echo $al->image('ccm-b-image', 'fID', t('Choose Image'), $bf, $args);?>
</div>
    <div class="form-group">
        <?php echo $form->label('altText', t('Alt. Text'))?>
        <?php echo $form->text('altText', $altText, array('style' => 'width: 60%;')); ?>
    </div>

    <div class="form-group">
        <?php echo $form->label('title', t('Title'))?>
        <?php echo $form->text('title', $title, array('style' => 'width: 60%;')); ?>
    </div>
</fieldset>

<fieldset>
    <legend><?php echo t('Text')?></legend>


<div class="form-group">
	<?php echo $form->label('content', t('Text'))?>
	<?php echo $form->textarea('content', $content, array('cols' => '60', 'rows' => '5')); ?>
</div>


</fieldset>

<fieldset>
    <legend><?php echo t('Image Position')?></legend>

    <div class="form-group">
        <label class="control-label"><?php echo t('PC')?></label>
        <div class="radio">
            <label>
                <?php echo $form->radio('PcPosition', 'left', $PcPosition)?>
                <span><?php echo t('Left')?></span>
            </label>
        </div>
        <div class="radio">
            <label>
                <?php echo $form->radio('PcPosition', 'center', $PcPosition)?>
                <span><?php echo t('Center')?></span>
            </label>
        </div>
        <div class="radio">
            <label>
                <?php echo $form->radio('PcPosition', 'right', $PcPosition)?>
                <span><?php echo t('Right')?></span>
            </label>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label"><?php echo t('Mobile')?></label>
        <div class="radio">
            <label>
                <?php echo $form->radio('SpPosition', 'left', $SpPosition)?>
                <span><?php echo t('Left')?></span>
            </label>
        </div>
        <div class="radio">
            <label>
                <?php echo $form->radio('SpPosition', 'center', $SpPosition)?>
                <span><?php echo t('Center')?></span>
            </label>
        </div>
        <div class="radio">
            <label>
                <?php echo $form->radio('SpPosition', 'right', $SpPosition)?>
                <span><?php echo t('Right')?></span>
            </label>
        </div>
    </div>

</fieldset>
