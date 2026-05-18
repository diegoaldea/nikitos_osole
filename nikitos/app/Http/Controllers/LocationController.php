<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Location;

class LocationController extends Controller
{
    public function index(){
        $locations = Locations::orderBy('province')->orderBy('city')->get();

        return Inertia::render('Locations/index', [
            'locations' => $locations,
        ]);
    }
}
