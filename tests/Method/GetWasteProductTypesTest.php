<?php

namespace Blucreation\SmartWasteTests\Method;

use Blucreation\SmartWaste\Method\GetWasteProductTypes;
use Blucreation\SmartWaste\SmartWasteRoutes;
use Blucreation\SmartWasteTests\Convert\ConvertEntity;
use Blucreation\SmartWasteTests\TestHelper;
use PHPUnit\Framework\TestCase;

class GetWasteProductTypesTest extends TestCase
{
    /**
     * @expectedException \ArgumentCountError
     */
    public function testClass()
    {
        new GetWasteProductTypes();
    }

    public function testInit()
    {
        $uri = new GetWasteProductTypes(ConvertEntity::ID, ConvertEntity::ID);

        $this->assertTrue(true);

        $url = SmartWasteRoutes::toUrlRelative($uri);

        $this->assertEquals('12345/projects/12345/waste-product-types', $url);
    }

    public function testSuccess()
    {
        $uri = new GetWasteProductTypes(ConvertEntity::ID, ConvertEntity::ID);

        $short = SmartWasteRoutes::classToShort($uri);

        $res = file_get_contents(__DIR__ . "/../Responses/$short.json");

        $client = TestHelper::clientSuccess(json_decode($res));

        $ret = \Blucreation\SmartWaste\SmartWaste::call(TestHelper::credComplete(), $uri, [], $client);

        $this->assertCount(5, $ret);

        $val = $ret[0]->ewcCode ?? null;
        $this->assertEquals('17 01 02', $val);
    }
}
