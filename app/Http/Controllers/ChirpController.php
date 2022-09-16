<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    public function index()
    {
        return 'Hello World!';
    }

    public function store(Request $request)
    {
        //
    }
}
