<?php

namespace Blucreation\SmartWasteTests\Method;

use Blucreation\SmartWaste\Entity\SWWasteDestination;
use Blucreation\SmartWaste\Method\SaveWasteDestinationToCompany;
use Blucreation\SmartWaste\SmartWaste;
use Blucreation\SmartWaste\SmartWasteRoutes;
use Blucreation\SmartWasteTests\Convert\ConvertEntity;
use Blucreation\SmartWasteTests\TestHelper;
use PHPUnit\Framework\TestCase;

class SaveWasteDestinationToCompanyTest extends TestCase
{
    /**
     * @expectedException \ArgumentCountError
     */
    public function testClass()
    {
        new SaveWasteDestinationToCompany();
    }

    public function testInit()
    {
        $ent = new SWWasteDestination();

        $uri = new SaveWasteDestinationToCompany(ConvertEntity::ID, $ent);

        $url = SmartWasteRoutes::toUrlRelative($uri);

        $this->assertEquals('12345/waste-destinations', $url);
    }

    public function testSuccess()
    {
        $ent = new SWWasteDestination();

        $uri = new SaveWasteDestinationToCompany(ConvertEntity::ID, $ent);

        $short = SmartWasteRoutes::classToShort($uri);

        $res = file_get_contents(__DIR__ . "/../Responses/$short.json");

        $client = TestHelper::clientSuccess(json_decode($res));

        $ret = SmartWaste::call(TestHelper::credComplete(), $uri, [], $client);

        $val = $ret->destinationID ?? null;

        $this->assertEquals(90464, $val);
    }
}
