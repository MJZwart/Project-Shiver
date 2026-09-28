<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['energy'])]
class Player extends Model
{
    //

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cheatEnergy(): void
    {
        // remember, `$this` is the actual model 
        $this->energy = 69;
        $this->save();
    }

    public function spendEnergy(): bool
    {
        if ($this->energy - 25 < 0) {
            return false;
        }
        $this->energy -= 25;
        $this->save();
        return true;
    }

    public function gainEnergy(): void
    {
        $this->energy = min($this->energy + 5, 100);
        $this->save();
    }
}
