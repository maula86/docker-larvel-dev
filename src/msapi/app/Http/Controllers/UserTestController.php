<?php

namespace App\Http\Controllers;

use App\Jobs\UserJob;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserTestController extends Controller
{
    function index() {
        // --- Without Job / Queue
        // $data = [
        //     'name' => fake()->name(),
        //     'email' => fake()->unique()->safeEmail(),
        //     'email_verified_at' => now(),
        //     'password' => '1234567890',
        //     'remember_token' => Str::random(10),
        // ];

        // User::create($data);

        // --- use Job / Queue
        UserJob::dispatch();

        $starttime = microtime(true);
        $endtime = microtime(true);
        $timediff = $endtime - $starttime;
        return "<h1>Halaman diproses dalam ". sprintf('%0.2f', $timediff). " detik</h1>";
    }
}
