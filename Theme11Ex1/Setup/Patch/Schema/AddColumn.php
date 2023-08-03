<?php

/**

 * Copyright © 2019 Magenest. All rights reserved.

 * See COPYING.txt for license details.

 */

namespace Perspective\Theme11Ex1\Setup\Patch\Schema;



use Magento\Framework\DB\Ddl\Table;

use Magento\Framework\Setup\Patch\SchemaPatchInterface;

use Magento\Framework\Setup\ModuleDataSetupInterface;



class AddColumn implements SchemaPatchInterface

{

    private $moduleDataSetup;



    public function __construct(

        ModuleDataSetupInterface $moduleDataSetup

    ) {

        $this->moduleDataSetup = $moduleDataSetup;
    }



    public static function getDependencies()

    {

        return [];
    }



    public function getAliases()

    {

        return [];
    }



    public function apply()

    {

        $this->moduleDataSetup->startSetup();



        $this->moduleDataSetup->getConnection()->addColumn(

            $this->moduleDataSetup->getTable('consultation_table'),

            'gold_client',

            [

                'type' => Table::TYPE_TEXT,

                'nullable' => false,

                'comment'  => 'Gold client',

            ]

        );



        $this->moduleDataSetup->endSetup();
    }
}
