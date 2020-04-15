;(function ($) {
    "use strict";

    function variations_custom() {
        $('.variations_form').find('.data-val').html('');
        $('.variations_form select').each(function () {
            var _this = $(this);
            _this.find('option').each(function () {
                var _ID        = $(this).parent().data('id'),
                    _data      = $(this).data(_ID),
                    _value     = $(this).attr('value'),
                    _name      = $(this).html(),
                    _data_type = $(this).data('type'),
                    _itemclass = _data_type;

                if ( $(this).is(':selected') ) {
                    _itemclass += ' active';
                }
                if ( _value !== '' ) {
                    if ( _data_type == 'color' || _data_type == 'photo' ) {
                        _this.parent().find('.data-val').append('<a class="change-value ' + _itemclass + '" href="#" style="background: ' + _data + ';background-size: cover; background-repeat: no-repeat " data-value="' + _value + '"></a>');
                    } else {
                        _this.parent().find('.data-val').append('<a class="change-value ' + _itemclass + '" href="#" data-value="' + _value + '">' + _name + '</a>');
                    }
                }
            });
        });
    }

    $(document).on('click', '.reset_variations', function () {
        $('.variations_form').find('.change-value').removeClass('active');
    });
    $(document).on('click', '.variations_form .change-value', function (e) {
        var _this   = $(this),
            _change = _this.data('value');

        _this.parent().parent().children('select').val(_change).trigger('change');
        _this.addClass('active').siblings().removeClass('active');
        e.preventDefault();
    });
    $(document).on('woocommerce_variation_has_changed wc_variation_form', function () {
        variations_custom();
    });
    $(document).on('qv_loader_stop', function () {
        variations_custom();
    });
})(jQuery);