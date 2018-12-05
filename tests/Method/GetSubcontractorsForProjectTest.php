<?php

namespace BespokeSupport\SmartWasteTests\Method;

use BespokeSupport\SmartWaste\Method\GetSubcontractorsForProject;
use BespokeSupport\SmartWaste\SmartWasteRoutes;
use BespokeSupport\SmartWasteTests\Convert\ConvertEntity;
use BespokeSupport\SmartWasteTests\TestHelper;
use PHPUnit\Framework\TestCase;

class GetSubcontractorsForProjectTest extends TestCase
{
    /**
     * @expectedException \ArgumentCountError
     */
    public function testClass()
    {
        new GetSubcontractorsForProject();
    }

    public function testInit()
    {
        $uri = new GetSubcontractorsForProject(ConvertEntity::ID, ConvertEntity::ID);

        $this->assertTrue(true);

        $url = SmartWasteRoutes::toUrlRelative($uri);

        $this->assertEquals('12345/projects/12345/subcontractors', $url);
    }

    public function testSuccess()
    {
        $uri = new GetSubcontractorsForProject(ConvertEntity::ID, ConvertEntity::ID);

        $short = SmartWasteRoutes::classToShort($uri);

        $res = file_get_contents(__DIR__ . "/../Responses/$short.json");

        $client = TestHelper::clientSuccess(json_decode($res));

        $ret = \BespokeSupport\SmartWaste\SmartWaste::call(TestHelper::credComplete(), $uri, [], $client);

        $this->assertCount(1, $ret);

        $val = $ret[0]->subcontractorID ?? null;
        $this->assertEquals(30360, $val);
    }
}
