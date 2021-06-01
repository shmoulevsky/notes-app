@extends('/layouts/master') 
@section('title', $note->name ?? 'Главная') 
@section('content')
<div class="note-wrap" class="col-12">Добро пожаловать!</div>

@endsection