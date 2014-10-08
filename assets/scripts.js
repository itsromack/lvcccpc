$(function() {
    // Side Bar Toggle
    $('.hide-sidebar').click(function() {
      $('#sidebar').hide('fast', function() {
        $('#content').removeClass('span9');
        $('#content').addClass('span12');
        $('.hide-sidebar').hide();
        $('.show-sidebar').show();
      });
    });

    $('.show-sidebar').click(function() {
        $('#content').removeClass('span12');
        $('#content').addClass('span9');
        $('.show-sidebar').hide();
        $('.hide-sidebar').show();
        $('#sidebar').show('fast');
    });

    $('.reject-code').click(function(){
        answer_id = $('#answerId').val();
        $.ajax({
            type: 'GET',
            url: '/ajax/rejectCode.php',
            data: {id: answer_id},
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#submission_' + answer_id + ' span').removeClass('label-success').addClass('label-default').html(response.code_status);
                    $('#reviewCodeModal').modal('hide');
                }
            }
        });
    });

    $('.accept-code').click(function(){
        answer_id = $('#answerId').val();
        $.ajax({
            type: 'GET',
            url: '/ajax/acceptCode.php',
            data: {id: answer_id},
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#submission_' + answer_id + ' span').removeClass('label-default').addClass('label-success').html(response.code_status);
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
        $.ajax({
            type: 'GET',
            url: '/ajax/getAnswer.php',
            data: {id: answer_id},
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