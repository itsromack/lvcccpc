$(function() {
    $('.reject-code').click(function(){
        answer_id = $('#answerId').val();
        code_reviewer_id = $('#code_reviewer_id').val();
        $.ajax({
            type: 'GET',
            url: '/ajax/rejectCode.php',
            data: {id: answer_id, rid: code_reviewer_id},
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#submission_' + answer_id + ' span.label')
                    .removeClass('label-warning')
                    .removeClass('label-success')
                    .addClass('label-default')
                    .html(response.code_status);
                    $('#reviewCodeModal').modal('hide');
                }
            }
        });
    });

    $('.accept-code').click(function(){
        answer_id = $('#answerId').val();
        code_reviewer_id = $('#code_reviewer_id').val();
        $.ajax({
            type: 'GET',
            url: '/ajax/acceptCode.php',
            data: {id: answer_id, rid: code_reviewer_id},
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#submission_' + answer_id + ' span.label')
                    .removeClass('label-warning')
                    .removeClass('label-default')
                    .addClass('label-success')
                    .html(response.code_status);
                    $('#reviewCodeModal').modal('hide');
                }
            }
        });
    });

    $('.review-code').click(function(){
        // retrieve source code
        title = $(this).data('title');
        team = $(this).data('team');
        answer_id = $(this).data('id');
        code_reviewer_id = $('#code_reviewer_id').val();
        $.ajax({
            type: 'GET',
            url: '/ajax/getAnswer.php',
            data: {id: answer_id, rid: code_reviewer_id},
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#ReviewCodeLabel').html(title + " <small>by: " + team + "</small>");
                    $('#sourceCode').val(response.data.answer);
                    $('#sourceCode').attr('rows', 15);
                    $('#sourceCode').css('width', '95%');
                    $('#sourceCode').css('background-color', 'whitesmoke');
                    $('#answerId').val(answer_id);
                }
            }
        });
    });
});