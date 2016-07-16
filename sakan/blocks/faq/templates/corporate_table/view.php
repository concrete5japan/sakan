<?php defined('C5_EXECUTE') or die("Access Denied.");
$linkCount = 1;
$faqEntryCount = 1; ?>
<div class="ccm-corporate-table">
    <?php if (count($rows) > 0) { ?>
        <dl>
            <?php foreach ($rows as $row) { ?>
                <dt><?php echo $row['linkTitle'] ?></dt>
                <dd>
                    <?php
                    if($row['title'] && $row['description']) {
                        $row['title'] = "<p>" . $row['title'] . "</p>";
                    }
                    echo $row['title'];
                    echo $row['description'];
                    ?>
                </dd>
            <?php } ?>
        </dl>
    <?php } else { ?>
        <div class="ccm-faq-block-links">
            <p><?php echo t('No Faq Entries Entered.'); ?></p>
        </div>
    <?php
    }?>
</div>
