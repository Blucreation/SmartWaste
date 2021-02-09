<?php

namespace Blucreation\SmartWaste\Method;

use Blucreation\SmartWaste\Base\BaseMethod;

/**
 * @property mixed cid 
 * @property mixed pid 
 */
class GetSkipsizes extends BaseMethod
{
    public function __construct($cid, $pid)
    {
        $this->cid = $cid;
        $this->pid = $pid;
    }
}