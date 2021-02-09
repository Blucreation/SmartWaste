<?php

namespace Blucreation\SmartWaste\Convert;

interface SmartWasteInterface
{
    public function toSmartWasteId(): ?int;
    public function toSmartWasteObj();
}
