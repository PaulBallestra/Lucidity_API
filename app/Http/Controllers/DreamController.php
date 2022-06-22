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
            'subtitle' => 'required',
            'content' => 'required',
            'date' => 'required',
            'isLucid' => 'required'
        ]);

        $dream = Dream::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,   
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
            'subtitle' => $dream->subtitle,
            'content' => $dream->content,
            'isLucid' => $dream->isLucid,
            'date' => $dream->date,
            'user' => [
                'id' => $request->user()->id,
                'created_at' => $request->user()->created_at,
                'updated_at' => $request->user()->updated_at,
                'username' => $request->user()->username,
            ]
        ], 201);
    }

    //Fonction qui va afficher tous les rêves de l'utilisateur
    public function showAll(Request $request){

        //401 UNAUTHENTICATED GÉRÉ PAR SANCTUM
        $dreams = Dream::where('user_id', $request->user()->id)->get();

        return response()->json([
            'dreams' => $dreams
        ], 201);
    }

    //Fonction qui va retourner le nombre de reves lucides & reves normaux
    public function getNumberOfDreams(Request $request){

        //401 UNAUTHENTICATED GÉRÉ PAR SANCTUM
        $numberOfLucidDreams = Dream::where('user_id', $request->user()->id)->where('isLucid', 1)->count();
        $numberOfClassicDreams = Dream::where('user_id', $request->user()->id)->where('isLucid', 0)->count();

        return response()->json([
            'numberOfLucidDreams' => $numberOfLucidDreams,
            'numberOfClassicDreams' => $numberOfClassicDreams
        ], 201);
    }

}
