$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': lessonData.token
        }
    });

    var hide_row_curent = function(e){

    };

    $(document).on('click', '.asian-btn-del', function() {
        console.log($(this).parent().parent().find('td')[0].innerText);

        var id = $(this).parent().parent().find('td')[0].innerText;
        var $element = $(this).parent().parent();


         $.post(lessonData.url + id, {
              _method : 'delete'
          }, function (response) {
            console.log(response);
              if(response.isSuccess=='Delete success!'){
                $element.remove();
              }
          }, "json");
    });
});
