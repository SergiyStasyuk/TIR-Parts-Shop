// formValidationAfterSubmit
wHTML.formValidationAfterSubmit = function ($form, response) {
    console.log($form, response);
};

function generate(message, type, time) {
    noty({
        text: message,
        type: type,
        timeout: time || false,
        animation: {
            open: 'animated flipInX',
            close: 'animated flipOutX'
        }
    });
}

jQuery(document).ready(function ($) {

    $('.js-apply-price').on('click', function (e) {
        e.preventDefault();

        var mincost = $('input[name="mincost"]').val();
        var maxcost = $('input[name="maxcost"]').val();

        var priceURL = '/mincost-' + mincost + '/maxcost-' + maxcost;

        window.location.href = window.location.href.replace(/mincost-[0-9]+\//g, '').replace(/maxcost-[0-9]+\//g, '') + priceURL;
    });

    /**
     * Add to favorites button
     */
    $('.favorite-button').on('click', function (event) {
        event.preventDefault();

        var product = $(this).data('product');
        var element = $(this).closest('.favorite-item-block');

        $.ajax({
            url: '/ajax/addToFavorite',
            type: 'POST',
            dataType: 'JSON',
            data: {
                product: product
            },
            success: function (data) {
                if (data.success === true) {

                    if (data.favorite) {
                        $(event.currentTarget).addClass('in-favorite-now');
                    } else {
                        element.remove();
                        $(event.currentTarget).removeClass('in-favorite-now');
                    }

                }
            }
        });
    });

    // Nova Poshta
    $('.delivery-div').on('click', function () {
        var ID = $(this).data('id');


        if (ID === 1) {
            $('#nova-poshta').slideDown();
        } else {
            $('#nova-poshta').slideUp();
        }

        if (ID === 9) {
            $('#address').slideDown();
        } else {
            $('#address').slideUp();
        }
    });

    $('#novaposhta-city').on('change', function () {
        var city = $(this).val();
        var language = $('#current-language').val();
        var select = $('#warehouses');
        var area = $('#novaposhta-warehouses');

        $.ajax({
            url: '/ajax/getNovaPoshtaWarehouses',
            type: 'POST',
            dataType: 'JSON',
            data: {
                city: city,
                language: language
            },
            success: function (data) {
                if (data.success === true) {
                    select.slideDown();
                    area.find('option').remove().end().append(data.html);
                }
            }
        });
    });

    $('#catalogSort select').on('change', function () {
        var uri = $('#catalogSort').data('uri');
        var arr = uri.split('?');
        uri = arr[0];
        var old = $('#catalogSort').data('get');
        var get = [];
        if (old) {
            get.push(old);
        }
        $('#catalogSort select').each(function () {
            if ($(this).attr('name') === 'per_page') {
                get.push('per_page=' + $(this).val());
            }
            if ($(this).attr('name') === 'sort' && $(this).val()) {
                get.push('sort=' + $(this).val());
                get.push('type=' + $(this).find('option:selected').data('type'));
            }
        });
        if (get.length) {
            get = get.join('&');
            uri += '?' + get;
        }
        window.location.href = uri;
    });

    var searchInput = $(".search-form form .form-element__input");

    function searchQuery() {
        if (searchInput.val().length > 2) {
            sessionStorage.setItem("searchQuery", searchInput.val());
        }
    }

    $(".search-form form")
        .on("click", ".search-form__icon", searchQuery)
        .submit(searchQuery);

    var link = window.location.href.split("?");
    if (link[0].search(/search/) > -1) {
        searchInput.val(sessionStorage.getItem("searchQuery"));
    } else {
        searchInput.val("");
    }

    $('body').on('click', '.mobile-menu__link', function () {
        if ($(this).attr('data-mfp')) {
            $('.account-link').trigger('click');
        }
    });

    $searchField = $('.page-header__search');
    $showSearch = $('.js-search-show');

    function showSearch() {
        $searchField.addClass('page-header__search--active');
        $searchField.find('.form-element__input').focus();
        $('body').on('click', closeSearch);
    }

    $showSearch.on('click', showSearch);

    function closeSearch(e) {
        if (!$(e.target).closest('.search').length) {
            $searchField.removeClass('page-header__search--active');
        }
    }
});
