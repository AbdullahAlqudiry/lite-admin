var app = app || {};

(function ($, plugin) {
    'use strict';

    // ie
    if (!!navigator.userAgent.match(/MSIE/i) || !!navigator.userAgent.match(/Trident.*rv:11\./)) {
        $('body').addClass('ie');
    }

    // iOs, Android, Blackberry, Opera Mini, and Windows mobile devices
    var ua = window['navigator']['userAgent'] || window['navigator']['vendor'] || window['opera'];
    if ((/iPhone|iPod|iPad|Silk|Android|BlackBerry|Opera Mini|IEMobile/).test(ua)) {
        $('body').addClass('touch');
    }

    // fix z-index on ios safari
    if ((/iPhone|iPod|iPad/).test(ua)) {
        $(document, '.modal, .aside').on('shown.bs.modal', function (e) {
            var backDrop = $('.modal-backdrop');
            $(e.target).after($(backDrop));
        });
    }

    //resize
    $(window).on('resize', function () {
        var $w = $(window).width()
            , $lg = 1200
            , $md = 991
            , $sm = 768
            ;
        if ($w > $lg) {
            $('.aside-lg').modal('hide');
        }
        if ($w > $md) {
            $('#aside').modal('hide');
            $('.aside-md, .aside-sm').modal('hide');
        }
        if ($w > $sm) {
            $('.aside-sm').modal('hide');
        }
    });

    app.init = function () {

        $('[data-toggle="popover"]').popover();
        $('[data-toggle="tooltip"]').tooltip();

        // init the plugin
        $('body').find('[data-plugin]').plugin();

    }

    app.init();

    $(document).on('pjaxEnd', function () {
        app.init();
    });
    

})(jQuery, app);


$(document).ready(function () {

    
    $(document).ready(function() {
    
    
        $('.delete-url-action').click(function(event) {
            event.preventDefault();
            
            Swal.fire({
                title: "Confirmation",
                text: "When performing the action, you will not be able to undo it",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Delete'
            })
            .then((result) => {
                
                if (result.value) {
                    
                    axios.delete($(this).attr('href'))
                    .then(function (response) {
                        location.reload();
                    })
                    .catch(error => {
    
                        Swal.fire({
                            title: "Error",
                            text: error.response.data,
                            icon: "info",
                        });
    
                    })
    
                }
            
            });
    
        });
    
    
        $('.select2').select2();
    
    });

});