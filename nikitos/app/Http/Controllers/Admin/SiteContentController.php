<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use App\Services\ImageOptimizer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SiteContentController extends Controller
{
    public function index()
    {
        $contents = SiteContent::orderBy('id')->get(['key', 'type', 'value']);

        return Inertia::render('Admin/SiteContents/Index', [
            'contents' => $contents,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'texts'    => 'nullable|array',
            'texts.*'  => 'nullable|string',
            'images'   => 'nullable|array',
            'images.*' => 'nullable|image|max:5120',
        ]);

        foreach ((array) $request->input('texts', []) as $key => $value) {
            SiteContent::where('key', $key)
                ->where('type', 'text')
                ->update(['value' => $value]);
        }

        foreach ((array) $request->file('images', []) as $key => $file) {
            if (! $file) {
                continue;
            }

            $content = SiteContent::where('key', $key)->where('type', 'image')->first();

            if (! $content) {
                continue;
            }

            ImageOptimizer::delete($content->value);
            $content->update(['value' => ImageOptimizer::store($file, 'site')]);
        }

        return redirect()->route('admin.site-contents.index')->with('success', 'Contenidos actualizados correctamente.');
    }
}
