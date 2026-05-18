<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalesMessageRequest;
use App\Http\Requests\StoreJobApplicationRequest;

use Inertia\Inertia;
use App\Models\SalesMessage;
use App\Models\JobApplication;

class ContactController extends Controller
{
    public function index(){
        return Inertia::render('Contact/Index');
    }

    public function storeSales(StoreSalesMessageRequest $request)
    {
        SalesMessage::create($request->all());

        return back()->with('success', 'Mensaje enviado correctamente.');
    }

    public function storeJob(StoreJobApplicationRequest $request)
    {
        $cv_path = null;
        if($request->hasFile('cv_path')){
            $cv_path = $request->file('cv_path')->store('cvs', 'public');
        }

        JobApplication::create([
            ...$request->except('cv_path'),
            'cv_path' => $cv_path,
        ]);

        return back()->with('success', 'Solicitud enviada correctamente.');
    }
}
