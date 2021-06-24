@extends('/layouts/master') 
@section('title', $note->name ?? 'Главная') 
@section('content')
<div class="col-12 mb-3">
    <div contenteditable="true" class="note-wrap" style="width: 100%; min-height: 300px; margin-bottom: 30px;" class="col-12">{!! $note->text ?? 'Добро пожаловать!' !!}</div>
    <button type="button" data-id="{{$note->id}}" data-theme-id="{{$note->theme_id}}" class="btn btn-primary update-note-btn float-left">Сохранить</button>
</div>
<div class="col-12 mb-3">
@if(isset($note->files))
<ul>
@forelse($note->files as $file)
    <li><a href="{{ asset($file->url) }}">{{ $file->original_name}}</a></li>
@empty
@endforelse
</ul>
@endif
<input class="files" name="files[]" type="file" />
<input class="files" name="files[]" type="file" />
</div>
@endsection