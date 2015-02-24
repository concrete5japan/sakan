<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>

<main>

    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-content">
                <?php
                $a = new Area('Main');
                $a->setAreaGridMaximumColumns(12);
                $a->display($c);
                ?>
            </div>
            <div class="col-sm-offset-1 col-sm-3 col-sidebar">
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
