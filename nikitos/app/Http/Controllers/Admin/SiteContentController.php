<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Inertia\Inertia;
use App\Models\SiteContent;

class SiteContentController extends Controller
{
    public function index()
    {
        $contents = SiteContent::pluck('value', 'key');

        return Inertia::render('Admin/SiteContents/Index', [
            'contents' => $contents,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'contents'   => 'required|array',
            'contents.*' => 'nullable|string',
        ]);

        foreach ($request->contents as $key => $value) {
            SiteContent::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->route('admin.site-contents.index')->with('success', 'Contenidos actualizados correctamente.');
    }
}