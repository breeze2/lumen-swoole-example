<?php

namespace App\Models\Api;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Base
{
    use SoftDeletes;

    const TABLE_NAME = 'tests';
    protected $table = 'tests';

}
