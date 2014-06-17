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
class Pixel_Pack_Block_Onepage extends Mage_Checkout_Block_Onepage
{
    /**
     * Get checkout steps codes
     *
     * @return array
     */
    protected function _getStepCodes()
    {
        $stepCodes = parent::_getStepCodes();
        array_splice($stepCodes, 3, 0, array('pack'));
        return $stepCodes;
    }
}