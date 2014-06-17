<?php
/**
 * {license_notice}
 *
 * @category   Pixel
 * @package    Pixel_Pack
 * @copyright  {copyright}
 * @license    {license}
 */

/**
 * Pixel Pack Onepage checkout step
 */
class Pixel_Pack_Block_Onepage_Step extends Mage_Checkout_Block_Onepage_Abstract
{
    protected function _construct()
    {
        $this->getCheckout()->setStepData('pack', array(
            'label' => Mage::helper('pixel_pack')->__('Welcome Pack'),
            'is_show'   => true
        ));
        parent::_construct();
    }

    /**
     * Get collection with free products
     */
    public function getProducts()
    {
        $collection = Mage::getModel('catalog/product')->getCollection();
        /* @var $collection Mage_Catalog_Model_Resource_Eav_Mysql4_Product_Collection */

        $collection->addAttributeToSelect('name')
            ->addFieldToFilter('welcome_pack', 1)
            ->addStoreFilter();

        return $collection;
    }
}