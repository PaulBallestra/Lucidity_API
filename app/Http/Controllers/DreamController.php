<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Dream;

class DreamController extends Controller
{
    //Fonction qui va créer un nouveau rêve de l'utilisateur
    public function create(Request $request)
    {
        //401 gérée par SANCTUM

        //Validation 422 si erreur
        $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'date' => 'required',
            'isLucid' => 'required'
        ]);

        $dream = Dream::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id,
            'date' => $request->date,
            'isLucid' => $request->isLucid
        ]);

        //STATUS 201, DREAM CREATED
        return response()->json([
            'id' => $dream->id,
            'created_at' => $dream->created_at,
            'updated_at' => $dream->updated_at,
            'title' => $dream->title,
            'content' => $dream->content,
            'isLucid' => 0,
            'date' => $dream->date,
            'user' => [
                'id' => $request->user()->id,
                'created_at' => $request->user()->created_at,
                'updated_at' => $request->user()->updated_at,
                'username' => $request->user()->username,
            ]
        ], 201);

    }
}
