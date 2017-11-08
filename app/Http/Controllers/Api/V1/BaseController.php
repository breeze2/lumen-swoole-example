<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    use Helpers;

    protected $guard = 'jwt';

    protected function getAuth()
    {
    	return Auth::guard($this->guard);
    }

    protected function getAuthUser()
    {
    	return $this->getAuth()->user();
    }

}
