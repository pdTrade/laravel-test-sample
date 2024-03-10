<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beverage;


class BeverageController extends Controller
{
    public function index()
    {
        $beverages = Beverage::all();


        return view('beverage.index', compact('beverages'));
    }
}
