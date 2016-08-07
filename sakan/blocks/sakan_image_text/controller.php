<?php
namespace Concrete\Package\Sakan\Block\SakanImageText;

use Database;
use File;
use Concrete\Core\Block\BlockController;

class Controller extends BlockController
{
    protected $btInterfaceWidth = 400;
    protected $btInterfaceHeight = 550;
    protected $btTable = 'btSakanImageText';
    protected $btCacheBlockRecord = true;
    protected $btCacheBlockOutput = true;
    protected $btCacheBlockOutputOnPost = true;
    protected $btCacheBlockOutputForRegisteredUsers = true;
    protected $btWrapperClass = 'ccm-ui';
    protected $btExportFileColumns = array('fID');
    protected $btFeatures = array(
        'image',
    );

    /**
     * Used for localization. If we want to localize the name/description we have to include this.
     */
    public function getBlockTypeDescription()
    {
        return t("Adds images and texts, with some display settings.");
    }

    public function getBlockTypeName()
    {
        return t("Image and Text");
    }

    public function view()
    {
        $f = File::getByID($this->fID);
        if (!is_object($f) || !$f->getFileID()) {
            return false;
        }

        $this->set('f', $f);
        $this->set('altText', $this->altText);
        $this->set('title', $this->title);

        $this->set('PcPosition', $this->getChoice($this->PcPosition));
        $this->set('SpPosition', $this->getChoice($this->SpPosition));

        $this->set('content', $this->content);
    }

    public function getJavaScriptStrings()
    {
        return array(
            'image-required' => t('You must select an image.'),
        );
    }

    public function getChoice($var)
    {
        $valid_array = array('left', 'center', 'right');
        $default_var = 'center';
        if (in_array($var, $valid_array)) {
            return $var;
        } else {
            return $default_var;
        }
    }

    public function save($args)
    {
        $args = $args + array(
            'fID' => 0,
        );
        $args['fID'] = ($args['fID'] != '') ? $args['fID'] : 0;
        $args['PcPosition'] = $this->getChoice($args['PcPosition']);
        $args['SpPosition'] = $this->getChoice($args['SpPosition']);
        parent::save($args);
    }
}
