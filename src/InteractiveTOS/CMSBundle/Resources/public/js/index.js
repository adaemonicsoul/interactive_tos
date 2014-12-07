(function ($) {
    $(document).ready(function () {
        $('a.revealing-button').click(function (e) {
            var id = $(this).attr('href');

            if ($(id).length > 0) {
                e.preventDefault();
                if($(this).is('.revealing-hide'))
                    $(this).toggle();
                $(id).toggle();
            }
        });
    });
})(jQuery);