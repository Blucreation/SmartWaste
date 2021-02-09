<?php

namespace Blucreation\SmartWaste\Method;

use Blucreation\SmartWaste\Base\BaseMethod;

/**
 * @property mixed username 
 */
class AuthenticateUser extends BaseMethod
{
    public function __construct($username)
    {
        $this->username = $username;
    }
}