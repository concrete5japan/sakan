<?php defined('C5_EXECUTE') or die("Access Denied."); ?>

<?php View::getInstance()->requireAsset('javascript', 'jquery');

$navItems = $controller->getNavItems();

echo '<div id="breadcrumbArea"><div class="container"><ul class="list-inline">'; //opens the top-level menu

foreach ($navItems as $ni) {
    echo '<li class="' . $ni->classes . '">'; //opens a nav item
    $name = (isset($translate) && $translate == true) ? t($ni->name) : $ni->name;
    if (!$ni->isCurrent) {
        echo '<a href="' . $ni->url . '" target="' . $ni->target . '" class="' . $ni->classes . '">';
    }
    echo $name;
    if (!$ni->isCurrent) {
        echo '</a>';
    }
    echo '</li>'; //closes a nav item
}

echo '</ul></div></div>'; //closes the top-level menu
echo '<div class="ccm-responsive-menu-launch"><i></i></div>'; // empty i tag for attaching :after or :before psuedos for things like FontAwesome icons.

