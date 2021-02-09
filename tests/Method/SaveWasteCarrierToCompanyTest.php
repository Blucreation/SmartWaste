<?php

namespace Blucreation\SmartWasteTests\Method;

use Blucreation\SmartWaste\Entity\SWWasteCarrier;
use Blucreation\SmartWaste\Method\SaveWasteCarrierToCompany;
use Blucreation\SmartWaste\SmartWaste;
use Blucreation\SmartWaste\SmartWasteRoutes;
use Blucreation\SmartWasteTests\Convert\ConvertEntity;
use Blucreation\SmartWasteTests\TestHelper;
use PHPUnit\Framework\TestCase;

class SaveWasteCarrierToCompanyTest extends TestCase
{
    /**
     * @expectedException \ArgumentCountError
     */
    public function testClass()
    {
        new SaveWasteCarrierToCompany();
    }

    public function testInit()
    {
        $ent = new SWWasteCarrier();

        $uri = new SaveWasteCarrierToCompany(ConvertEntity::ID, $ent);

        $url = SmartWasteRoutes::toUrlRelative($uri);

        $this->assertEquals('12345/waste-carriers', $url);
    }

    public function testSuccess()
    {
        $ent = new SWWasteCarrier();

        $uri = new SaveWasteCarrierToCompany(ConvertEntity::ID, $ent);

        $short = SmartWasteRoutes::classToShort($uri);

        $res = file_get_contents(__DIR__ . "/../Responses/$short.json");

        $client = TestHelper::clientSuccess(json_decode($res));

        $ret = SmartWaste::call(TestHelper::credComplete(), $uri, [], $client);

        $val = $ret->carrierID ?? null;

        $this->assertEquals(90524, $val);
    }
}
