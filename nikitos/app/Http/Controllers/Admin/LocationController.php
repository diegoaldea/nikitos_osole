<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;

use Inertia\Inertia;
use App\Models\Location;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::orderBy('province')->orderBy('city')->get();

        return Inertia::render('Admin/Locations/Index', [
            'locations' => $locations,
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Locations/Create');
    }

    public function store(StoreLocationRequest $request)
    {
        Location::create($request->all());

        return redirect()->route('admin.locations.index')->with('success', 'Ubicación creada correctamente.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.locations.index');
    }

    public function edit(Location $location)
    {
        return Inertia::render('Admin/Locations/Edit', [
            'location' => $location,
        ]);
    }

    public function update(UpdateLocationRequest $request, Location $location)
    {
        $location->update($request->all());

        return redirect()->route('admin.locations.index')->with('success', 'Ubicación actualizada correctamente.');
    }

    public function destroy(Location $location)
    {
        $location->delete();

        return redirect()->route('admin.locations.index')->with('success', 'Ubicación eliminada correctamente.');
    }
}