<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Location;

class LocationController extends Controller
{
    public function index(){
        $locations = Location::orderBy('province')->orderBy('city')->get();

        return Inertia::render('Locations/Index', [
            'locations' => $locations,
        ]);
    }
}
