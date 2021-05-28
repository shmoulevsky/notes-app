@extends('/layouts/master') 
@section('title', $note->name ?? 'Главная') 
@section('content')
<div contenteditable="true" class="note-wrap" style="width: 100%; min-height: 300px; margin-bottom: 30px;" class="col-12">{{$note->text ?? 'Добро пожаловать!'}}</div>
<button type="button" class="btn btn-primary update-note-btn float-right">Сохранить</button> 

<div id="add-note-modal" class="modal fade" role="dialog" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Инфо</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
        <div class="form-group">
            <label for="note-title">Название</label>
            <input type="text" class="form-control" id="note-title" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">Введите название заметки</small>
        </div>
        
        </form>
      </div>
      <div class="modal-footer">
        <button data-theme-id="" type="button" class="btn btn-primary add-note-btn">Сохранить</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
      </div>
    </div>
  </div>
</div>

@endsection