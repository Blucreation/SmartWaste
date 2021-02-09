<?php

namespace Blucreation\SmartWasteTests\Method;

use Blucreation\SmartWaste\Method\GetWorkPackages;
use Blucreation\SmartWaste\SmartWasteRoutes;
use Blucreation\SmartWasteTests\Convert\ConvertEntity;
use Blucreation\SmartWasteTests\TestHelper;
use PHPUnit\Framework\TestCase;

class GetWorkPackagesTest extends TestCase
{
    /**
     * @expectedException \ArgumentCountError
     */
    public function testClass()
    {
        new GetWorkPackages();
    }

    public function testInit()
    {
        $uri = new GetWorkPackages(ConvertEntity::ID, ConvertEntity::ID);

        $this->assertTrue(true);

        $url = SmartWasteRoutes::toUrlRelative($uri);

        $this->assertEquals('12345/projects/12345/work-packages', $url);
    }

    public function testSuccess()
    {
        $uri = new GetWorkPackages(ConvertEntity::ID, ConvertEntity::ID);

        $short = SmartWasteRoutes::classToShort($uri);

        $res = file_get_contents(__DIR__ . "/../Responses/$short.json");

        $client = TestHelper::clientSuccess(json_decode($res));

        $ret = \Blucreation\SmartWaste\SmartWaste::call(TestHelper::credComplete(), $uri, [], $client);

        $this->assertCount(17, $ret);

        $val = $ret[0]->description ?? null;
        $this->assertEquals('Not Specified', $val);
    }
}
