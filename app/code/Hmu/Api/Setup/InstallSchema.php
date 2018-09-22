<?php
/**
 * Webkul Software.
 *
 * @category  Webkul
 * @package   Webkul_UiForm
 * @author    Webkul
 * @copyright Copyright (c) 2010-2016 Webkul Software Private Limited (https://webkul.com)
 * @license   https://store.webkul.com/license.html
 */
namespace Hmu\Api\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        /**
         * Create table 'hmu_api'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('hmu_api'))
            ->addColumn(
                'id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                11,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Id'
            )
            ->addColumn(
                'hmu_name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Hmu Name'
            )
            ->addColumn(
                'hmu_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                11,
                ['unsigned' => true, 'nullable' => false],
                'Hmu Id'
            )
            ->addColumn(
                'hmu_salary',
                \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                '12,2',
                ['nullable' => false],
                'Hmu Salary'
            )
            ->addColumn(
                'hmu_address',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'hmu Address'
            )
            ->setComment('Hmu Table');
        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}
