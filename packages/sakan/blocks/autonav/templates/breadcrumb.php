<?php defined('C5_EXECUTE') or die("Access Denied.");
$navItems = $controller->getNavItems(true);
echo '<div class="container"><ul class="list-inline">';
for ($i = 0; $i < count($navItems); $i++) {
	$ni = $navItems[$i];
/*
	if ($ni->isCurrent) {
		echo $ni->name;
	} else {
*/
		echo '<li><a href="' . $ni->url . '">' . $ni->name . '</a></li>';
//	}
}
echo '</ul></div>';
