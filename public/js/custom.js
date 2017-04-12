$().ready(function () {

    var $errors = $('#errors');
    var $total = $('#total');
    var $form = $('#create');

    var endpoint = '/api/purchases';

    $.getJSON(endpoint, function (response) {
        if (response.success) {
            $.each(response.data, function (i, item) {
                updateTable(item);
            });
        } else {
            generateErrorMessage(response);
        }
    });

    $form.submit(function (e) {
        $.post(endpoint, $(this).serialize(), function (response) {
            if (response.success) {
                $form[0].reset();
                $errors.html('');
                updateTable(response.data);
            } else {
                generateErrorMessage(response, $errors);
            }
        }, 'json').fail(function () {
            $errors.html('<li>Some error occurred</li>');
        });

        e.preventDefault();
        return false;
    });

    function updateTable(item) {
        $('#table tr:last').after(generateTableRow(item));
    }

    function generateErrorMessage(response) {
        var errors = [];
        $.each(response.errors, function (i, item) {
            $.each(item, function (e, error) {
                errors.push('<li>' + error + '</li>');
            });
        });
        $errors.html(errors.join(''));
    }

    function generateTableRow(data) {
        var subTotal = data.offering.price * data.quantity;
        calcTotal(subTotal);
        return '<tr>' +
            '<td>'+data.id+'</td>' +
            '<td>'+data.offering.title+'</td>' +
            '<td>'+data.offering.price+'</td>' +
            '<td>'+data.quantity+'</td>' +
            '<td>'+subTotal+'</td>' +
            '</tr>'
    }

    function calcTotal(subTotal) {
        $total.text(parseFloat($total.text()) + subTotal);
    }
});