<?php

namespace Blucreation\SmartWasteTests\Convert;

use Blucreation\SmartWaste\Convert\SmartWasteInterface;

class ConvertEntity implements SmartWasteInterface
{
    public const ID = 12345;

    /**
     * @param int $ret
     * @return int|null
     */
    public function toSmartWasteId($ret = self::ID): ?int
    {
        return $ret;
    }
}
