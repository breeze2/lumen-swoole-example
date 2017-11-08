<?php

namespace App\Http\Controllers\Api\V1;

use App\Transformers\UserTransformer;

class UserController extends BaseController
{
    public function getInfo()
    {
        $user = $this->getAuthUser();
        return $this->response->item($user, new UserTransformer);
    }
}
