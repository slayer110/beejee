$('.form-horizontal').submit((e) => {
  if ($('.error').length) {
    $('.error').remove()
  }
  if ($('#inputLogin').val() === '' || $('#inputPassword').val() === '') {
    e.preventDefault();
    $('<p class="error">Не все поля заполнены</p>').appendTo('.form-horizontal div:eq(1)');
    return false;
  } else {
    // $.ajax({
    //     url: 'account/login',
    //     data: {
    //       'login': $('#inputLogin').val(), 'password': $('#inputPassword').val()
    //     },
    //     type: 'POST',
    //     success: function (response) {
    //       console.log(response)
    //     }
    //   }
  }
// if ($('#inputLogin').val() !== 'admin' || $('#inputPassword').val() !== '123') {
//   e.preventDefault();
//   $('<p class="error">Введённые данные не верны</p>').appendTo('.form-horizontal div:eq(1)');
//   return false;
// }

})
;
