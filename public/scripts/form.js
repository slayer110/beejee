$(document).ready(function () {
  switch ($("table").attr('field')) {
    case 'user':
      if ($("table").attr('type') == 'ASC') {
        $(".name .fa-caret-up").css("color", "black");
      } else {
        $(".name .fa-caret-up").css("color", "#eeeeee");
        $(".name .fa-caret-down").css("color", "black");
      }
      break;
    case 'status':
      if ($("table").attr('type') == 'ASC') {
        $(".status .fa-caret-up").css("color", "black");
      } else {
        $(".status .fa-caret-up").css("color", "#eeeeee");
        $(".status .fa-caret-down").css("color", "black");
      }
      break;
    case 'email':
      if ($("table").attr('type') == 'ASC') {
        $(".email .fa-caret-up").css("color", "black");
      } else {
        $(".email .fa-caret-up").css("color", "#eeeeee");
        $(".email .fa-caret-down").css("color", "black");
      }
      break;
  }
  $('.edit-popup').click(function () {
    $('.title-popup').html('Редактирование задания');
    $('.taskEdit').val($(this).parents('tr').find('.taskTd').text());
    $('.emailEdit').val($(this).parents('tr').find('.emailTd').text());
    $('.nameEdit').val($(this).parents('tr').find('.userTd').text());
    $('.idEdit').val($(this).parents('tr').find('.testId').text());
    if ($(this).parents('tr').find('.statusTd').text() == 'Выполнено') {
      $('.statusEdit').prop('checked', 'true')
    }
    if ($(this).parents('tr').find('.statusTd').text() == 'Не выполнено') {
      $('.statusEdit').prop('checked', false);
    }

    $('.btn-primary').click(function () {

      var object = {
        'task': $('.taskEdit').val(),
        'email': $('.emailEdit').val(),
        'name': $('.nameEdit').val(),
        'status': $('.statusEdit').is(':checked'),
        'id': $('.idEdit').val()
      };
      // alert('hhh');
      console.log(object);


      $.ajax({
          url: 'editTask',
          data: object,
          type: 'POST',
          success: function (response) {
            if (response == 'success') {
              location.reload();
            } else if (response === 'user is not logged in') {
              document.location.href="account/login";
            }
          }
        }
      )
    });
  });

  $('.add-popup').click(function () {
    $('.title-popup').html('Добавление задания');
    $('.taskEdit').val('');
    $('.emailEdit').val('');
    $('.nameEdit').val('');
    $('.statusEdit').prop('checked', false);

    $('.btn-primary').click(function () {
      if ($('.error').length) {
        $('.error').remove()
      }

      var object = {
        'task': $('.taskEdit').val(),
        'email': $('.emailEdit').val(),
        'name': $('.nameEdit').val(),
        'status': $('.statusEdit').is(':checked'),
        'id': $('.idEdit').val()
      };
      if (object['task'] === '' || object['name'] === '' || object['email'] === '') {
        $('<p class="error">Не все поля заполнены</p>').appendTo('.modal-body p:eq(4)');
        return;
      }
      var emailCheck = object['email'].match(/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/);
      if (emailCheck === null) {
        $('<p class="error">Не валидный email</p>').appendTo('.modal-body p:eq(4)');
        return;
      }

      $.ajax({
          url: 'addTask',
          data: object,
          type: 'POST',
          success: function (response) {
            if (response == 'success') {
              location.reload();
            }
          }
        }
      )
    })

  });


});
