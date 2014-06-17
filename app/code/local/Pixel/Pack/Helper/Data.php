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
 * Pixel Pack Helper
 */
class Pixel_Pack_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Update welcome pack item price
     *
     * @param Mage_Sales_Model_Quote_Item_Abstract $item
     * @return $this
     */
    public function updateWelcomePackItem(Mage_Sales_Model_Quote_Item_Abstract $item)
    {
        $item->setPrice(0)
            ->setBasePrice(0)
            ->setRowTotal(0)
            ->setBaseRowTotal(0)
            ->setTaxAmount(0)
            ->setBaseTaxAmount(0)
            ->setPriceInclTax(0)
            ->setBasePriceInclTax(0)
            ->setRowTotalInclTax(0)
            ->setBaseRowTotalInclTax(0);

        #TODO need to set 0 for all other totals like discount, tax, shipping, etc.

        return $this;
    }
}