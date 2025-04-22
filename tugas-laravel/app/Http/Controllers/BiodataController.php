<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BiodataController extends Controller
{
    public function index()
    {
        $biodata = Biodata::first();

        $now = Carbon::now('Asia/Jakarta');

        $hour = $now->hour;
        if ($hour >= 4 && $hour < 10) {
            $greeting = "Selamat Pagi";
        } elseif ($hour >= 10 && $hour < 15) {
            $greeting = "Selamat Siang";
        } elseif ($hour >= 15 && $hour < 18) {
            $greeting = "Selamat Sore";
        } else {
            $greeting = "Selamat Malam";
        }

        return view('biodata.index', compact('biodata', 'now', 'greeting'));
    }
}
