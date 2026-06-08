<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
    public function up(Request $request)
    {
        DB::table('number')->whereNotNull('number')->increment('number');
        $number = DB::table('number')->first();
        return $number;
    }
}
