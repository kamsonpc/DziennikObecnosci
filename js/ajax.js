$(document).ready(function () {
    function update() {
        $.ajax({
            type: 'POST'
            , url: 'includes/extras/clock.php'
            , timeout: 1000
            , success: function (data) {
                $(".clock").html("<i class='fa fa-clock-o'></i> " + data);
                window.setTimeout(update, 1000);
            }
        });
    }
    update();
});
