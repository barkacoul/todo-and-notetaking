var Event = function(){

  this.__construct = function(){
    console.log('Event created');
    Result = new Result();
    create_todo();
    create_note();
    update_todo();
    update_note_display();
    update_note();
    toggle_note();
    delete_todo();
    delete_note();
  };

  //------------------------------------------------------------------------------
  var create_todo = function(){
    $('#create_todo').submit(function(evt){
      evt.preventDefault();
      var url = $(this).attr('action');
      var postData = $(this).serialize();
      $.post(url, postData, function(o){
        if(o.result == 1){
          Result.success('test');
            var output = Template.todo(o.data);
            $("#list_todo").append(output);
            $("#create_todo input[type=text]").val('');
        }
        else {
          Result.error(o.error);
        }
      }, 'json');
      return false;
    });
  };

  var create_note = function(){
    $('#create_note').submit(function(evt){
      evt.preventDefault();
      var url = $(this).attr('action');
      var postData = $(this).serialize();
      $.post(url, postData, function(o){
        if(o.result == 1){
          Result.success('test');
            var output = Template.note(o.data);
            $("#list_note").append(output);
            $("#create_note input[type=text]").val('');
            $("#create_note textarea").val('');
        }
        else {
          Result.error(o.error);
        }
      }, 'json');
      return false;
    });
  };
//------------------------------------------------------------------------------

var update_todo = function(){
  //--------------------------------------------------------------------------
$("body").on('click', '.todo_update', function(evt){
  evt.preventDefault();
  //alert('thihishifhflhfjlsjgfjkf');
  var self = $(this);
  var url = $(this).attr('href');
  var postData = {
    'todo_id': $(this).attr('data-id'),
    'completed': $(this).attr('data-completed')
  };

  //console.log(postData);

$.post(url, postData, function(o){
  if(o.result == 1){
    //Result.success('Saved');
    if(postData.completed == 1){
      $('#todo_' + postData.todo_id).addClass('todo-complete');
      //self.parent('div').css({'border':'1px solid red'});
      self.html('<i class="icon-share-alt"></i>');
      self.attr('data-completed', 0);
    }
    else{
      $('#todo_' + postData.todo_id).removeClass('todo-complete');
      self.html('<i class="icon-ok"></i>');
      self.attr('data-completed', 1);
    }

  }
  else{
    Result.error('Nothing updated');
  }
}, 'json');

});
//---------------------finish todo_complete -----------------------------------

//---------------------finish todo_complete -----------------------------------

//---------------------finish update_todo--------------------------------------
};

//-----------------------------------------------------------------------------

var update_note_display = function(){
  $("body").on('click', '.note_update_display', function(e){
    e.preventDefault();
    var note_id = $(this).data('id');
    var output = Template.note_edit(note_id);
    $("#note_edit_container_" + note_id).html(output);

    //Display data after the template is created
    var title =  $("#note_title_" + note_id).html();
    var content =  $("#note_content_" + note_id).html();

    $("#note_edit_container_" + note_id).find('.title').val(title);
    $("#note_edit_container_" + note_id).find('.content').val(content);

  });
  $("body").on('click', '.note_edit_cancel', function(e){
    e.preventDefault();
    $(this).parents('.note_edit_container').html('');
  });
};

//------------------------------------------------------------------------------

var update_note = function(){
  $("body").on('submit', '.note_edit_form', function(e){
    e.preventDefault();
    var form = $(this);
    var url = $(this).attr('action');
    var postData = {
      note_id: $(this).find('.note_id').val(),
      title: $(this).find('.title').val(),
      content: $(this).find('.content').val()
    };
    //console.log(title);
    $.post(url, postData, function(o){
      if(o.result == 1){
        Result.success("Successfully Updated Note");
        $("#note_title_" + postData.note_id).html(postData.title);
        $("#note_content_" + postData.note_id).html(postData.content);
        form.remove();
        //alert(postData.title+"et id: "+postData.note_id);
      }
      else{
        Result.error("Error Saving");
      }
    }, 'json');
  });

};

//------------------------------------------------------------------------------

var delete_todo = function(){
  $("body").on('click', '.todo_delete', function(evt){
    evt.preventDefault();
    var c = confirm('Are you sure you want to delete?');
    if(c==false) return false;
    var self = $(this).parents('div:eq(0)');
    var url = $(this).attr('href');
    var postData ={

    'todo_id': $(this).attr('data-id')
      };
    $.post(url, postData, function(o){
      if(o.result == 1){
        Result.success('Item deleted.');
        self.remove();
      }
      else{
        Result.error(o.msg);
      }
    }, 'json');
  });

};
//------------------------------------------------------------------------------
var toggle_note = function(){
  $("body").on("click", ".note_toggle", function(e){
    e.preventDefault;
    var note_id = $(this).data('id');
    $("#note_content_" + note_id).toggleClass('hide');
  });
};
//------------------------------------------------------------------------------

var delete_note = function(){
  $("body").on('click', '.note_delete', function(evt){
    evt.preventDefault();
    var self = $(this).parents('div:eq(0)');
    var url = $(this).attr('href');
    var postData ={

    'note_id': $(this).attr('data-id')
      };
    $.post(url, postData, function(o){
      if(o.result == 1){
        Result.success('Item deleted.');
        self.remove();
      }
      else{
        Result.error(o.msg);
      }
    }, 'json');
  });
};

  this.__construct();
};
