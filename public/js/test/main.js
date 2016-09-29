var index;
var answer;
var score =0;
$(document).ready(function() {
  $(document).on('change','.event_answer', function() {
        answer_input = $(this).val();
        if(answer_input==answer)
           {
             score++;
             $('#score').val(score);
           }
            else
            {
          $(this).css("color", "red"); }
    }
      );
}
);
