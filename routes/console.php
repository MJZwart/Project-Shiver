<?php

use App\Models\Player;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


// Shit werkt niet, succes met uitzoeken hoe sql werkt lmao
Artisan::command('energytest', function () {
    // SQLmao 2hard
    // also pijn
    DB::transaction(function() {
        $energyUpdateList = Player::where('energy', '<', 100)->get();

        foreach ($energyUpdateList as $player) {
            $player->energy = $player->energy < 95 ? $player->energy + 5 : 100;
            $player->save();
        }
    });


    // Player::where('energy', '<', 100)->update(['energy' => $this->energy + 1]);

    // DB::raw('
    //     UPDATE players 
    //     SET energy = 
    //     CASE WHEN energy < 96 THEN energy + 5
    //     ELSE 100
    //     END      
    // ');
    // DB::raw('update players set energy = 5');
    // DB::table('players')->update(['energy' => 5])->ddRawSql();
    // DB::raw(<<<EOD
    //     UPDATE players 
    //     SET energy = '5' 
    // EOD);
    $this->comment('hallo????');
})->purpose('Test if the energy schedule call works');

// Schedule::call(function () {
//     // DB::doSomething
//     // DB::table('players')
//         // ->where('energy', '<', 100)
//         // ->

//     // DB::raw('
//     //     UPDATE players 
//     //     SET energy = 
//     //     CASE WHEN energy < 96 THEN energy + 5
//     //     ELSE 100
//     //     END      
//     // ')
//     // Select all sub-max energy records,
//     // Make a conditional that adds 5 to every value below 95
//     // The rest is to be set to 100
// })->everyTenMinutes();