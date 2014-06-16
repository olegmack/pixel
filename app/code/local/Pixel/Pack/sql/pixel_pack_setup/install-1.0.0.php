<?php
/**
 * {license_notice}
 *
 * @category   Pixel
 * @package    Pixel_Pack
 * @copyright  {copyright}
 * @license    {license}
 */
$installer = $this;

$installer->startSetup();

$productTypes = array(
    Mage_Catalog_Model_Product_Type::TYPE_SIMPLE,
    Mage_Catalog_Model_Product_Type::TYPE_VIRTUAL
);
$productTypes = join(',', $productTypes);

$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'welcome_pack', array(
    'group'         => 'General',
    'frontend'      => '',
    'label'         => 'Included in welcome pack',
    'input'         => 'select',
    'source'        => 'eav/entity_attribute_source_boolean',
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    'visible'       => true,
    'required'      => false,
    'user_defined'  => false,
    'default'       => '',
    'apply_to'      => $productTypes,
    'visible_on_front' => false,
    'used_in_product_listing' => true
));

$installer->endSetup();