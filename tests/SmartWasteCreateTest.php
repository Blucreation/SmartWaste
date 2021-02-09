<?php

namespace Blucreation\SmartWasteTests;

use Blucreation\SmartWaste\Entity\SWWasteCarrier;
use Blucreation\SmartWaste\Entity\SWWasteDestination;
use Blucreation\SmartWaste\Method\SaveWasteCarrierToCompany;
use Blucreation\SmartWaste\Method\SaveWasteDestinationToCompany;
use Blucreation\SmartWaste\SmartWasteCreate;
use PHPUnit\Framework\TestCase;

class SmartWasteCreateTest extends TestCase
{
    public CONST CID = 111;

    public function testCarrier()
    {
        $retId = 222;

        $client = TestHelper::clientSuccess(['carrierID' => $retId]);

        $cred = TestHelper::credComplete();

        $swEnt = new SWWasteCarrier();

        $ent = new SaveWasteCarrierToCompany(self::CID, $swEnt);

        $int = SmartWasteCreate::carrier($cred, $ent, $client);

        $this->assertEquals($retId, $int);
    }

    public function testDestination()
    {
        $retId = 222;

        $client = TestHelper::clientSuccess(['destinationID' => $retId]);

        $cred = TestHelper::credComplete();

        $swEnt = new SWWasteDestination();

        $ent = new SaveWasteDestinationToCompany(self::CID, $swEnt);

        $int = SmartWasteCreate::destination($cred, $ent, $client);

        $this->assertEquals($retId, $int);
    }
}
