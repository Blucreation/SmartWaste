<?php

namespace Blucreation\SmartWaste\Method;

use Blucreation\SmartWaste\Base\BaseMethod;

/**
 * @property mixed cid 
 * @property mixed pid 
 * @property mixed wasteID 
 */
class GetWasteItem extends BaseMethod
{
    public function __construct($cid, $pid, $wasteID)
    {
        $this->cid = $cid;
        $this->pid = $pid;
        $this->wasteID = $wasteID;
    }
}