<?php

namespace App\Http\Controllers;

use App\Models\ContestEntry;
use Illuminate\Http\Request;

class ContestEntryController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email'
        ]);

        ContestEntry::create($data);
    }
}
