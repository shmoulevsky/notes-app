<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Http\Resources\NoteResource;
use App\Http\Requests\NoteRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Список всех записей';
        
        $filter[] = ['user_id', '=' ,$request->user()->id];
        $filterText[] = ['user_id', '=' ,$request->user()->id];
        
        if($request->has('q')){
            
            $q = $request->q;

            if ($q) {
                $filter[] = ['name', 'like', '%'.$q.'%'];
                $filterText[] = ['text', 'like', '%'.$q.'%'];
            }

        }
                
        $notes = Note::where($filter)->orWhere($filterText)->with('theme:id,name')->get();
        
        if($request->wantsJson() || Str::startsWith(request()->path(), 'api')){
            return response([ 'notes' => new NoteResource($notes), 'message' => 'Retrieved successfully'], 200);  
        }

        return view('notes.list', compact('notes','title'));
    }
        

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoteRequest $request)
    {
        $data = $request->validated();
        
        $data['user_id'] = Auth::user()->id;
        $data['is_active'] = intval($data['is_active']);

        $note = Note::create($data);

        return response(['note' => new NoteResource($note), 'message' => 'Created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        return response(['note' => new NoteResource($note), 'message' => 'Retrieved successfully'], 200);
    }


    public function showDetail(Note $note, Request $request)
    {
        
        $note = Note::where(['user_id' => $request->user()->id, 'id' => $request->id])->first();
        if(!$note){
            abort(404);
        }
        $note->view_count++;
        $note->save();

        return view('notes.detail', compact('note'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(NoteRequest $request, Note $note)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['is_active'] = intval($data['is_active']);
        
        $note->update($data);

        return response(['project' => new NoteResource($note), 'message' => 'Update successfully'], 200);
    }

    public function changeFavor(int $id)
    {
        
        $note = Note::findOrFail($id);
        $note->is_favor = !$note->is_favor;
        $note->save();

        return response(['project' => new NoteResource($note), 'message' => 'Update successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return response(['message' => 'Deleted']);
    }

    public function favor(Request $request)
    {
        $title = 'Избранное';
        $notes = Note::where(['user_id' => $request->user()->id, 'is_favor' => true])->get();
        return view('notes.list', compact('notes','title'));
    }

    public function latest(Request $request)
    {
        $title = 'Последние добавленные';
        $notes = Note::where(['user_id' => $request->user()->id])->orderBy('id', 'desc')->limit(10)->get();
        return view('notes.list', compact('notes','title'));
    }

    public function top(Request $request)
    {
        $title = 'Топ записей';
        $notes = Note::where(['user_id' => $request->user()->id])->orderBy('view_count', 'desc')->limit(10)->get();

        return view('notes.list', compact('notes','title'));
    }

}
