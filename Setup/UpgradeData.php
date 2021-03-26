<?php

namespace Kryptic2000\Leadtime\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeData implements UpgradeDataInterface
{
        private $eavSetupFactory;

        public function __construct(EavSetupFactory $eavSetupFactory)
        {
                $this->eavSetupFactory = $eavSetupFactory;
        }

	public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
                $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
                $eavSetup->addAttribute(
                        \Magento\Catalog\Model\Product::ENTITY,
                        'source_leadtime',
                        [
                                'type' => 'text',
                                'backend' => '',
                                'frontend' => '',
                                'label' => 'Product Leadtime',
                                'input' => 'select',
                                'class' => '',
                                'source' => '',
                                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                                'visible' => true,
                                'required' => true,
                                'user_defined' => true,
                                'default' => '',
                                'searchable' => false,
                                'filterable' => false,
                                'comparable' => false,
                                'visible_on_front' => false,
                                'used_in_product_listing' => true,
                                'unique' => false,
                                'apply_to' => '',
                                'option' =>
                                  array (
                                    'values' =>
                                      array (
                                        0 => 'Finns i lager',
                                        1 => '1-3 dagar',
                                        2 => '4-7 dagar',
                                        3 => '1-2 veckor',
                                        4 => '3-4 veckor',
                                        5 => 'Osäker leveranstid'
                                      )
                                  ),
				'attribute_set_id' => 4

                        ]
                );

	}
}
