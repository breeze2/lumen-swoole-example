<?php

namespace App\Http\Controllers\Api\V1;

use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends BaseController
{
    public function getInfo()
    {

        var_dump(JWTAuth::user());
    }
}
