<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Inertia\Inertia;
use App\Models\SalesMessage;
use App\Models\JobApplication;

class ContactController extends Controller
{
    public function Index(){
        return Inertia::render('Contact/Index');
    }

    public function storeSales(Request $request){
        $request->validate([
            'business_name' => 'required|string|max:255',
            'cuit' => 'required|string|max:255',
            'business_type' => 'required|string|max:255',
            'market_experience' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'mobile' => 'nullable|string|max:255',
            'business_hours' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'observations' => 'nullable|string',
        ]);

        SalesMessage::create($request->all());

        return back()->with('success', 'Mensaje enviado correctamente.');
    }

    public function storeJob(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'dni' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'position' => 'required|string|max:255',
            'cv_path' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $cv_path = null;
        if($request->hasFile(cv_path)){
            $cv_path = $request->file('cv_path')->store('cvs', 'public');
        }

        JobApplication::create([
            ...$request->except('cv_path'),
            'cv_path' => $cv_path,
        ]);

        return back()->with('success', 'Solicitud enviada correctamente.');
    }
}
