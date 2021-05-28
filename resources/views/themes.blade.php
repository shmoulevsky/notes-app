@extends('/layouts/master') 
@section('title', 'Темы') 
@section('content')
<div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Список тем</h3>

                <!-- <div class="card-tools">
                  <ul class="pagination pagination-sm float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                  </ul>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Название</th>
                      <th>Описание</th>
                      <th style="width: 40px">Активность</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($themes as $key => $theme)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$theme->name}}</td>
                      <td>{{$theme->description}}</td>
                      <td>{{$theme->is_active}}</td>
                    </tr>
                   @empty
                   @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
           <button type="button" data-toggle="modal" data-target="#add-theme-modal" class="btn btn-primary">Добавить</button>
          </div>
          <!-- /.col -->
        
          <div id="add-theme-modal" class="modal fade" role="dialog" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <label for="note-title">Название темы</label>
                        <input type="text" class="form-control" id="theme-title" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">Введите название темы</small>
                    </div>
                    <div class="form-group">
                        <label for="note-title">Описание темы</label>
                        <textarea class="form-control"  rows="3" id="theme-description"></textarea>
                        
                    </div>
                    
                    </form>
                </div>
                <div class="modal-footer">
                    <button data-theme-id="" type="button" class="btn btn-primary add-theme-btn">Сохранить</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
                </div>
                </div>
            </div>
            </div>          
@endsection