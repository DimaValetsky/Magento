<?php

class DS_News_Block_Adminhtml_News_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareForm()
    {
        $helper = Mage::helper('dsnews');
        $model = Mage::registry('current_news');

        $form = new Varien_Data_Form(array(
                    'id' => 'edit_form',
                    'action' => $this->getUrl('*/*/save', array(
                        'id' => $this->getRequest()->getParam('id')
                    )),
                    'method' => 'post',
                    'enctype' => 'multipart/form-data'
                ));

        $this->setForm($form);

        $fieldset = $form->addFieldset('news_form', array('legend' => $helper->__('Stores Information')));

        $fieldset->addField('address', 'text', array(
            'label' => $helper->__('Address'),
            'required' => true,
            'name' => 'address',
        ));

        $fieldset->addField('worktime', 'text', array(
            'label' => $helper->__('Worktime'),
            'required' => true,
            'name' => 'worktime',
        ));

        $fieldset->addField('phone', 'text', array(
            'label' => $helper->__('Phone'),
            'required' => true,
            'name' => 'phone',
        ));

        $fieldset->addField('nameadmin', 'text', array(
            'label' => $helper->__('Nameadmin'),
            'required' => true,
            'name' => 'nameadmin',
        ));


        
        $form->setUseContainer(true);

        if($data = Mage::getSingleton('adminhtml/session')->getFormData()){
            $form->setValues($data);
        } else {
            $form->setValues($model->getData());
        }

        return parent::_prepareForm();
    }

}