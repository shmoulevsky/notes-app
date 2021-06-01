@extends('/layouts/master') 
@section('title', $title) 
@section('content')
<div class="col-md-6">

@forelse($notes as $key => $note)
    <div id="note-{{$note->id}}" class="callout callout-success overflow-hidden position-relative note-{{$note->id}}">
      <a class="text-dark text-decoration-none" href="/notes/{{$note->id}}">  
        <h5>{{$note->name}}&nbsp;&nbsp;<span class="badge badge-primary">{{$note->theme->name}}</span></h5>
          <p>{{$note->created_at}}</p>
        </a>
        <div class="float-right position-relative ">
          <span data-id="{{$note->id}}" class="favor-icon favor-{{$note->id}} @if($note->is_favor !=  false) active @endif favor-note-btn"></span>
          <span class="view-count-icon">{{$note->view_count}}</span>
         
        </div>
        <button data-id="{{$note->id}}" type="button" class="close delete-note delete-note-btn" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>    
    </div>
@empty
@endforelse

</div>         
@endsection 