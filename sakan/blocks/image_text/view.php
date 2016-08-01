<?php defined('C5_EXECUTE') or die("Access Denied.");

$c = Page::getCurrentPage();
$divformat = '<div class="%s">%s</div>';
$imageWrapperClass = '';
$textWrapperClass = '';
switch ($PcPosition) {
    case 'left':
        $imageWrapperClass .= 'col-sm-4';
        $textWrapperClass .= 'col-sm-8';
        break;
    case 'right':
        $imageWrapperClass .= 'col-sm-4 col-sm-push-8';
        $textWrapperClass .= 'col-sm-8 col-sm-pull-4';
        break;
    case 'center':
        $imageWrapperClass .= 'col-sm-12';
        $textWrapperClass .= 'col-sm-12';
        break;
}
$imageWrapperClass .= ' ';
$textWrapperClass .= ' ';
switch ($SpPosition) {
    case 'left':
        $imageWrapperClass .= 'col-xs-4';
        $textWrapperClass .= 'col-xs-8';
        break;
    case 'right':
        $imageWrapperClass .= 'col-xs-4 col-xs-push-8';
        $textWrapperClass .= 'col-xs-8 col-xs-pull-4';
        break;
    case 'center':
        $imageWrapperClass .= 'col-xs-12';
        $textWrapperClass .= 'col-xs-12';
        break;
}

if (is_object($f)) {
    $image = Core::make('html/image', array($f));
    $imageTag = $image->getTag();
    $imageTag->addClass('ccm-image-block img-responsive bID-'.$bID);
    if ($altText) {
        $imageTag->alt(h($altText));
    } else {
        $imageTag->alt('');
    }
    if ($title) {
        $imageTag->title(h($title));
    }

    printf($divformat,$imageWrapperClass,$imageTag);

    $textcontent = nl2br(strip_tags($content));
    printf($divformat,$textWrapperClass,$textcontent);

} else if ($c->isEditMode()) { ?>

    <div class="ccm-edit-mode-disabled-item"><?php echo t('Image not Selected.')?></div>

<?php } ?>
