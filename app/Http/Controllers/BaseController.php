<?php

namespace App\Http\Controllers;

use App\Events\NumberUpdated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
    public function up(Request $request)
    {
        DB::table('number')->whereNotNull('number')->increment('number');
        $number = DB::table('number')->first();
        // Could do "broadcast(new NumberUpdates($number->number))->toOthers()" to only send to others, as the new value is already sent back.
        NumberUpdated::dispatch($number->number);
        return $number;
    }
}
