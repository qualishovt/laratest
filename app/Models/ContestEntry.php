<?php

namespace App\Models;

use App\Events\NewEntryReceivedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestEntry extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected static function booted()
    // {
    //     // Model Observer
    //     static::created(function ($contestEntry) {
    //         NewEntryReceivedEvent::dispatch();
    //     });
    // }
}
