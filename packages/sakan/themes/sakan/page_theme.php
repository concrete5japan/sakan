<?php

namespace Concrete\Package\Sakan\Theme\Sakan;

use Concrete\Core\Page\Theme\Theme;

class PageTheme extends Theme
{

    public function registerAssets() 
    {
        $this->providesAsset('javascript', 'bootstrap');
        $this->providesAsset('css', 'bootstrap');
        $this->providesAsset('css', 'blocks/form');
        $this->providesAsset('css', 'blocks/social_links');
        $this->providesAsset('css', 'blocks/share_this_page');
        $this->providesAsset('css', 'blocks/feature');
        $this->providesAsset('css', 'blocks/testimonial');
        $this->providesAsset('css', 'blocks/date_navigation');
        $this->providesAsset('css', 'blocks/topic_list');
        $this->providesAsset('css', 'blocks/faq');
        $this->providesAsset('css', 'blocks/tags');
        $this->providesAsset('css', 'core/frontend');
        $this->providesAsset('css', 'blocks/feature/templates/hover_description');

        $this->requireAsset('javascript', 'jquery');
        $this->requireAsset('css', 'font-awesome');
        $this->requireAsset('javascript', 'picturefill');
    }
    
    protected $pThemeGridFrameworkHandle = 'bootstrap3';

}
