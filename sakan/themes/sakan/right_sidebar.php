<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>
<?php
  $a = new GlobalArea('Breadcrumb');
  $a->display($c);
?>
<main>
    <div class="container">
        <div class="row">
            <div class="main-contents col-sm-9">
                <?php
                $a = new Area('Main');
                $a->setAreaGridMaximumColumns(12);
                $a->display($c);
                ?>
            </div>
            <div class="sidebar col-sm-3">
                <?php
                $a = new Area('Sidebar');
                $a->display($c);
                $a = new Area('Sidebar Footer');
                $a->display($c);
                ?>
            </div>
        </div>
    </div>
</main>

<?php  $this->inc('elements/footer.php'); ?>
