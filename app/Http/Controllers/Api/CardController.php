<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use Illuminate\Support\Facades\Storage;

class CardController extends Controller
{
    // GET semua card
    public function index()
    {
        return response()->json(Card::all());
    }

    // GET satu card berdasarkan ID
    public function show($id)
    {
        $card = Card::findOrFail($id);
        return response()->json($card);
    }

    // POST - Simpan card baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'user' => 'required|string',
            'recommended' => 'required|string',
            'media' => 'required|file|mimes:jpg,jpeg,png,gif,mp4,mov,webm|max:20480',
        ]);

        // Simpan file ke storage/app/public/uploads
        $path = $request->file('media')->store('uploads', 'public');

        $mediaType = explode('/', $request->file('media')->getMimeType())[0]; // image, video, etc

        $card = Card::create([
            'title' => $request->title,
            'user' => $request->user,
            'recommended' => $request->recommended,
            'media_url' => '/storage/' . $path,
            'media_type' => $mediaType,
        ]);

        return response()->json($card, 201);
    }

    // PUT - Update card
    public function update(Request $request, $id)
    {
        $card = Card::findOrFail($id);

        $card->update($request->only(['title', 'user', 'recommended']));

        return response()->json($card);
    }

    // DELETE - Hapus card
    public function destroy($id)
    {
        $card = Card::findOrFail($id);
        $card->delete();

        return response()->json(['message' => 'Card deleted']);
    }
}
