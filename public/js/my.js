$(document).ready(function () {

    $(".sort").click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var filter = $(this).attr('data-test');
        $.ajax({
            type: 'post',
            url: "/sort",
            data: {date: filter},
            success: function (data) {
                $('.main').empty();

                $('.main').append(data);
            }
        });
    });


    $('#search').on('keyup', function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $value = $(this).val();

        $.ajax({

            type: 'get',

            url: "/search",

            data: {'search': $value},

            success: function (data) {
                $('tbody').html(data);
            }
        });
    })
});