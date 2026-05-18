<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Inertia\Inertia;
use App\Models\SalesMessage;

class SalesMessageController extends Controller
{
    public function index()
    {
        $messages = SalesMessage::orderBy('read')->orderBy('created_at', 'desc')->get();

        return Inertia::render('Admin/SalesMessages/Index', [
            'messages' => $messages,
        ]);
    }

    public function markAsRead(SalesMessage $message)
    {
        $message->update(['read' => true]);

        return back();
    }
}