<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Support\Facades\DB;

class TestController extends BaseController
{
    public function getStatic()
    {
        return response(app()->version());
    }

    public function getRead()
    {
        $results = DB::select("SELECT * FROM tests WHERE avalue = " . microtime(true) . "; ");
        return $this->response->array($results);
    }

    public function getWrite()
    {
        $result = DB::update("UPDATE tests SET avalue = " . microtime(true) . " WHERE id = 1 ; ");
        return response()->json($result);
    }
}
