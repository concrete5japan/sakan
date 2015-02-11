<?php defined('C5_EXECUTE') or die("Access Denied.");
$navItems = $controller->getNavItems();
?>

<ul class="side-nav">

<?php foreach ($navItems as $ni) {
	
	$classes = array();
	if ($ni->isCurrent) {
		$classes[] = 'current';
	}
	if ($ni->inPath) {
		$classes[] = 'current';
	}
	$classes = implode(" ", $classes);
	
	?>
	<li class="<?php echo $li_class; if ($ni->hasSubmenu) echo ' snav__listitem_parent';?>">
		<a class="<?php echo $classes?>" href="<?php echo $ni->url?>" target="<?php echo $ni->target?>"><?php echo $ni->name?></a>
	<?php if ($ni->hasSubmenu) {
		echo '<ul class="snav__childlist">'; //opens a dropdown sub-menu
	} else {
		echo '</li>'; //closes a nav item
		echo str_repeat('</ul></li>', $ni->subDepth);
	} 
} ?>

</ul>