<?php
use Concrete\Core\Validation\CSRF\Token;
defined('C5_EXECUTE') or die("Access Denied."); ?>

<!-- FOOTER -->
<footer>
 <div id="footArea">
  <div class="container">
                <?php
                  $a = new GlobalArea('Footer Site Title');
                  $a->display($c);
                ?>
   <div class="row">
    <div class="col-sm-9">
                <?php
                  $a = new GlobalArea('Footer Navigation');
                  $a->display($c);
                ?>
    </div><!-- /.col-sm-9 -->
    <div class="col-sm-3">
                <?php
                  $a = new GlobalArea('Footer Contact');
                  $a->display($c);
                ?>
    </div><!-- /.col-sm-3 -->
   </div><!-- /.row -->
  </div><!-- /.container -->
 </div><!-- /#footArea -->
      
 <div id="copyArea">
  <div class="container">
   <div class="row">
    <div class="col-sm-9">
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

    </div><!-- /.col-sm-9 -->
    <div class="col-sm-3">
                <?php
                  $a = new GlobalArea('Footer Social');
                  $a->display($c);
                ?>
    </div><!-- /.col-sm-3 -->
   </div><!-- /.row -->
  </div><!-- /.container -->
 </div><!-- /.copyArea -->
</footer>

</div><!-- /getPageWrapperClass -->


<?php Loader::element('footer_required'); ?>
</body>
</html>

