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
class Spectrumted_Recipe_Block_Adminhtml_Category_Edit_Tab_Meta extends Mage_Adminhtml_Block_Widget_Form //Spectrumted_Recipe_Block_Adminhtml_Form { {
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('meta_form_tab');
        $this->setTabId('meta_form_tab');
    }

    protected function _prepareForm() {
        $form = new Varien_Data_Form();
        $this->setForm($form);

        $form->setDataObject(Mage::registry('current_category'));
        $fieldset = $form->addFieldset('spectrumted_recipe_form', array('legend' => Mage::helper('spectrumted_recipe')->__('Meta Data')));

        $form->setFieldNameSuffix('meta_data');

        $fieldset->addField('meta_description', 'textarea', array(
            'label' => Mage::helper('spectrumted_recipe')->__('Meta Description'),
            'name' => 'meta_description',
            'required' => false,
            'index' => 'meta_description',
        ));
        
        $fieldset->addField('meta_keywords', 'text', array(
            'label' => Mage::helper('spectrumted_recipe')->__('Meta Keywords'),
            'name' => 'meta_keywords',
            'required' => false,
            'index' => 'timeta_keywordstle',
        ));
        
        $fieldset->addField('meta_title', 'text', array(
            'label' => Mage::helper('spectrumted_recipe')->__('Meta Title'),
            'name' => 'meta_title',
            'required' => false,
            'index' => 'meta_title',
        ));


        if (Mage::getSingleton('adminhtml/session')->getRecipeCategoryData()) {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getRecipeCategoryData());
            Mage::getSingleton('adminhtml/session')->setRecipeCategoryData(null);
        } elseif (Mage::registry('current_category')) {
            $form->setValues(Mage::registry('current_category')->getData());
        }
        return parent::_prepareForm();
    }

}