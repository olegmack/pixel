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
class Pixel_Pack_Onepage_Step extends Mage_Checkout_Block_Onepage_Abstract
{
    protected function _construct()
    {
        if ($this->isCustomerLoggedIn()) {
           $this->getCheckout()->setStepData('pack', array('label' => Mage::helper('pixel_pack')->__('Welcome Pack'), 'allow'=>true));
        }
        parent::_construct();
    }
}