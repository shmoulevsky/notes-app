$(function(){
    
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 30000
      });
    
      
      
    
    $(document).on('click', '.show-note-btn', function(e){
             
            var id = $(this).data('id');
                              
             $.ajax({
             url: "/api/notes/" + id,
             type: "GET",
             dataType: "json",
                 data: ({api_token : 'caf0ddeWXZ56PWfJVuvoKVuvpvNWQXhOiCZkFaWybQNW3fZq3SnMwP1Y11eq'}),
             success: function(data, statusTitle, xhr){
                   
                 if(xhr.status == 200)
                 {
                    
                    let html = `<div contenteditable="true" class="note-wrap" style="width: 100%; min-height: 300px; margin-bottom: 30px;" class="col-12"></div>
                    <button type="button" class="btn btn-primary update-note-btn float-right">Сохранить</button> 
                    `;

                    $('.main-content').html(html);
                    $('.note-wrap').html(data.note.text);
                    $('.note-title').html(data.note.name);
                    $('.update-note-btn').data('id', id);
                    $('.update-note-btn').data('theme-id', data.note.theme_id);
                    $('.note-title').data('id', id);
                    history.pushState('', data.note.name, '/notes/' + id);

                 }else{
                    
                    
                 }
                                    
             },
             error : function(e) {
                console.log(e);
             }
             });
          
         e.preventDefault();
              
         })

         $(document).on('click', '.search-note-btn', function(e){
             
            var q = $('.search-note-input').val();
                              
             $.ajax({
             url: "/api/notes",
             type: "GET",
             dataType: "json",
                 data: ({q, api_token : 'caf0ddeWXZ56PWfJVuvoKVuvpvNWQXhOiCZkFaWybQNW3fZq3SnMwP1Y11eq'}),
             success: function(data, statusTitle, xhr){
                   
                 if(xhr.status == 200)
                 {
                    
                    let html = '<div class="col-md-6">';

                    for (const key in data.notes) {
                   
                    html += `<div id="note-${data.notes[key].id}" class="callout callout-success overflow-hidden position-relative note-${data.notes[key].id}">
                    <a class="text-dark text-decoration-none" href="/notes/${data.notes[key].id}">  
                      <h5>${data.notes[key].name}&nbsp;&nbsp;<span class="badge badge-primary">${data.notes[key].theme.name}</span></h5>
                        <p>${data.notes[key].created_at}</p>
                      </a>
                      <div class="float-right position-relative ">
                        <span data-id="${data.notes[key].id}" class="favor-icon favor-${data.notes[key].id} @if($note->is_favor !=  false) active @endif favor-note-btn"></span>
                        <span class="view-count-icon">${data.notes[key].view_count}</span>
                       
                      </div>
                      <button data-id="${data.notes[key].id}" type="button" class="close delete-note delete-note-btn" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>    
                  </div>`;

                    }
                    
                    html += `<div>`;

                    if(data.notes.length == 0){
                        html = '<p>нет записей</p>';
                    }

                    $('.main-content').html(html);
                                        
                    history.pushState('', 'Поиск', '/notes?q=' + q);

                 }else{
                    
                    
                 }
                                    
             },
             error : function(e) {
                console.log(e);
             }
             });
          
         e.preventDefault();
              
         })

         $(document).on('click', '.update-note-btn', function(e){
             
            let id = $(this).data('id');
            let name = $('.note-title').text();
            let text = $('.note-wrap').html();
            let theme_id = $(this).data('theme-id');
            let formData = new FormData();
            
            formData.append('id', id);
            formData.append('name', name);
            formData.append('text', text);
            formData.append('theme_id', theme_id);
            formData.append('is_active', true);
            formData.append('api_token', 'caf0ddeWXZ56PWfJVuvoKVuvpvNWQXhOiCZkFaWybQNW3fZq3SnMwP1Y11eq');
            formData.append('_method', 'PATCH');

            $(".files").each(function(i, field) {
                
                const file = field.files[0];
                formData.append('files[]', file);
                console.log(file);

            });

             $.ajax({
             url: "/api/notes/" + id,
             type: "POST",
             processData: false,
             contentType: false,
             dataType: "json",
                 data: formData,
             success: function(data, statusTitle, xhr){
                   
                 if(xhr.status == 200)
                 {
                    
                    Toast.fire({
                        icon: 'success',
                        title: data.message
                    });

                    $('#note-' + id).text(name);
                 }
                                    
             },
             error : function(e) {
                console.log(e);
             }
             });
          
         e.preventDefault();
              
         })

         $(document).on('click', '.delete-note-btn', function(e){
             
            let id = $(this).data('id');
            
             $.ajax({
             url: "/api/notes/" + id,
             type: "DELETE",
             dataType: "json",
                 data: ({api_token : 'caf0ddeWXZ56PWfJVuvoKVuvpvNWQXhOiCZkFaWybQNW3fZq3SnMwP1Y11eq'}),
             success: function(data, statusTitle, xhr){
                   
                 if(xhr.status == 200)
                 {
                    
                    Toast.fire({
                        icon: 'success',
                        title: data.message
                    });

                    $('.note-' + id).fadeOut();
                 }
                                    
             },
             error : function(e) {
                console.log(e);
             }
             });
          
         e.preventDefault();
              
         })

         

         $('#add-note-modal').on('shown.bs.modal', function (e) {
                $('#note-title').trigger('focus');
                $('.add-note-btn').data('id', e.relatedTarget.dataset.id);
         });

         $('#add-theme-modal').on('shown.bs.modal', function (e) {
            $('#theme-title').trigger('focus');
         });

        

         $(document).on('click', '.add-note-btn', function(e){
             
            
            let name = $('#note-title').val();
            let theme_id = $(this).data('id');
            
           

             $.ajax({
             url: "/api/notes",
             type: "POST",
             dataType: "json",
                 data: ({name : name, theme_id, is_active : true, text : 'новый', api_token : 'caf0ddeWXZ56PWfJVuvoKVuvpvNWQXhOiCZkFaWybQNW3fZq3SnMwP1Y11eq'}),
             success: function(data, statusTitle, xhr){
                   
                 if(xhr.status == 201)
                 {
                    let item = `<li class="nav-item">
                                    <a href="#" data-id="${data.note.id}" class="show-note-btn nav-link">
                                    <p>${name}</p>
                                    </a>
                                </li>`;

                    $('#theme-'+theme_id).append(item);

                    Toast.fire({
                        icon: 'success',
                        title: data.message
                    });

                    $('#add-note-modal').modal('hide');

                 }
                                    
             },
             error : function(e) {
                console.log(e);
             }
             });
          
         e.preventDefault();
         e.stopPropagation();
              
         })

         $(document).on('click', '.favor-note-btn', function(e){
             
            let id = $(this).data('id');
            
             $.ajax({
             url: "/api/notes/changeFavor/" + id,
             type: "GET",
             dataType: "json",
                 data: ({api_token : 'caf0ddeWXZ56PWfJVuvoKVuvpvNWQXhOiCZkFaWybQNW3fZq3SnMwP1Y11eq'}),
             success: function(data, statusTitle, xhr){
                   
                 if(xhr.status == 200)
                 {
                    
                    Toast.fire({
                        icon: 'success',
                        title: data.message
                    });

                    $('.favor-' + id).toggleClass('active');
                 }
                                    
             },
             error : function(e) {
                console.log(e);
             }
             });
          
         e.preventDefault();
              
         })

         $(document).on('click', '.add-theme-btn', function(e){
             
            
            let name = $('#theme-title').val();
            let description = $('#theme-description').val();
            

             $.ajax({
             url: "/api/themes",
             type: "POST",
             dataType: "json",
                 data: ({name : name, is_active : true, description , api_token : 'caf0ddeWXZ56PWfJVuvoKVuvpvNWQXhOiCZkFaWybQNW3fZq3SnMwP1Y11eq'}),
             success: function(data, statusTitle, xhr){
                   
                 if(xhr.status == 201)
                 {
                    
                    Toast.fire({
                        icon: 'success',
                        title: data.message
                    });

                    $('#add-theme-modal').modal('hide');

                 }
                                    
             },
             error : function(e) {
                console.log(e);
             }
             });
          
         e.preventDefault();
         e.stopPropagation();
              
         })
 
})

