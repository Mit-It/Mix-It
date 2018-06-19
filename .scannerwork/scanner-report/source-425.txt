$(document).ready(function () {
    $('#mi-addToRecipebook').click(function (event) {
        event.preventDefault();
        $(this).next('.mi-addToRecipebook-form').show();
    })
})