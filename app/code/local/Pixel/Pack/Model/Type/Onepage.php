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
 * Pixel Pack Onepage
 */
class Pixel_Pack_Model_Type_Onepage extends Mage_Checkout_Model_Type_Onepage
{

    /**
     * Retrieve shopping cart model object
     *
     * @return Mage_Checkout_Model_Cart
     */
    protected function _getCart()
    {
        return Mage::getSingleton('checkout/cart');
    }

    /**
     * Update quote free items
     *
     * @param $productIds
     */
    public function savePackItems($productIds)
    {
        $saveRequired = false;
        #TODO validate that products really available in welcome pack
        #TODO also need to make 2 diffs to define which items need to be added and which are removed

        //add new products
        foreach ($productIds as $productId => $value) {
            $product = $this->_initProduct($productId);
            if ($product && $product->getId()) {
                $request = array(
                    'product'      => $product->getId(),
                    'qty'          => 1,
                    'welcome_pack' => 1
                );

                $request = new Varien_Object($request);
                $item = $this->getQuote()->addProduct($product, $request);
                Mage::helper('pixel_pack')->updateWelcomePackItem($item);
                $saveRequired = true;
            }
        }

        #TODO need to add section that will be responsible for removing unselected items

        if ($saveRequired) {
            $this->_getCart()->save();
        }

    }

    /**
     * Initialize product instance from request data
     *
     * @param $productId
     * @return Mage_Catalog_Model_Product || false
     */
    protected function _initProduct($productId)
    {
        if ($productId) {
            $product = Mage::getModel('catalog/product')
                ->setStoreId(Mage::app()->getStore()->getId())
                ->load($productId);
            if ($product->getId()) {
                return $product;
            }
        }
        return false;
    }
}