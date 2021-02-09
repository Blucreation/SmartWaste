<?php

namespace Blucreation\SmartWaste\Method;

use Blucreation\SmartWaste\Base\BaseMethod;

/**
 * @property mixed cid 
 * @property mixed wasteCarrier 
 * @property mixed file 
 */
class SaveWasteCarrierToCompany extends BaseMethod
{
    public function __construct($cid, $wasteCarrier, $file = null)
    {
        $this->cid = $cid;
        $this->wasteCarrier = $wasteCarrier;
        $this->file = $file;
    }
}