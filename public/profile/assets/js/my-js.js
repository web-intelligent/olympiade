(function($) {
    $('select[name="state"]').on('change', function () {
        if($(this).val() === 'Российская Федерация') {

            $.ajax({
                type: "POST",
                url: "/regions",
                data: {
                    'region': 'get',
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                context: $(this),
                success: function (response) {
                    let res = $.trim(response);
                    $('.appends').find('.row').append(res)

                    $('select[name="region"]').on('change', function (e) {
                        e.preventDefault();

                        $.ajax({
                            type: "POST",
                            url: "/municipality",
                            data: {
                                'region': $('select[name="region"]').val(),
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            context: $(this),
                            success: function (responseMun) {
                                let res_mun = $.trim(responseMun);
                                $('.appends').find('.set_municipality').remove()
                                $('.appends').find('.row').append(res_mun)
                            }
                        })
                    })
                }
            })
        } else {
            $('.appends .row').empty()
        }
    })

    $('select[name="region"]').on('change', function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "/municipality",
            data: {
                'region': $('select[name="region"]').val(),
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            context: $(this),
            success: function (responseMun) {
                let res_mun = $.trim(responseMun);
                $('.appends').find('.set_municipality').remove()
                $('.appends').find('.row').append(res_mun)
            }
        })
    })


    $('.response-message').on('click', function (e) {
        e.preventDefault();

        $(this).fadeOut('slow')
    })
})(jQuery);


