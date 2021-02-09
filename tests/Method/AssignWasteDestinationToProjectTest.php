<?php

namespace Blucreation\SmartWasteTests\Method;

use Blucreation\SmartWaste\Method\AssignWasteDestinationToProject;
use Blucreation\SmartWaste\SmartWaste;
use Blucreation\SmartWaste\SmartWasteRoutes;
use Blucreation\SmartWasteTests\Convert\ConvertEntity;
use Blucreation\SmartWasteTests\TestHelper;
use PHPUnit\Framework\TestCase;

class AssignWasteDestinationToProjectTest extends TestCase
{
    /**
     * @expectedException \ArgumentCountError
     */
    public function testClass()
    {
        new AssignWasteDestinationToProject();
    }

    public function testInit()
    {
        $uri = new AssignWasteDestinationToProject(ConvertEntity::ID, ConvertEntity::ID, ConvertEntity::ID);

        $url = SmartWasteRoutes::toUrlRelative($uri);

        $this->assertEquals('12345/projects/12345/waste-destinations/12345', $url);
    }

    public function testSuccess()
    {
        $uri = new AssignWasteDestinationToProject(ConvertEntity::ID, ConvertEntity::ID, ConvertEntity::ID);

        $short = SmartWasteRoutes::classToShort($uri);

        $res = file_get_contents(__DIR__ . "/../Responses/$short.json");

        $client = TestHelper::clientSuccess(json_decode($res));

        $ret = SmartWaste::call(TestHelper::credComplete(), $uri, [], $client);

        $this->assertTrue($ret);
    }
}
