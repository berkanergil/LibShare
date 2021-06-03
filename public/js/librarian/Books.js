if (window.matchMedia("(max-width: 960px)").matches) {
    var util = UIkit.util;

    var btn = util.$('.uk-button');
    var modalEl = util.$('#modal-example');

    util.on(btn, 'click', function () {

        // match media

        // Open modal
        UIkit.modal(modalEl).show();


    })
} else {
    // Notification
    // UIkit.notification('Window is less than 900px');
}

$(document).ready(function () {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
});