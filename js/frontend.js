(function($) {
    "use strict";

    function sumi_resizeMegamenu() {
        var window_size = jQuery('body').innerWidth();
        window_size += sumi_get_scrollbar_width();
        if (window_size > 991) {
            $('.sumi-menu-wapper').each(function() {
                if ($(this).length > 0) {
                    var container = $(this);
                    if (container != 'undefined') {
                        var container_width = 0,
                            container_offset = container.offset();
                        container_width = container.innerWidth();
                        setTimeout(function() {
                            $('.sumi-menu-wapper .item-megamenu').each(function(index, element) {
                                $(element).children('.megamenu').css({
                                    'max-width': container_width + 'px'
                                });
                                var sub_menu_width = $(element).children('.megamenu').outerWidth(),
                                    item_width = $(element).outerWidth(),
                                    container_left = container_offset.left,
                                    container_right = (container_left + container_width),
                                    item_left = $(element).offset().left,
                                    overflow_left = (sub_menu_width / 2 > (item_left - container_left)),
                                    overflow_right = ((sub_menu_width / 2 + item_left) > container_right);
                                $(element).children('.megamenu').css({
                                    'left': '-' + (sub_menu_width / 2 - item_width / 2) + 'px'
                                });
                                if (overflow_left) {
                                    var left = (item_left - container_left);
                                    $(element).children('.megamenu').css({
                                        'left': -left + 'px'
                                    });
                                }
                                if (overflow_right && !overflow_left) {
                                    var left = (item_left - container_left);
                                    left = left - (container_width - sub_menu_width);
                                    $(element).children('.megamenu').css({
                                        'left': -left + 'px'
                                    });
                                }
                            })
                        }, 100);
                    }
                }
            })
        }
    }

    function sumi_auto_width_vertical_menu() {
        var full_width = parseInt($('.container').innerWidth()) - 30;
        $('.sumi-menu-wapper.vertical.support-mega-menu').each(function() {
            var menu_width = parseInt($(this).actual('width')),
                w = (full_width - menu_width);
            if (w > 0) {
                $(this).find('.megamenu').each(function() {
                    var style = $(this).attr("style");
                    style = (style == undefined) ? '' : style;
                    style = style + ' max-width:' + w + 'px;';
                    $(this).attr('style', style);
                });
            }
        })
    }

    function sumi_get_scrollbar_width() {
        var $inner = jQuery('<div style="width:100%;height:200px;">test</div>'),
            $outer = jQuery('<div style="width:200px;height:150px;position:absolute;top:0;left:0;visibility:hidden;overflow:hidden;"></div>').append($inner),
            inner = $inner[0],
            outer = $outer[0];
        jQuery('body').append(outer);
        var width1 = inner.offsetWidth;
        $outer.css('overflow', 'scroll');
        var width2 = outer.clientWidth;
        $outer.remove();
        return (width1 - width2);
    }

    function sumi_menuclone_all_menus() {
        if (!$('.sumi-menu-clone-wrap').length && $('.sumi-clone-mobile-menu').length > 0) {
            $('body').prepend('<div class="sumi-menu-clone-wrap">' + '<div class="sumi-menu-panels-actions-wrap"><span class="sumi-menu-current-panel-title">MAIN MENU</span><a class="sumi-menu-close-btn sumi-menu-close-panels" href="#">x</a></div>' + '<div class="sumi-menu-panels"></div>' + '</div>');
        }
        var i = 0,
            panels_html_args = Array();
        if (!$('.sumi-menu-clone-wrap .sumi-menu-panels #sumi-menu-panel-main').length) {
            $('.sumi-menu-clone-wrap .sumi-menu-panels').append('<div id="sumi-menu-panel-main" class="sumi-menu-panel sumi-menu-panel-main"><ul class="depth-01"></ul></div>');
        }
        $('.sumi-clone-mobile-menu').each(function() {
            var $this = $(this),
                thisMenu = $this,
                this_menu_id = thisMenu.attr('id'),
                this_menu_clone_id = 'sumi-menu-clone-' + this_menu_id;
            if (!$('#' + this_menu_clone_id).length) {
                var thisClone = $this.clone(true);
                thisClone.find('.menu-item').addClass('clone-menu-item');
                thisClone.find('[id]').each(function() {
                    thisClone.find('.vc_tta-panel-heading a[href="#' + $(this).attr('id') + '"]').attr('href', '#' + sumi_menuadd_string_prefix($(this).attr('id'), 'sumi-menu-clone-'));
                    thisClone.find('.sumi-menu-tabs .tabs-link a[href="#' + $(this).attr('id') + '"]').attr('href', '#' + sumi_menuadd_string_prefix($(this).attr('id'), 'sumi-menu-clone-'));
                    $(this).attr('id', sumi_menuadd_string_prefix($(this).attr('id'), 'sumi-menu-clone-'));
                });
                thisClone.find('.sumi-menu-menu').addClass('sumi-menu-menu-clone');
                var thisMainPanel = $('.sumi-menu-clone-wrap .sumi-menu-panels #sumi-menu-panel-main ul');
                thisMainPanel.append(thisClone.html());
                sumi_menu_insert_children_panels_html_by_elem(thisMainPanel, i);
            }
        });
    }

    function sumi_menu_insert_children_panels_html_by_elem($elem, i) {
        if ($elem.find('.menu-item-has-children').length) {
            $elem.find('.menu-item-has-children').each(function() {
                var thisChildItem = $(this);
                sumi_menu_insert_children_panels_html_by_elem(thisChildItem, i);
                var next_nav_target = 'sumi-menu-panel-' + i;
                while ($('#' + next_nav_target).length) {
                    i++;
                    next_nav_target = 'sumi-menu-panel-' + i;
                }
                thisChildItem.prepend('<a class="sumi-menu-next-panel" href="#' + next_nav_target + '" data-target="#' + next_nav_target + '"></a>');
                var sub_menu_html = $('<div>').append(thisChildItem.find('> .submenu').clone()).html();
                thisChildItem.find('> .submenu').remove();
                $('.sumi-menu-clone-wrap .sumi-menu-panels').append('<div id="' + next_nav_target + '" class="sumi-menu-panel sumi-menu-sub-panel sumi-menu-hidden">' + sub_menu_html + '</div>');
            });
        }
    }

    function sumi_menuadd_string_prefix(str, prefix) {
        return prefix + str;
    }

    function sumi_menuget_url_var(key, url) {
        var result = new RegExp(key + "=([^&]*)", "i").exec(url);
        return result && result[1] || "";
    }
    $(document).ready(function() {
        sumi_resizeMegamenu();
        $(document).on('click', '.menu-toggle', function() {
            $('.sumi-menu-clone-wrap').addClass('open');
            $('body').addClass('menu-mobile-open');
            return false;
        });
        $(document).on('click', '.sumi-menu-clone-wrap .sumi-menu-close-panels', function() {
            $('.sumi-menu-clone-wrap').removeClass('open');
            $('body').removeClass('menu-mobile-open');
            return false;
        });
        $(document).on('click', function(event) {
            if (event.offsetX > $('.sumi-menu-clone-wrap').width()) $('.sumi-menu-clone-wrap').removeClass('open');
        });
        $(document).on('click', '.sumi-menu-next-panel', function(e) {
            var $this = $(this),
                thisItem = $this.closest('.menu-item'),
                thisPanel = $this.closest('.sumi-menu-panel'),
                target_id = $this.attr('href');
            if ($(target_id).length) {
                thisPanel.addClass('sumi-menu-sub-opened');
                $(target_id).addClass('sumi-menu-panel-opened').removeClass('sumi-menu-hidden').attr('data-parent-panel', thisPanel.attr('id'));
                var item_title = thisItem.find('.sumi-menu-item-title').attr('title'),
                    firstItemTitle = '';
                if ($('.sumi-menu-panels-actions-wrap .sumi-menu-current-panel-title').length > 0) {
                    firstItemTitle = $('.sumi-menu-panels-actions-wrap .sumi-menu-current-panel-title').html();
                }
                if (typeof item_title != 'undefined' && typeof item_title != false) {
                    if (!$('.sumi-menu-panels-actions-wrap .sumi-menu-current-panel-title').length) {
                        $('.sumi-menu-panels-actions-wrap').prepend('<span class="sumi-menu-current-panel-title"></span>');
                    }
                    $('.sumi-menu-panels-actions-wrap .sumi-menu-current-panel-title').html(item_title);
                } else {
                    $('.sumi-menu-panels-actions-wrap .sumi-menu-current-panel-title').remove();
                }
                $('.sumi-menu-panels-actions-wrap .sumi-menu-prev-panel').remove();
                $('.sumi-menu-panels-actions-wrap').prepend('<a data-prenttitle="' + firstItemTitle + '" class="sumi-menu-prev-panel" href="#' + thisPanel.attr('id') + '" data-cur-panel="' + target_id + '" data-target="#' + thisPanel.attr('id') + '"></a>');
            }
            e.preventDefault();
        });
        $(document).on('click', '.sumi-menu-prev-panel', function(e) {
            var $this = $(this),
                cur_panel_id = $this.attr('data-cur-panel'),
                target_id = $this.attr('href');
            $(cur_panel_id).removeClass('sumi-menu-panel-opened').addClass('sumi-menu-hidden');
            $(target_id).addClass('sumi-menu-panel-opened').removeClass('sumi-menu-sub-opened');
            var new_parent_panel_id = $(target_id).attr('data-parent-panel');
            if (typeof new_parent_panel_id == 'undefined' || typeof new_parent_panel_id == false) {
                $('.sumi-menu-panels-actions-wrap .sumi-menu-prev-panel').remove();
                $('.sumi-menu-panels-actions-wrap .sumi-menu-current-panel-title').html('MAIN MENU');
            } else {
                $('.sumi-menu-panels-actions-wrap .sumi-menu-prev-panel').attr('href', '#' + new_parent_panel_id).attr('data-cur-panel', target_id).attr('data-target', '#' + new_parent_panel_id);
                var item_title = $('#' + new_parent_panel_id).find('.sumi-menu-next-panel[data-target="' + target_id + '"]').closest('.menu-item').find('.sumi-menu-item-title').attr('data-title');
                item_title = $(this).data('prenttitle');
                if (typeof item_title != 'undefined' && typeof item_title != false) {
                    if (!$('.sumi-menu-panels-actions-wrap .sumi-menu-current-panel-title').length) {
                        $('.sumi-menu-panels-actions-wrap').prepend('<span class="sumi-menu-current-panel-title"></span>');
                    }
                    $('.sumi-menu-panels-actions-wrap .sumi-menu-current-panel-title').html(item_title);
                } else {
                    $('.sumi-menu-panels-actions-wrap .sumi-menu-current-panel-title').remove();
                }
            }
            e.preventDefault();
        });
    });
    $(document).on("resize", function() {
        sumi_resizeMegamenu();
        sumi_auto_width_vertical_menu();
    });
    $(document).ready(function() {
        sumi_auto_width_vertical_menu();
    });
    $(window).load(function() {
        sumi_menuclone_all_menus();
    });
})(jQuery);