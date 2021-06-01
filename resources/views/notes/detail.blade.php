@extends('/layouts/master') 
@section('title', $note->name ?? 'Главная') 
@section('content')
<div contenteditable="true" class="note-wrap" style="width: 100%; min-height: 300px; margin-bottom: 30px;" class="col-12">{!! $note->text ?? 'Добро пожаловать!' !!}</div>
<button type="button" data-id="{{$note->id}}" data-theme-id="{{$note->theme_id}}" class="btn btn-primary update-note-btn float-right">Сохранить</button> 
@endsection