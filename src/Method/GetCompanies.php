<?php

namespace Blucreation\SmartWaste\Method;

use Blucreation\SmartWaste\Base\BaseMethod;

/**
 * @property mixed cid 
 */
class GetCompanies extends BaseMethod
{
    public function __construct($cid)
    {
        $this->cid = $cid;
    }
}