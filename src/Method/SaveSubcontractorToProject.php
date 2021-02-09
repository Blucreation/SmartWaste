<?php

namespace Blucreation\SmartWaste\Method;

use Blucreation\SmartWaste\Base\BaseMethod;

/**
 * @property mixed cid 
 * @property mixed pid 
 * @property mixed subcontractor 
 */
class SaveSubcontractorToProject extends BaseMethod
{
    public function __construct($cid, $pid, $subcontractor)
    {
        $this->cid = $cid;
        $this->pid = $pid;
        $this->subcontractor = $subcontractor;
    }
}