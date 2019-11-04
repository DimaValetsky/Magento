<?php

$installer = $this;
$tableNews = $installer->getTable('dsnews/table_news');

$installer->startSetup();
$installer->getConnection()->dropTable($tableNews);
$table = $installer->getConnection()
    ->newTable($tableNews)
    ->addColumn('news_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
        ))
    ->addColumn('address', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => true,
    ))
    ->addColumn('worktime', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => true,
    ))
    ->addColumn('phone', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => true,
    ))
    ->addColumn('nameadmin', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => true,
    ));
$installer->getConnection()->createTable($table);

$installer->endSetup();