<?php

/**
 * Spectrumted (Neo Industries Pty Ltd)
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to Neo Industries Pty LTD Non-Distributable Software Modification License (NDSML)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.spectrumted.com/legal/licenses/NDSM.html
 * If the license is not included with the package or for any other reason, 
 * you did not receive your licence please send an email to 
 * license@spectrumted.com so we can send you a copy immediately.
 *
 * This software comes with no warrenty of any kind. By Using this software, the user agrees to hold 
 * Neo Industries Pty Ltd harmless of any damage it may cause.
 *
 * @category    modules
 * @module      Spectrumted_Recipe
 * @copyright   Copyright (c) 2011 Neo Industries Pty Ltd (http://www.spectrumted.com)
 * @license     http://www.spectrumted.com/  Non-Distributable Software Modification License(NDSML 1.0)
 */
class Spectrumted_Recipe_Block_Widget_Post_List
extends Spectrumted_Recipe_Block_Post_List 
implements Mage_Widget_Block_Interface
{	
    function _construct(){
        $this->setTemplate('spectrumted/recipe/widget/post/list_block.phtml');
      //  $this->setSummaryBlockType('spectrumted_recipe/post_summary');
      //  $this->setSummaryTemplate('spectrumted/recipe/widget/post/summary.phtml');
        $this->setTitle('Latest Posts');
    }

    /**
     * Returns the render of the html of the block
     *
     * @return string
     */
    public function _toHtml() {
        //setTemplate is run on construct, the data 'template' doesn't get retrieved in 'getTemplate' 
        //so we have to do the following before render.
        if ($this->getData('template')){
            $this->setTemplate($this->getData('template'));
        }
        return parent::_toHtml();
    }

    /**
     * Prepares Post Collection
     * @return type|void
     */
    public function _prepareCollection(){
        
        parent::_prepareCollection();
        if (is_numeric($this->getPostCount())){
            $this->getCollection()->setCurPage(0);
            $this->getCollection()->setPageSize($this->getPostCount());
        }
    }
}

