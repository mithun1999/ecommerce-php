;(function ($, window, document, undefined) {
    'use strict';
    var $body   = $('body'),
        has_rtl = $body.hasClass('rtl');

    function sumi_force_vc_full_width_row_rtl() {
        var _elements = $('[data-vc-full-width="true"]');
        $.each(_elements, function (key, item) {
            var $this = $(this);
            if ( $this.parent('[data-vc-full-width="true"]').length > 0 ) {
                return;
            } else {
                var this_left  = $this.css('left'),
                    this_child = $this.find('[data-vc-full-width="true"]');

                if ( this_child.length > 0 ) {
                    $this.css({
                        'left': '',
                        'right': this_left
                    });
                    this_child.css({
                        'left': 'auto',
                        'padding-left': this_left.replace('-', ''),
                        'padding-right': this_left.replace('-', ''),
                        'right': this_left
                    });
                } else {
                    $this.css({
                        'left': 'auto',
                        'right': this_left
                    });
                }
            }
        }), $(document).trigger('sumi-force-vc-full-width-row-rtl', _elements);
    };

    function sumi_fix_full_width_row_rtl() {
        if ( has_rtl ) {
            console.log('Right To Left');
            $('.chosen-container').each(function () {
                $(this).addClass('chosen-rtl');
            });
            $(document).on('vc-full-width-row', function () {
                console.log('Start Full Width Row');
                sumi_force_vc_full_width_row_rtl();
            });
        }
    };
    $.fn.sumi_sticky_menu = function () {
        var $this = $(this);
        $this.on('sumi_sticky_menu', function () {
            $this.each(function () {
                var _this            = $(this),
                    _previousScroll  = 0,
                    _headerOrgOffset = $('#header').outerHeight();

                if ( $(window).width() > 1024 ) {
                    $(document).on('scroll', function (ev) {
                        var _currentScroll = $(this).scrollTop();

                        if ( _currentScroll > _headerOrgOffset ) {
                            if ( _currentScroll > _previousScroll ) {
                                _this.addClass('hide-header');
                            } else {
                                _this.removeClass('hide-header');
                                _this.addClass('fixed');
                            }
                        } else {
                            _this.removeClass('fixed');
                        }
                        _previousScroll = _currentScroll;
                    });
                }
            })
        }).trigger('sumi_sticky_menu');
        $(window).on('resize', function () {
            $this.trigger('sumi_sticky_menu');
        });
    }

    /* Category */
    $.fn.sumi_vertical_menu = function () {
        /* SHOW ALL ITEM */
        var _countLi      = 0,
            _verticalMenu = $(this).find('.vertical-menu'),
            _blockNav     = $(this).closest('.block-nav-category'),
            _blockTitle   = $(this).find('.block-title');

        $(this).each(function () {
            var _dataItem = $(this).data('items') - 1;
            _countLi      = $(this).find('.vertical-menu>li').length;

            if ( _countLi > (_dataItem + 1) ) {
                $(this).addClass('show-button-all');
            }
            $(this).find('.vertical-menu>li').each(function (i) {
                _countLi = _countLi + 1;
                if ( i > _dataItem ) {
                    $(this).addClass('link-other');
                }
            })
        });
        $(this).find('.vertical-menu').each(function () {
            var _main = $(this);
            _main.children('.menu-item.parent').each(function () {
                var curent = $(this).find('.submenu');
                $(this).children('.toggle-submenu').on('click', function () {
                    $(this).parent().children('.submenu').slideToggle(500);
                    _main.find('.submenu').not(curent).slideUp(500);
                    $(this).parent().toggleClass('show-submenu');
                    _main.find('.menu-item.parent').not($(this).parent()).removeClass('show-submenu');
                });
                var next_curent = $(this).find('.submenu');
                next_curent.children('.menu-item.parent').each(function () {
                    var child_curent = $(this).find('.submenu');
                    $(this).children('.toggle-submenu').on('click', function () {
                        $(this).parent().parent().find('.submenu').not(child_curent).slideUp(500);
                        $(this).parent().children('.submenu').slideToggle(500);
                        $(this).parent().parent().find('.menu-item.parent').not($(this).parent()).removeClass('show-submenu');
                        $(this).parent().toggleClass('show-submenu');
                    })
                });
            });
        });
        /* VERTICAL MENU ITEM */
        if ( _verticalMenu.length > 0 ) {
            $(document).on('click', '.open-cate', function (e) {
                _blockNav.find('li.link-other').each(function () {
                    $(this).slideDown();
                });
                $(this).addClass('close-cate').removeClass('open-cate').html($(this).data('closetext'));
                e.preventDefault();
            });
            $(document).on('click', '.close-cate', function (e) {
                _blockNav.find('li.link-other').each(function () {
                    $(this).slideUp();
                });
                $(this).addClass('open-cate').removeClass('close-cate').html($(this).data('alltext'));
                e.preventDefault();
            });

            _blockTitle.on('click', function () {
                $(this).toggleClass('active');
                $(this).parent().toggleClass('has-open');
                $body.toggleClass('category-open');
            });
        }
    };
    /* Animate */
    $.fn.sumi_animation_tabs = function (_tab_animated) {
        $(this).on('sumi_animation_tabs', function () {
            _tab_animated = (_tab_animated == undefined || _tab_animated == "") ? '' : _tab_animated;
            if ( _tab_animated == "" ) {
                return;
            }
            $(this).find('.owl-slick .slick-active, .product-list-grid .product-item').each(function (i) {
                var _this  = $(this),
                    _style = _this.attr('style'),
                    _delay = i * 200;

                _style = (_style == undefined) ? '' : _style;
                _this.attr('style', _style +
                    ';-webkit-animation-delay:' + _delay + 'ms;'
                    + '-moz-animation-delay:' + _delay + 'ms;'
                    + '-o-animation-delay:' + _delay + 'ms;'
                    + 'animation-delay:' + _delay + 'ms;'
                ).addClass(_tab_animated + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                    _this.removeClass(_tab_animated + ' animated');
                    _this.attr('style', _style);
                });
            });
        }).trigger('sumi_animation_tabs');
    };
    $.fn.sumi_init_carousel  = function () {
        $(this).on('sumi_init_carousel', function () {
            if ($(this).is('.owl-products')) {
                if ($(this).find('.product-item').length <= 2) {
                    return false;
                }
            }
            $(this).not('.slick-initialized').each(function () {
                var _this       = $(this),
                    _responsive = _this.data('responsive'),
                    _config     = [];

                if ( has_rtl ) {
                    _config.rtl = true;
                }
                if ( _this.hasClass('slick-vertical') ) {
                    _config.prevArrow = '<span class="fa fa-angle-up prev"></span>';
                    _config.nextArrow = '<span class="fa fa-angle-down next"></span>';
                } else {
                    _config.prevArrow = '<span class="fa fa-angle-left prev"></span>';
                    _config.nextArrow = '<span class="fa fa-angle-right next"></span>';
                }
                _config.responsive = _responsive;

                // _this.on('init', function (event, slick, direction) {
                //     sumi_popover_button();
                // });
                _this.slick(_config);
                _this.on('afterChange', function (event, slick, direction) {
                    _this.find('.lazy').sumi_init_lazy_load();
                });
            });
        }).trigger('sumi_init_carousel');
    };
    $.fn.sumi_product_thumb  = function () {
        $(this).on('sumi_product_thumb', function () {
            $(this).not('.slick-initialized').each(function () {
                var _this       = $(this),
                    _responsive = JSON.parse(sumi_global_frontend.data_responsive),
                    _config     = JSON.parse(sumi_global_frontend.data_slick);

                if ( has_rtl ) {
                    _config.rtl = true;
                }
                _config.infinite   = false;
                _config.prevArrow  = '<span class="fa fa-angle-left prev"></span>';
                _config.nextArrow  = '<span class="fa fa-angle-right next"></span>';
                _config.responsive = _responsive;

                _this.slick(_config);
            });
        }).trigger('sumi_product_thumb');
    };
    $.fn.sumi_quickview_product_thumb  = function () {
        $(this).on('sumi_quickview_product_thumb', function () {
            $(this).not('.slick-initialized').each(function () {
                var _this       = $(this),
                    _responsive = [],
                    _config     = [];

                if ( has_rtl ) {
                    _config.rtl = true;
                }
                _config.infinite   = false;
                _config.vertical   = false;
                _config.slidesToShow   = 4;
                _config.slidesMargin   = 10;
                _config.prevArrow  = '<span class="fa fa-angle-left prev"></span>';
                _config.nextArrow  = '<span class="fa fa-angle-right next"></span>';
                _config.responsive = _responsive;

                _this.slick(_config);
            });
        }).trigger('sumi_quickview_product_thumb');
    };
    $.fn.sumi_thumb_tabs     = function () {
        $(this).on('sumi_thumb_tabs', function () {
            $(this).not('.slick-initialized').each(function () {
                var _this = $(this), _config = [];

                if ( has_rtl ) {
                    _config.rtl = true;
                }
                _config.prevArrow     = '<span class="fa fa-angle-left prev"></span>';
                _config.nextArrow     = '<span class="fa fa-angle-right next"></span>';
                _config.variableWidth = true;
                _config.infinite      = true;

                _this.slick(_config);
                _this.on('afterChange', function (event, slick, direction) {
                    _this.find('.lazy').sumi_init_lazy_load();
                });
            });
        }).trigger('sumi_thumb_tabs');
    };
    $.fn.sumi_countdown      = function () {
        $(this).on('sumi_countdown', function () {
            $(this).each(function () {
                var _this           = $(this),
                    _text_countdown = '';

                _this.countdown(_this.data('datetime'), function (event) {
                    _text_countdown = event.strftime(
                        '<span class="days"><span class="number">%D</span><span class="text">' + sumi_global_frontend.countdown_day + '</span></span>' +
                        '<span class="hour"><span class="number">%H</span><span class="text">' + sumi_global_frontend.countdown_hrs + '</span></span>' +
                        '<span class="mins"><span class="number">%M</span><span class="text">' + sumi_global_frontend.countdown_mins + '</span></span>' +
                        '<span class="secs"><span class="number">%S</span><span class="text">' + sumi_global_frontend.countdown_secs + '</span></span>'
                    );
                    _this.html(_text_countdown);
                });
            });
        }).trigger('sumi_countdown');
    };
    $.fn.sumi_init_lazy_load = function () {
        var _this = $(this);
        _this.each(function () {
            var _config = [];

            _config.beforeLoad     = function (element) {
                if ( element.is('div') == true ) {
                    element.addClass('loading-lazy');
                } else {
                    element.parent().addClass('loading-lazy');
                }
            };
            _config.afterLoad      = function (element) {
                if ( element.is('div') == true ) {
                    element.removeClass('loading-lazy');
                } else {
                    element.parent().removeClass('loading-lazy');
                }
            };
            _config.effect         = "fadeIn";
            _config.enableThrottle = true;
            _config.throttle       = 250;
            _config.effectTime     = 600;
            if ( $(this).closest('.megamenu').length > 0 )
                _config.delay = 0;
            $(this).lazy(_config);
        });
    };
    /* Add To Cart Button */
    $.fn.sumi_alert_variable_product = function () {
        $(this).on('sumi_alert_variable_product', function () {
            if ( $(this).hasClass('disabled') ) {
                $(this).popover({
                    content: 'Plz Select option before Add To Cart.',
                    trigger: 'hover',
                    placement: 'bottom'
                });
            } else {
                $(this).popover('destroy');
            }
        }).trigger('sumi_alert_variable_product');
    };
    $(document).change(function () {
        if ( $('.single_add_to_cart_button').length > 0 ) {
            $('.single_add_to_cart_button').sumi_alert_variable_product();
        }
    });
    /* sumi_init_dropdown */
    $(document).on('click', function (event) {
        var _target = $(event.target).closest('.sumi-dropdown'),
            _parent = $('.sumi-dropdown');

        if ( _target.length > 0 ) {
            _parent.not(_target).removeClass('open');
            if (
                $(event.target).is('[data-sumi="sumi-dropdown"]') ||
                $(event.target).closest('[data-sumi="sumi-dropdown"]').length > 0
            ) {
                _target.toggleClass('open');
                event.preventDefault();
            }
        } else {
            $('.sumi-dropdown').removeClass('open');
        }
    });
    /* category product */
    $.fn.sumi_category_product = function () {
        $(this).each(function () {
            var _main = $(this);
            _main.find('.cat-parent').each(function () {
                if ( $(this).hasClass('current-cat-parent') ) {
                    $(this).addClass('show-sub');
                    $(this).children('.children').slideDown(400);
                }
                $(this).children('.children').before('<span class="carets"></span>');
            });
            _main.children('.cat-parent').each(function () {
                var curent = $(this).find('.children');
                $(this).children('.carets').on('click', function () {
                    $(this).parent().toggleClass('show-sub');
                    $(this).parent().children('.children').slideToggle(400);
                    _main.find('.children').not(curent).slideUp(400);
                    _main.find('.cat-parent').not($(this).parent()).removeClass('show-sub');
                });
                var next_curent = $(this).find('.children');
                next_curent.children('.cat-parent').each(function () {
                    var child_curent = $(this).find('.children');
                    $(this).children('.carets').on('click', function () {
                        $(this).parent().toggleClass('show-sub');
                        $(this).parent().parent().find('.cat-parent').not($(this).parent()).removeClass('show-sub');
                        $(this).parent().parent().find('.children').not(child_curent).slideUp(400);
                        $(this).parent().children('.children').slideToggle(400);
                    })
                });
            });
        });
    };
    $.fn.sumi_magnific_popup   = function () {
        $('.product-video-button a').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            disableOn: false,
            fixedContentPos: false
        });
        $('.product-360-button a').magnificPopup({
            type: 'inline',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            disableOn: false,
            preloader: false,
            fixedContentPos: false,
            callbacks: {
                open: function () {
                    $(window).resize();
                },
            },
        });
    };
    /* sumi_better_equal_elems */
    $.fn.sumi_better_equal_elems = function () {
        var _this = $(this);
        _this.on('sumi_better_equal_elems', function () {
            _this.each(function () {
                if ( $(this).find('.equal-elem').length ) {
                    setTimeout(function () {
                        $(this).find('.equal-elem').css({
                            'height': 'auto'
                        });
                        var _height = 0;
                        $(this).find('.equal-elem').each(function () {
                            if ( _height < $(this).height() ) {
                                _height = $(this).height();
                            }
                        });
                        $(this).find('.equal-elem').height(_height);
                    }, 1000);
                }
            });
        }).trigger('sumi_better_equal_elems');
        $(window).on('resize', function () {
            _this.trigger('sumi_better_equal_elems');
        });
    };

    $.fn.sumi_accordion_faqs = function () {
        var _arrow_faqs = $('.sumi-accordion .arrow');

        _arrow_faqs.on('click', function () {
            var _faqs = $(this).closest('.sumi-accordion');
            _faqs.children().not('.title').not('.arrow').slideToggle(300);
            _faqs.toggleClass('active');
            _faqs.find('.lazy').sumi_init_lazy_load();
        }).trigger('sumi_accordion_faqs');
    };
    /* Sumi Ajax Tabs */
    $(document).on('click', '.sumi-tabs .tab-link a, .sumi-accordion .panel-heading a', function (e) {
        e.preventDefault();
        var _this         = $(this),
            _ID           = _this.data('id'),
            _tabID        = _this.attr('href'),
            _ajax_tabs    = _this.data('ajax'),
            _sectionID    = _this.data('section'),
            _tab_animated = _this.data('animate'),
            _loaded       = _this.closest('.tab-link,.sumi-accordion').find('a.loaded').attr('href');

        if ( _ajax_tabs == 1 && !_this.hasClass('loaded') ) {
            $(_tabID).closest('.tab-container,.sumi-accordion').addClass('loading');
            _this.parent().addClass('active').siblings().removeClass('active');
            $.ajax({
                type: 'POST',
                url: sumi_ajax_frontend.ajaxurl,
                data: {
                    action: 'sumi_ajax_tabs',
                    security: sumi_ajax_frontend.security,
                    id: _ID,
                    section_id: _sectionID,
                },
                success: function (response) {
                    if ( response[ 'success' ] == 'ok' ) {
                        $(_tabID).html($(response[ 'html' ]).find('.vc_tta-panel-body').html());
                        $(_tabID).closest('.tab-container,.sumi-accordion').removeClass('loading');
                        $('[href="' + _loaded + '"]').removeClass('loaded');
                        $(_tabID).find('.sumi-countdown').sumi_countdown();
                        $(_tabID).find('.owl-slick').sumi_init_carousel();
                        if ( $('.owl-slick .product-item').length > 0 ) {
                            $(_tabID).find('.owl-slick .row-item,' +
                                '.owl-slick .product-item.style-1,' +
                                '.owl-slick .product-item.style-2,' +
                                '.owl-slick .product-item.style-3,' +
                                '.owl-slick .product-item.style-4');
                        }
                        if ( $(_tabID).find('.variations_form').length > 0 ) {
                            $(_tabID).find('.variations_form').each(function () {
                                $(this).wc_variation_form();
                            });
                        }
                        $(_tabID).trigger('sumi_ajax_tabs_complete');
                        _this.addClass('loaded');
                        $(_loaded).html('');
                    } else {
                        $(_tabID).closest('.tab-container,.sumi-accordion').removeClass('loading');
                        $(_tabID).html('<strong>Error: Can not Load Data ...</strong>');
                    }
                    /* for accordion */
                    _this.closest('.panel-default').addClass('active').siblings().removeClass('active');
                    _this.closest('.sumi-accordion').find(_tabID).slideDown(400);
                    _this.closest('.sumi-accordion').find('.panel-collapse').not(_tabID).slideUp(400);
                },
                complete: function () {
                    $(_tabID).addClass('active').siblings().removeClass('active');
                    setTimeout(function (args) {
                        $(_tabID).sumi_animation_tabs(_tab_animated);
                    }, 10);
                }
            });
        } else {
            _this.parent().addClass('active').siblings().removeClass('active');
            $(_tabID).addClass('active').siblings().removeClass('active');
            /* for accordion */
            _this.closest('.panel-default').addClass('active').siblings().removeClass('active');
            _this.closest('.sumi-accordion').find(_tabID).slideDown(400);
            _this.closest('.sumi-accordion').find('.panel-collapse').not(_tabID).slideUp(400);
            $(_tabID).sumi_animation_tabs(_tab_animated);
        }
    });
    $(document).on('click', '.overlay-body', function () {
        $(this).closest('body').removeClass('canvas-open');
        $('.canvas-content').removeClass('open');
    });
    $(document).on('click', '.canvas-button', function (e) {
        if ( $(this).hasClass('open') ) {
            $(this).closest('body').addClass('canvas-open');
        } else {
            $(this).closest('body').removeClass('canvas-open');
        }
        e.preventDefault();
    });
    $(document).on('click','.search-mobile',function () {
        $('body').addClass('header-bock-search-open');
        $(this).closest('.form-search').find('.searchfield').focus();
        return false;
    })
    $(document).on('click','.close-block-search',function () {
        $('body').removeClass('header-bock-search-open');
        return false;
    })
    $(document).on('click', 'a.backtotop', function (e) {
        $('html, body').animate({scrollTop: 0}, 800);
        e.preventDefault();
    });
    $(document).on('scroll', function () {
        if ( $(window).scrollTop() > 200 ) {
            $('.backtotop').addClass('active');
        } else {
            $('.backtotop').removeClass('active');
        }
    });
    $('body').on('click', '.quantity .quantity-plus', function (e) {
        var _this  = $(this).closest('.quantity').find('input.qty'),
            _value = parseInt(_this.val()),
            _max   = parseInt(_this.attr('max')),
            _step  = parseInt(_this.data('step')),
            _value = _value + _step;
        if ( _max && _value > _max ) {
            _value = _max;
        }
        _this.val(_value);
        _this.trigger("change");
        e.preventDefault();
    });
    $(document).on('change', function () {
        $('.quantity').each(function () {
            var _this  = $(this).find('input.qty'),
                _value = _this.val(),
                _max   = parseInt(_this.attr('max'));
            if ( _value > _max ) {
                $(this).find('.quantity-plus').css('pointer-events', 'none')
            } else {
                $(this).find('.quantity-plus').css('pointer-events', 'auto')
            }
        })
    });
    $('body').on('click', '.quantity .quantity-minus', function (e) {
        var _this  = $(this).closest('.quantity').find('input.qty'),
            _value = parseInt(_this.val()),
            _min   = parseInt(_this.attr('min')),
            _step  = parseInt(_this.data('step')),
            _value = _value - _step;
        if ( _min && _value < _min ) {
            _value = _min;
        }
        if ( !_min && _value < 0 ) {
            _value = 0;
        }
        _this.val(_value);
        _this.trigger("change");
        e.preventDefault();
    });
    $.fn.sumi_product_gallery = function () {
        $(this).each(function () {
            var _items      = $(this).closest('.product-inner').data('items'),
                _main_slide = $(this).find('.product-gallery-slick'),
                _dot_slide  = $(this).find('.gallery-dots');

            _main_slide.not('.slick-initialized').each(function () {
                var _this   = $(this),
                    _config = [];

                if ( $('body').hasClass('rtl') ) {
                    _config.rtl = true;
                }
                _config.prevArrow    = '<span class="fa fa-angle-left prev"></span>';
                _config.nextArrow    = '<span class="fa fa-angle-right next"></span>';
                _config.cssEase      = 'linear';
                _config.infinite     = true;
                _config.fade         = true;
                _config.slidesMargin = 0;
                _config.arrows       = false;
                _config.asNavFor     = _dot_slide;
                _this.slick(_config);
            });
            _dot_slide.not('.slick-initialized').each(function () {
                var _config = [];
                if ( $('body').hasClass('rtl') ) {
                    _config.rtl = true;
                }
                _config.slidesToShow  = _items;
                _config.infinite      = true;
                _config.focusOnSelect = true;
                _config.vertical      = true;
                _config.slidesMargin  = 0;
                _config.prevArrow     = '<span class="fa fa-angle-up prev"></span>';
                _config.nextArrow     = '<span class="fa fa-angle-down next"></span>';
                _config.asNavFor      = _main_slide;
                _config.responsive    = [
                    {
                        breakpoint: 1024,
                        settings: {
                            vertical: false,
                            prevArrow: '<span class="fa fa-angle-left prev"></span>',
                            nextArrow: '<span class="fa fa-angle-right next"></span>',
                        }
                    }
                ];
                $(this).slick(_config);
            })
        })
    };

    $.fn.sumi_hover_product_item    = function () {
        var _this = $(this);
        _this.on('sumi_hover_product_item', function () {
            _this.each(function () {
                var _winw = $(window).innerWidth();
                if ( _winw > 1024 ) {
                    $(this).hover(
                        function () {
                            $(this).closest('.slick-list').css({
                                'padding-left': '10px',
                                'padding-right': '10px',
                                'padding-bottom': '10px',
                                'margin-left': '-10px',
                                'margin-right': '-10px',
                                'margin-bottom': '-10px',
                            });
                        }, function () {
                            $(this).closest('.slick-list').css({
                                'padding-left': '0',
                                'padding-right': '0',
                                'padding-bottom': '0',
                                'margin-left': '0',
                                'margin-right': '0',
                                'margin-bottom': '0',
                            });
                        }
                    );
                }
            });
        }).trigger('sumi_hover_product_item');
    };
    $.fn.sumi_google_map            = function () {
        var _this = $(this);
        _this.each(function () {
            var $id              = $(this).data('id'),
                $latitude        = $(this).data('latitude'),
                $longitude       = $(this).data('longitude'),
                $zoom            = $(this).data('zoom'),
                $map_type        = $(this).data('map_type'),
                $title           = $(this).data('title'),
                $address         = $(this).data('address'),
                $phone           = $(this).data('phone'),
                $email           = $(this).data('email'),
                $hue             = '',
                $saturation      = '',
                $modify_coloring = false,
                $coinpo_map      = {
                    lat: $latitude,
                    lng: $longitude
                };

            if ( $modify_coloring === true ) {
                var $styles = [
                    {
                        stylers: [
                            {hue: $hue},
                            {invert_lightness: false},
                            {saturation: $saturation},
                            {lightness: 1},
                            {
                                featureType: "landscape.man_made",
                                stylers: [ {
                                    visibility: "on"
                                } ]
                            }
                        ]
                    }, {
                        featureType: 'water',
                        elementType: 'geometry',
                        stylers: [
                            {color: '#46bcec'}
                        ]
                    }
                ];
            }
            var map = new google.maps.Map(document.getElementById($id), {
                zoom: $zoom,
                center: $coinpo_map,
                mapTypeId:
                google.maps.MapTypeId.$map_type,
                styles: $styles
            });

            var contentString = '<div style="background-color:#fff; padding: 30px 30px 10px 25px; width:290px;line-height: 22px" class="coinpo-map-info">' +
                '<h4 class="map-title">' + $title + '</h4>' +
                '<div class="map-field"><i class="fa fa-map-marker"></i><span>&nbsp;' + $address + '</span></div>' +
                '<div class="map-field"><i class="fa fa-phone"></i><span>&nbsp;<a href="tel:' + $phone + '">' + $phone + '</a></span></div>' +
                '<div class="map-field"><i class="fa fa-envelope"></i><span><a href="mailto:' + $email + '">&nbsp;' + $email + '</a></span></div> ' +
                '</div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            var marker = new google.maps.Marker({
                position: $coinpo_map,
                map: map
            });
            marker.addListener('click', function () {
                infowindow.open(map, marker);
            });
        });
    };
    $(document).on('click', '.loadmore-product a', function (e) {
        var _this         = $(this),
            _main_content = _this.closest('.sumi-products'),
            _parent       = _this.closest('.loadmore-product'),
            _loop_query   = _parent.data('loop'),
            _loop_id      = _parent.data('id'),
            _loop_style   = _parent.data('style'),
            _loop_thumb   = _parent.data('thumb'),
            _liststyle    = _parent.data('type'),
            _loop_class   = _parent.data('class');

        _main_content.addClass('loading');
        $.ajax({
            type: 'POST',
            url: sumi_ajax_frontend.ajaxurl,
            data: {
                action: 'sumi_ajax_loadmore',
                security: sumi_ajax_frontend.security,
                loop_query: _loop_query,
                loop_class: _loop_class,
                loop_id: _loop_id,
                loop_style: _loop_style,
                loop_thumb: _loop_thumb,
            },
            success: function (response) {
                if ( response[ 'out_post' ] == 'yes' ) {
                    _this.html('OUT OF POST');
                }
                if ( _liststyle == 'owl' ) {
                    _main_content.find('.owl-slick').slick('unslick');
                }
                if ( response[ 'success' ] == 'yes' && response[ 'out_post' ] == 'no' ) {
                    _main_content.find('.response-product').html(response[ 'html' ]);
                    _parent.data('id', response[ 'loop_id' ]);
                }
            },
            complete: function () {
                _main_content.find('.owl-slick').sumi_init_carousel();
                // sumi_popover_button();
                _main_content.removeClass('loading');
            }
        });
        e.preventDefault();
    });

    $(document).on('click', '.loadmore-faqs a', function (e) {
        var _this         = $(this),
            _main_content = _this.closest('.sumi-faqs'),
            _parent       = _this.closest('.loadmore-faqs'),
            _loop_query   = _parent.data('query'),
            _loop_id      = _parent.data('id'),
            _loop_class   = _parent.data('class');

        _main_content.addClass('loading');
        $.ajax({
            type: 'POST',
            url: sumi_ajax_frontend.ajaxurl,
            data: {
                action: 'sumi_ajax_faqs_loadmore',
                security: sumi_ajax_frontend.security,
                loop_query: _loop_query,
                loop_class: _loop_class,
                loop_id: _loop_id,
            },
            success: function (response) {
                if ( response[ 'success' ] == 'yes' && response[ 'out_post' ] == 'no' ) {
                    _main_content.find('.faqs-list-grid').append(response[ 'html' ]);
                    _parent.data('id', response[ 'loop_id' ]);
                    if ( _main_content.find('.variations_form').length > 0 ) {
                        _main_content.find('.variations_form').each(function () {
                            $(this).wc_variation_form();
                        });
                    }
                }
                if ( response[ 'out_post' ] == 'yes' ) {
                    _this.html('OUT OF POST');
                }
                _main_content.removeClass('loading');
            },
        });
        e.preventDefault();
    });
    /* NOTIFICATIONS */
    $(document).on('click', '.remove_from_cart_button', function () {
        var cart_item_key = $(this).data('cart_item_key');
        sumi_setCookie("cart_item_key_just_removed", cart_item_key, 1);
        sumi_setCookie("undo_cart_link", sumi_ajax_frontend.wp_nonce_url + '&undo_item=' + cart_item_key, 1);
    });

    $(document.body).on('removed_from_cart', function (a, b) {
        var cart_item_key   = sumi_getCookie("cart_item_key_just_removed");
        var undo_cart_link  = sumi_getCookie("undo_cart_link");
        var config          = [];
        config[ 'title' ]   = sumi_ajax_frontend.growl_notice_text;
        config[ 'message' ] =
            '<p class="growl-content">' + sumi_ajax_frontend.removed_cart_text;

        $.growl.notice(config);
    });
    $body.on('click', 'a.add_to_cart_button', function () {
        $('a.add_to_cart_button').removeClass('recent-added');
        $(this).addClass('recent-added');

        if ( $(this).is('.product_type_variable, .isw-ready') ) {
            $(this).addClass('loading');
        }

    });

    // On single product page
    $body.on('click', 'button.single_add_to_cart_button', function () {
        $('button.single_add_to_cart_button').removeClass('recent-added');
        $(this).addClass('recent-added');
    });

    $body.on('click', '.add_to_wishlist', function () {
        $(this).addClass('loading');
    });

    $body.on('added_to_cart', function () {
        var config        = [];
        config[ 'title' ] = sumi_ajax_frontend.growl_notice_text;

        $('.add_to_cart_button.product_type_variable.isw-ready').removeClass('loading');

        var $recentAdded = $('.add_to_cart_button.recent-added, button.single_add_to_cart_button.recent-added'),
            $img         = $recentAdded.closest('.product-item').find('img.img-responsive'),
            pName        = $recentAdded.attr('aria-label');

        // if add to cart from wishlist
        if ( !$img.length ) {
            $img = $recentAdded.closest('.wishlist_item')
                .find('.wishlist_item_product_image img');
        }

        // if add to cart from single product page
        if ( !$img.length ) {
            $img = $recentAdded.closest('.summary')
                .prev()
                .find('.woocommerce-main-image img');
        }

        // reset state after 5 sec
        setTimeout(function () {
            $recentAdded.removeClass('added').removeClass('recent-added');
            $recentAdded.next('.added_to_cart').remove();
        }, 5000);

        if ( typeof pName == 'undefined' || pName == '' ) {
            pName = $recentAdded.closest('.summary').find('.product_title').text().trim();
        }

        if ( typeof pName !== 'undefined' ) {

            config[ 'message' ] = (
                    $img.length ? '<img src="' + $img.attr('src') + '"' + ' alt="' + pName + '" class="growl-thumb" />' : ''
                ) + '<p class="growl-content">' + pName + ' ' + sumi_ajax_frontend.added_to_cart_notification_text + '&nbsp;<a href="' + sumi_ajax_frontend.wc_cart_url + '">' + sumi_ajax_frontend.view_cart_notification_text + '</a></p>';

        } else {
            config[ 'message' ] =
                sumi_ajax_frontend.added_to_cart_text + '&nbsp;<a href="' + sumi_ajax_frontend.wc_cart_url + '">' + sumi_ajax_frontend.view_cart_notification_text + '</a>';
        }

        $.growl.notice(config);
    });
    $body.on('added_to_wishlist', function () {
        var config        = [];
        config[ 'title' ] = sumi_ajax_frontend.growl_notice_text;

        $('#yith-wcwl-popup-message').remove();

        config[ 'message' ] =
            '<p class="growl-content">' + sumi_ajax_frontend.added_to_wishlist_text + '&nbsp;<a href="' + sumi_ajax_frontend.wishlist_url + '">' + sumi_ajax_frontend.browse_wishlist_text + '</a></p>';

        $.growl.notice(config);
    });

    function sumi_popup_newsletter() {
        var _popup = document.getElementById('popup-newsletter');
        if ( _popup != null ) {
            if ( sumi_global_frontend.sumi_enable_popup_mobile != 1 ) {
                if ( $(window).innerWidth() <= 992 ) {
                    return;
                }
            }
            var disabled_popup_by_user = getCookie('sumi_disabled_popup_by_user');
            if ( disabled_popup_by_user == 'true' ) {
                return;
            } else {
                if ( sumi_global_frontend.sumi_enable_popup == 1 ) {
                    setTimeout(function () {
                        $(_popup).modal({
                            keyboard: false
                        });
                        $(_popup).find('.lazy').lazy({
                            delay: 0
                        });
                    }, sumi_global_frontend.sumi_popup_delay_time);
                }
            }
            $(document).on('change', '.sumi_disabled_popup_by_user', function () {
                if ( $(this).is(":checked") ) {
                    setCookie('sumi_disabled_popup_by_user', 'true', 7);
                } else {
                    setCookie('sumi_disabled_popup_by_user', '', 0);
                }
            });
        }

        function setCookie() {
            var d = new Date();
            d.setTime(d.getTime() + (arguments[ 2 ] * 24 * 60 * 60 * 1000));
            var expires     = "expires=" + d.toUTCString();
            document.cookie = arguments[ 0 ] + "=" + arguments[ 1 ] + "; " + arguments[ 2 ];
        }

        function getCookie() {
            var name = arguments[ 0 ] + "=",
                ca   = document.cookie.split(';'),
                i    = 0,
                c    = 0;
            for ( ; i < ca.length; ++i ) {
                c = ca[ i ];
                while ( c.charAt(0) == ' ' ) {
                    c = c.substring(1);
                }
                if ( c.indexOf(name) == 0 ) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
    }

    $(document).ajaxComplete(function (event, xhr, settings) {
        if ( $('.lazy').length > 0 ) {
            $('.lazy').sumi_init_lazy_load();
        }
        if ( $('.equal-container.better-height').length > 0 ) {
            $('.equal-container.better-height').sumi_better_equal_elems();
        }
        // sumi_popover_button();
    });
    $(document).on('qv_loader_stop', function (event) {
        if ( $(event.target).find('.flex-control-thumbs').length > 0 ) {
            $(event.target).find('.flex-control-thumbs').sumi_quickview_product_thumb();
        }
    });
    $(document).ready(function () {
        sumi_fix_full_width_row_rtl();
    });
    window.addEventListener('load',
        function (ev) {
            if ( $('.lazy').length > 0 ) {
                $('.lazy').sumi_init_lazy_load();
            }
            if ( $('.sumi-countdown').length > 0 ) {
                $('.sumi-countdown').sumi_countdown();
            }
            if ( $('.owl-slick').length > 0 ) {
                $('.owl-slick').sumi_init_carousel();
            }
            if ( $('.product-gallery').length > 0 ) {
                $('.product-gallery').sumi_product_gallery();
            }
            if ( $('.owl-slick .product-item').length > 0 ) {
                $('.owl-slick .row-item,' +
                    '.owl-slick .product-item.style-1,' +
                    '.owl-slick .product-item.style-2,' +
                    '.owl-slick .product-item.style-3,' +
                    '.owl-slick .product-item.style-4').sumi_hover_product_item();
            }
            if ( $('.block-nav-category').length > 0 ) {
                $('.block-nav-category').sumi_vertical_menu();
            }
            if ( $('.flex-control-thumbs').length > 0 ) {
                $('.flex-control-thumbs').sumi_product_thumb();
            }
            if ( $('.category-search-option').length > 0 ) {
                $('.category-search-option').chosen();
            }
            if ( $('.category .chosen-results').length > 0 && $.fn.scrollbar ) {
                $('.category .chosen-results').scrollbar();
            }
            if ( $('.single_add_to_cart_button').length > 0 ) {
                $('.single_add_to_cart_button').sumi_alert_variable_product();
            }
            if ( $('.widget_product_categories .product-categories').length > 0 ) {
                $('.widget_product_categories .product-categories').sumi_category_product();
            }
            if ( $('.sumi-google-maps').length > 0 ) {
                $('.sumi-google-maps').sumi_google_map();
            }
            if ( $('.header-sticky').length > 0 ) {
                $('.header-sticky').sumi_sticky_menu();
            }
            if ( $('.equal-container.better-height').length > 0 ) {
                $('.equal-container.better-height').sumi_better_equal_elems();
            }
            if ( $('.sumi-accordion').length > 0 ) {
                $('.sumi-accordion').sumi_accordion_faqs();
            }
            // sumi_popover_button();
            sumi_popup_newsletter();
            $body.sumi_magnific_popup();
        }, false);
})(jQuery, window, document);