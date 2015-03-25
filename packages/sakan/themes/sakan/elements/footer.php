<?php
use Concrete\Core\Validation\CSRF\Token;
defined('C5_EXECUTE') or die("Access Denied."); ?>

<!-- FOOTER -->
<footer>
 <div id="footArea">
  <div class="container">
    <div class="row">
    <?php
      $a = new GlobalArea('Footer Site Title');
      $a->display($c);
    ?>
      <div class="medium-9 small-12 columns">
        <?php
          $a = new GlobalArea('Footer Navigation');
          $a->display($c);
        ?>
      </div>
      <div class="medium-3 small-12 columns">
        <?php
          $a = new GlobalArea('Footer Contact');
          $a->display($c);
        ?>
      </div>
    </div><!-- /.row -->
  </div><!-- /.container -->
 </div><!-- /#footArea -->
      
 <div id="copyArea">
  <div class="container">
    <div class="row">
      <div class="medium-9 small-12 columns">
        <?php
          $a = new GlobalArea('Footer Legal');
          $a->display($c);
        ?>

        <p><?php echo t('Built with <a href="http://www.concrete5.org" class="concrete5">concrete5</a> CMS.')?>
        
            <?php
            if (!id(new User)->isLoggedIn()) {
                ?>
                <a href="<?php echo URL::to('/login')?>">
                    <?php echo t('Log in') ?>
                </a>
                <?php
            } else {
                $token = new Token();
                ?>
                <form action="<?php echo URL::to('/login', 'logout') ?>">
                    <?php id(new Token())->output('logout'); ?>
                    <a href="#" onclick="$(this).closest('form').submit();return false">
                        <?php echo t('Log out') ?>
                    </a>
                </form>
                <?php
            }
            ?>
        </p>
      </div>
      <div class="medium-3 small-12 columns">
        <?php
          $a = new GlobalArea('Footer Social');
          $a->display($c);
        ?>
      </div>
    </div>
  </div><!-- /.container -->
 </div><!-- /.copyArea -->
</footer>

</div><!-- /getPageWrapperClass -->

<script src="<?php echo $this->getThemePath(); ?>/js/vendor/jquery.js"></script>
<script src="<?php echo $this->getThemePath(); ?>/js/foundation.min.js"></script>
<script>
  $(document).foundation();
</script>
<?php Loader::element('footer_required'); ?>
</body>
</html>

