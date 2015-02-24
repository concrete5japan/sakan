<?php  defined('C5_EXECUTE') or die(_("Access Denied.")); ?>

<ul class="ccm-manual-nav">
<?php  foreach ($links as $link):
	$cssClasses = array();
	
	if ($link->isCurrent) {
		$cssClasses[] = 'nav-selected';
	}
	
	if ($link->inPath) {
		$cssClasses[] = 'nav-path-selected';
	}
	
	$cssClasses = implode(' ', $cssClasses);
	?>
	
	<li class="<?php  echo $cssClasses; ?>">
		<a href="<?php  echo $link->url; ?>" class="<?php  echo $cssClasses; ?>">
			<?php  echo htmlentities($link->text, ENT_QUOTES, APP_CHARSET); ?>
		</a>
	</li>

<?php  endforeach; ?>
</ul>
