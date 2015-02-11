<?php defined('C5_EXECUTE') or die("Access Denied.");
$navItems = $controller->getNavItems();
?>

<h2 class="side-heading">ニュース</h2>
<ul class="side-nav">
<?php foreach ($navItems as $ni): ?>
	<li><a href="<?php echo $ni->url?>"><?php echo $ni->name?></a></li>
<?php endforeach; ?>
</ul>
