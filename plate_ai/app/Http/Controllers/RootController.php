<?php

namespace App\Http\Controllers;

class RootController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("root");
    }
}
