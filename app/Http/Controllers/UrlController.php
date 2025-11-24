<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;

class UrlController extends Controller
{
    public function store(Request $request)
    {
        // Validar que llegue una URL
        $request->validate([
            'url' => 'required|url'
        ]);

        // Crear código corto
        $shortCode = substr(md5(uniqid()), 0, 6);

        // Guardar en BD
        $url = Url::create([
            'original_url' => $request->url,
            'short_code' => $shortCode
        ]);

        return response()->json([
            'shortened_url' => url($shortCode)
        ]);
    }

    public function redirect($code)
    {
        $url = Url::where('short_code', $code)->firstOrFail();

        // Aumentar contador de clics
        $url->increment('clicks');

        return redirect()->away($url->original_url);
    }
}
