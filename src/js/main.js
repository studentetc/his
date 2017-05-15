$(function() {

    // Read, retrieve, search, or view existing entries
    var read = function () {
        $.ajax({
            url: "./src/php/read.php",
            context: document.body
        }).done(function(response) {

            createTrHTML(response);

            $(".delete").on("click", function(event) {
                console.log($(this).attr('id'));
                $.ajax({
                    method : 'GET',
                    url : './src/php/delete.php?id=' + $(this).attr('id'),
                    encode : true
                });
                $(this).parent().remove();
            });
        });
    }

    // Create or add new entries
    $("#target").submit(function(event) {

        event.preventDefault();

        var formData = {
            'first_name' : $('input[name=first_name]').val(),
            'last_name' : $('input[name=last_name]').val()
        };

        $.ajax({
            method : 'POST',
            url : './src/php/create.php',
            data : formData,
            encode : true
        }).always(function(response) {
            read();
        });
    });

    var createTrHTML = function (response) {
        var trHTML = '';
        $.each(JSON.parse(response), function (i, item) {
            trHTML += '<tr>';
            trHTML += '<td>' + item.first_name + '</td>';
            trHTML += '<td>' + item.last_name + '</td>';
            trHTML += '<td id="'+ item.id + '" class="delete"></td>';
            trHTML += '</tr>';
        });
        $('#records_table tbody').html(trHTML);
        $('.delete').load( './src/html/remove.html' );
    }

    read();

});
