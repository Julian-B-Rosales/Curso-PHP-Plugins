(function($) {
    $('#quizbook ul li .answer').on('click', function() {
        $(this).siblings().removeAttr('selected');
        $(this).siblings().removeClass('selected');
        $(this).addClass('selected');
        $(this).attr('selected', true);
    });

    $('#quizbook_send').on('submit', function(e) {
        e.preventDefault();
        
        var answers = $('{selected}');

        var id_answers = [];

        $.each(answers, function(index, value) {
            id_answers.push(value.id);
        });

        var data = {
            action: 'quizbook_results',
            answers: id_answers
        };

        $.ajax({
            url: admin_url.ajax_url,
            type: 'POST',
            data: data
        }).done(function(response) {
            var grade;
            if (response.grade > 60) {
                grade = "approved";
            }else{
                grade = "failed";
            }

            $('#quizbook_result').append('Total grade: ' + response.grade + '%. You ' + grade + ' the quiz.');
            $('#quizbook_btn_submit').remove();
        });
    });
})(jQuery);