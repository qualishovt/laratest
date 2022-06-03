<?php

namespace App\Http\View;

use App\Models\Channel;
use Illuminate\View\View;

class Hook
{
    public static function sayHello()
    {
        return view('hooks.say_hello');
    }
}
