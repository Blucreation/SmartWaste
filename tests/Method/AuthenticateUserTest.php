<?php

namespace Blucreation\SmartWasteTests\Method;

use Blucreation\SmartWaste\Method\AuthenticateUser;
use Blucreation\SmartWaste\SmartWasteRoutes;
use PHPUnit\Framework\TestCase;

class AuthenticateUserTest extends TestCase
{
    /**
     * @expectedException \ArgumentCountError
     */
    public function testClass()
    {
        new AuthenticateUser();
    }

    public function testInit()
    {
        $uri = new AuthenticateUser('test');

        $this->assertTrue(true);

        $url = SmartWasteRoutes::toUrlRelative($uri);

        $this->assertEquals('users/test', $url);
    }
}
