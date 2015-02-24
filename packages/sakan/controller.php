<?php
namespace Concrete\Package\Sakan;

use Concrete\Core\Package\Package;
use BlockType;
use Concrete\Core\Block\BlockController;
use Concrete\Core\Page\Theme\Theme;
use Loader;
use FileImporter;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends Package
{

    protected $pkgHandle = 'sakan'; //パッケージハンドル
    protected $appVersionRequired = '5.7.3'; //concrete5のバージョン
    protected $pkgVersion = '1.0'; //パッケージのバージョン
    protected $pkgAllowsFullContentSwap = true; //インストール時にコンテンツを上書きする

    public function getPackageDescription()
    {
        return t("Sakan theme is also help develop concrete5 site easier.");  //パッケージの説明
    }

    public function getPackageName()
    {
        return t("sakan"); //パッケージ名
    }
    
    public function import_files() 
    {
            // now we add in any files that this package has
            if (is_dir($this->getPackagePath() . '/content_files'))
             {

                $fh = new FileImporter();
                $contents = Loader::helper('file')->getDirectoryContents($this->getPackagePath() . '/content_files');

                foreach ($contents as $filename) 
                {
                    $f = $fh->import($this->getPackagePath() . '/content_files/' . $filename, $filename);
                }
            }
    }
    
    public function install()
    {
        $pkg = parent::install();
        Theme::add('sakan', $pkg); //テーマのインストール 
        BlockType::installBlockTypeFromPackage('manual_nav', $pkg); //manual navのインストール
    }

//    public function uninstall() 
//    {
//        parent::uninstall();
//        $db = Loader::db();
//        $db->Execute('DROP TABLE btManualNav, btManualNavLinks');
//    }
}
