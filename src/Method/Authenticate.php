<?php

namespace Blucreation\SmartWaste\Method;

use Blucreation\SmartWaste\Base\BaseMethod;

/**
 * @property mixed clientKey 
 */
class Authenticate extends BaseMethod
{
    public function __construct($clientKey)
    {
        $this->clientKey = $clientKey;
    }
}