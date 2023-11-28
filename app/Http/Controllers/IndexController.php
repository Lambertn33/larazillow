<?php

namespace App\Http\Controllers;

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
