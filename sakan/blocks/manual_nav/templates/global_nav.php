<?php defined('C5_EXECUTE') or die("Access Denied.");
$c = Page::getCurrentPage();
?>

    <?php if (count($rows) > 0) {
    $rows[0]['class'] = "nav-first";
    foreach ($rows as &$rowp) {
        if ($rowp['internalLinkCID'] === $c->getCollectionID()) {
            $rowp['class'] .= " nav-selected";
        }
    }
    ?>
    <nav id="globalNav" role="navigation" class="ccm-manual-nav-placeholder">
    	<div class="container">
		    <ul class="nav row text-center">
		    <?php foreach ($rows as $row) {
    ?>
			    <li class="col-sm-2 col-xs-6 <?php echo $row['class']?>">
				<a href="<?php echo $row['linkURL'] ?>"><?php echo $row['title'] != null ? h($row['title']) : h($row['collectionName']);
    ?></a>
			    </li>
		    <?php 
}
    ?>
		    </ul>
    	</div>
    </nav>
<?php 
} else {
    ?>
    <nav id="globalNav" role="navigation" class="ccm-manual-nav-placeholder">
    	<div class="container">
    		<div class="nav row text-center">
        		<p class="text-left"><?php echo t('No nav Entered.');
    ?></p>
    		</div>
    	</div>
    </nav>
<?php 
} ?>
