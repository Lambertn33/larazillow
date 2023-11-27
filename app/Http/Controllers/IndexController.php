<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function index()
    {
        $message = 'Hello there';
        return Inertia('Index', [
            'message' => $message
        ]);
    }

    public function show()
    {
        return Inertia('Show');
    }
}
