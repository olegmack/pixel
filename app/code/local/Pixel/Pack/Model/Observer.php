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
class Pixel_Pack_Model_Observer
{
    /**
     * Update prices of welcome pack items
     *
     * @param Varien_Event_Observer $observer
     * @return $this
     */
    public function salesQuoteCollectTotals(Varien_Event_Observer $observer)
    {
        /** @var $quote Mage_Sales_Model_Quote */
        $quote = $observer->getEvent()->getQuote();
        foreach ($quote->getAllItems() as $item) {
            if ($this->_isWelcomePackItem($item)) {
                Mage::helper('pixel_pack')->updateWelcomePackItem($item);
            }
        }

        return $this;
    }

    /**
     * Check item for welcome pack evidences
     *
     * @param $item
     * @return bool
     */
    protected function _isWelcomePackItem($item)
    {
        $buyRequest = $item->getBuyRequest();
        $result = $buyRequest->getWelcomePack();

        return (bool)$result;
    }
}