<?php
namespace Concrete\Package\Sakan;

use Concrete\Core\Package\Package;
use Concrete\Core\Page\Theme\Theme;
use Loader;
use FileImporter;
use BlockType;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends Package
{
    protected $pkgHandle = 'sakan';
    protected $appVersionRequired = '5.7.3';
    protected $pkgVersion = '0.8';
    protected $pkgAllowsFullContentSwap = true;

    public function getPackageDescription()
    {
        return t("Sakan theme is also help develop concrete5 site easier.");
    }

    public function getPackageName()
    {
        return t("sakan");
    }

    public function import_files()
    {
        if (is_dir($this->getPackagePath() . '/content_files')) {
            $fh = new FileImporter();
            $fm = Core::make('helper/file');
            $contents = $fm->getDirectoryContents($this->getPackagePath() . '/content_files');

            foreach ($contents as $filename) {
                $f = $fh->import($this->getPackagePath() . '/content_files/' . $filename, $filename);
            }
        }
    }

    public function install()
    {
        $pkg = parent::install();
        Theme::add('sakan', $pkg);
        BlockType::installBlockTypeFromPackage('sakan_image_text', $pkg);
    }

    public function upgrade()
    {
        parent::upgrade();
        $pkg = Package::getByHandle('sakan');
        $bt = BlockType::getByHandle('sakan_image_text');
        if (!is_object($bt)) {
            $bt = BlockType::installBlockTypeFromPackage('sakan_image_text', $pkg);
        }
    }

    public function on_start()
    {
        $al = \Concrete\Core\Asset\AssetList::getInstance();
        $al->register(
            'css',  'sakan-bootstrap', 'themes/sakan/css/bootstrap-modified.css', array(), 'sakan'
        );
        $al->register(
            'css',  'sakan-style', 'themes/sakan/css/style.css', array(), 'sakan'
        );
        $al->register(
            'javascript',  'sakan-bootstrap', 'themes/sakan/js/bootstrap.min.js', array(), 'sakan'
        );
    }
}
