<?php
defined('C5_EXECUTE') or die("Access Denied.");
$th = Loader::helper('text');
$c = Page::getCurrentPage();
?>

<div class="ccm-block-page-list-thumbnail-grid-wrapper">

    <?php if ($pageListTitle): ?>
        <div class="ccm-block-page-list-header">
            <h1 class="page-title"><?php echo $pageListTitle?></h1>
        </div>
    <?php endif; ?>

    <dl class="entry">

    <?php foreach ($pages as $page):
        $title = $th->entities($page->getCollectionName());
        $url = $nh->getLinkToCollection($page);
        $date = $c->getCollectionDateAdded('F j, Y');
        $target = ($page->getCollectionPointerExternalLink() != '' && $page->openCollectionPointerExternalLinkInNewWindow()) ? '_blank' : $page->getAttribute('nav_target');
        $target = empty($target) ? '_self' : $target;
        $thumbnail = $page->getAttribute('thumbnail');
        $topics = $page->getAttribute('news_topics');
        $hoverLinkText = $title;
        $description = $page->getCollectionDescription();
        $description = $controller->truncateSummaries ? $th->wordSafeShortText($description, $controller->truncateChars) : $description;
        $description = $th->entities($description);
        if ($useButtonForLink) {
            $hoverLinkText = $buttonLinkText;
        }

        ?>



        <dt class="entry-date"><?php echo $date ?></dt>


        <?php
            if (count($topics) && is_array($topics)) {
                foreach($topics as $topic) {
                    echo "<dd class='entry-category'>" . $topic->getTreeNodeDisplayName() . "</dd>";
                }
            }
        ?>

        <dd class="entry-title">
          <a href="<?php echo $url ?>" target="<?php echo $target ?>"><?php echo $title; ?></a>
          <p><?php echo $description; ?></p>
        </dd>


    <?php endforeach; ?>


    </dl>

    <?php if (count($pages) == 0): ?>
        <div class="ccm-block-page-list-no-pages"><?php echo $noResultsMessage?></div>
    <?php endif;?>

</div>

<?php if ($showPagination): ?>
    <div class="text-center"><?php echo $pagination;?></div>
<?php endif; ?>

<?php if ($c->isEditMode() && $controller->isBlockEmpty()): ?>
    <div class="ccm-edit-mode-disabled-item"><?php echo t('Empty Page List Block.')?></div>
<?php endif; ?>









