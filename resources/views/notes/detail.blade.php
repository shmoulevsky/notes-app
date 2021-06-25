@extends('/layouts/master')
@section('title', $note->name ?? 'Главная')
@section('content')
<div class="col-12 mb-3">
    <div id="toolbar-container"></div>
    <div contenteditable="true" id="editor" class="note-wrap" style="width: 100%; min-height: 300px; margin-bottom: 30px;" class="col-12">{!! $note->text ?? 'Добро пожаловать!' !!}</div>
    <button type="button" data-id="{{$note->id}}" data-theme-id="{{$note->theme_id}}" class="btn btn-primary update-note-btn float-left">Сохранить</button>
    <button class="ml-2 mt btn btn-outline-info edit-mode-btn">Режим редактора</button>

</div>
<div class="col-12 mb-3">
@if(isset($note->files))
<ul class="list-group mt-2">
@forelse($note->files as $file)
    <li class="list-group-item"><a href="{{ url('/storage/'.$file->url) }}">{{ $file->original_name}}</a><i data-id="{{$file->id}}" class="delete-file-btn pl-2 far fa-trash-alt"></i></li>
@empty
@endforelse
</ul>
@endif
    <div class="file-wrap mt-3">
        <input type="file" name="files[]" id="upload" class="files choose-file-btn" hidden>
        <label class="file-label btn btn-outline-secondary" for="upload" >Выберите файл</label>
        <span></span>
    </div>


</div>
@endsection
