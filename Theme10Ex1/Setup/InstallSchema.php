<?php
namespace Perspective\Theme10Ex1\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->tableExists('perspective_review_post')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('perspective_review_post')
            )
                ->addColumn(
                    'review_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'nullable' => false,      'primary'  => true,
                        'unsigned' => true,
                    ],
                    'Review ID'
                )
                ->addColumn(
                    'IDProd',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    ['nullable => false'],
                    'ID Prod'
                )
                ->addColumn(
                    'TextRev',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    [],
                    'Text Rev'
                )
                ->addColumn(
                    'Name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    [],
                    'Name'
                )
                ->addColumn(
                    'Email',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    [],
                    'Email'
                )
                ->addColumn(
                    'DataRev',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                    'Data Review'
                )
                ->setComment('Post Table');
            $installer->getConnection()->createTable($table);
            $installer->getConnection()->addIndex(
                $installer->getTable('perspective_review_post'),
                $setup->getIdxName(
                    $installer->getTable('perspective_review_post'),
                    ['IDProd', 'TextRev', 'Name', 'Email'],
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                ),
                ['IDProd', 'TextRev', 'Name', 'Email'],
                \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
            );
        }
        $installer->endSetup();
    }
}
