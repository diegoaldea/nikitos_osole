<?php

namespace App\Http\Controllers;

use App\Models\SiteContent;
use Inertia\Inertia;

class AboutController extends Controller
{
    public function index(){
        $contents = SiteContent::pluck('value', 'key');

        return Inertia::render('About/Index', [
            'contents' => $contents,
        ]);
    }
}
