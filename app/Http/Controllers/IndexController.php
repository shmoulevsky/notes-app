<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function showNote($id)
    {
        $userId = Auth::user()->id;
        $note = Note::where(['user_id' => $userId, 'id' => $id])->first();

        if(!$note){
            abort(404);
        }

        return view('index', compact('note'));
    }
}
