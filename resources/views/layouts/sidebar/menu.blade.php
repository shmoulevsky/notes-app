<!-- Sidebar Menu -->
<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          @forelse($themes as $theme)
          <li class="nav-item">
            <a href="#" class="nav-link">
               <p>
                {{$theme->name}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul id="theme-{{$theme->id}}" class="nav nav-treeview">
            <li class="nav-item">
            <button type="button" data-toggle="modal" data-target="#add-note-modal" data-id="{{$theme->id}}" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Добавить</button>
              </li>
              @isset($theme->notes)
              @foreach($theme->notes as $note)
              <li class="nav-item">
                <a href="#" data-id="{{$note->id}}" class="show-note-btn nav-link">
                   <p id="note-{{$note->id}}">{{$note->name}}</p>
                </a>
              </li>
              @endforeach
              @endisset
            </ul>
           
          </li>
          @empty

        @endforelse
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      