<?php

class DS_News_Block_Adminhtml_News_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('dsnews/news')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {

        $helper = Mage::helper('dsnews');

        $this->addColumn('news_id', array(
            'header' => $helper->__('Stores ID'),
            'index' => 'news_id'
        ));

        $this->addColumn('address', array(
            'header' => $helper->__('Address'),
            'index' => 'address',
            'type' => 'text',
        ));

        $this->addColumn('worktime', array(
            'header' => $helper->__('Worktime'),
            'index' => 'worktime',
            'type' => 'text',
        ));

        $this->addColumn('phone', array(
            'header' => $helper->__('Phone'),
            'index' => 'phone',
            'type' => 'text',
        ));

        $this->addColumn('nameadmin', array(
            'header' => $helper->__('Nameadmin'),
            'index' => 'nameadmin',
            'type' => 'text',
        ));

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('news_id');
        $this->getMassactionBlock()->setFormFieldName('news');

        $this->getMassactionBlock()->addItem('delete', array(
            'label' => $this->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
        ));
        return $this;
    }

    public function getRowUrl($model)
    {
        return $this->getUrl('*/*/edit', array(
                    'id' => $model->getId(),
                ));
    }

}