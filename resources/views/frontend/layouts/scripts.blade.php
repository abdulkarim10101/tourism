<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- Select2 JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="/frontend/assets/js/minicart.js"></script>
<script src="/frontend/assets/js/jquery.magnific-popup.js"></script>
<script src="/frontend/assets/js/bootstrap.min.js"></script>
<!--/login-->
<script>
    $(document).ready(function() {
        $(".button-log a").click(function() {
            $(".overlay-login").fadeToggle(200);
            $(this).toggleClass('btn-open').toggleClass('btn-close');
        });
    });
    $('.overlay-close1').on('click', function() {
        $(".overlay-login").fadeToggle(200);
        $(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
        open = false;
    });
    // optional
    $('#customerhnyCarousel').carousel({
        interval: 5000
    });
    transmitv.render();
    transmitv.cart.on('transmitv_checkout', function(evt) {
        var items, len, i;
        if (this.subtotal() > 0) {
            items = this.items();
            for (i = 0, len = items.length; i < len; i++) {}
        }
    });
    $(document).ready(function() {
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });
    });
    $(function() {
        $('.navbar-toggler').click(function() {
            $('body').toggleClass('noscroll');
        })
    });

    function addToCart(product_id) {
        event.preventDefault()
        qty = $('#qty').val()
        if (typeof qty == 'undefined') {
            qty = 1;
        }
        $.ajax({
            type: "POST",
            url: "{{ route('cart.store1') }}",
            dataType: 'JSON',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'product_id': product_id,
                'qty': qty
            },
            success: function(response) {
                $('.alert-success').show()
                $('.alert-success').fadeOut(2000)
                $('.alert-success').text('Added To Cart')
                cartqty = $('.cartqty').text();
                checkNumeric = $.isNumeric(cartqty);
                if (!checkNumeric) {
                    cartqty = 0;
                }
                sum = parseInt(cartqty) + 1
                $('.cartqty').text('')
                $('.cartqty').text(sum.toString())
                $('.cartqty').show()
            },
            error: function() {
                $('.alert-danger').show('slow')
                $('.alert-danger').fadeOut(4000)
                $('.alert-danger').text('Please Login To Continue.')
            }
        });
    }

    function addLead() {
        event.preventDefault()
        data = $('#leadform').serialize()
        $.ajax({
            type: "POST",
            url: "{{ route('leads.store') }}",
            dataType: 'JSON',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: data,
            success: function(response) {
                $('.submitted').show()
                $('#leadform')[0].reset()
            },
            error: function() {}
        });
    }
    $(document).ready(function() {
        $('#stars li').on('mouseover', function() {
            var onStar = parseInt($(this).data('value'), 10);
            $(this).parent().children('li.star').each(function(e) {
                if (e < onStar) {
                    $(this).addClass('hover');
                } else {
                    $(this).removeClass('hover');
                }
            });
        }).on('mouseout', function() {
            $(this).parent().children('li.star').each(function(e) {
                $(this).removeClass('hover');
            });
        });
        $('#stars li').on('click', function() {
            var onStar = parseInt($(this).data('value'), 10);
            var stars = $(this).parent().children('li.star');
            for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass('selected');
            }
            for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass('selected');
            }
            var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
            var msg = "";
            if (ratingValue > 1) {
                msg = "Thanks! You rated this " + ratingValue + " stars.";
            } else {
                msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
            }
            responseMessage(msg);
            console.log(ratingValue)
            $('#ratingvalue').val(ratingValue)
        });
    });

    function responseMessage(msg) {
        $('.success-box').fadeIn(200);
        $('.success-box div.text-message').html("<span>" + msg + "</span>");
    }

    function addReview() {
        event.preventDefault()
        review = $('#reviewtext').val()
        rating = $('#ratingvalue').val()
        product_id = $('#product_id').val()
        user_name = '{{ optional(auth()->user())->name }}'
        alert(user_name)
        if (rating == '') {
            alert('Please add rating.')
        } else if (review == '') {
            alert('Please add review.')
        } else {
            $.ajax({
                type: "POST",
                url: "{{ route('reviews.store') }}",
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'review': review,
                    'rating': rating,
                    'product_id': product_id
                },
                success: function(response) {
                    $('.alert-success').show()
                    $('.alert-success').fadeOut(2000)
                    $('.alert-success').text('Review Added')
                    $('.reviews-custom').append(`
    <div class="border-bottom border-color-1 pb-4 mb-4">
    <div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
    <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
    ` + appendRating(rating) + `
    </div>
    </div>
    <p class="text-gray-90">` + review + `</p>
    <div class="mb-2">
    <strong>` + user_name + `</strong>
    <span class="font-size-13 text-gray-23">Just Now</span>
    </div>
    </div>
    `);
                },
                error: function() {
                    $('.alert-danger').show('slow')
                    $('.alert-danger').fadeOut(4000)
                    $('.alert-danger').text('Please Login To Continue.')
                }
            });
        }
    }

    function appendRating(count) {
        var html = '';
        for (i = 1; i <= count; i++) {
            html += `<small class="fas fa-star"></small>`
        }
        console.log(html)
        return html
    }

    $(document).ready(function() {
        $('.read-more-btn').on('click', function() {
            var $shortDesc = $(this).siblings('.short-description');
            var $fullDesc = $(this).siblings('.full-description');
            if ($shortDesc.css('display') === 'none') {
                $shortDesc.slideDown();
                $fullDesc.slideUp();
                $(this).text('Read more');
            } else {
                $shortDesc.slideUp();
                $fullDesc.slideDown();
                $(this).text('Read less');
            }
        });
    });

    function newsletter() {
        $('#newsletter_email').show('slow')
        $('.signin-form').hide('slow')
    }
    $(document).ready(function() {
        $('#search-input').select2({
            tags: true,
            placeholder: 'Search',
            ajax: {
                url: '{{ route('search.autocomplete') }}',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: data.results
                    };
                },
                cache: true
            }
        });
        $('.select2-container').css('width', '75%');
        $('.select2-container .select2-selection--single').css({
            'height': 'auto',
            'padding': '.375rem .75rem',
            'font-size': '1rem',
            'line-height': '1.5',
            'border-radius': '.25rem',
            'border-color': '#ced4da'
        });
    });


    function increasebyone(url, divId, op, key1) {
        newvalue = 0
        if (op == '+') {
            newvalue = parseInt($('#' + divId).val()) + 1
            $('#' + divId).val(newvalue)
            priceDiv = 'price' + key1;
            sum = $('#' + priceDiv).val() * parseInt($('#' + divId).val());
            $('#total_price' + key1).text(sum)
            sum2 = parseInt($('#total1').text()) + parseInt($('#' + priceDiv).val());
            sum3 = parseInt($('.subtotal1').text()) + parseInt($('#' + priceDiv).val());
            $('#total1').text(sum2.toString())
            $('.subtotal1').text(sum3.toString())
        } else {
            if ($('#' + divId).val() <= 1) {} else {
                newvalue = parseInt($('#' + divId).val()) - 1
                $('#' + divId).val(newvalue)
                priceDiv = 'price' + key1;
                sum = $('#' + priceDiv).val() * parseInt($('#' + divId).val());
                $('#total_price' + key1).text(sum)
                sum2 = parseInt($('#total1').text()) - parseInt($('#' + priceDiv).val());
                sum3 = parseInt($('.subtotal1').text()) - parseInt($('#' + priceDiv).val());
                $('#total1').text(sum2.toString())
                $('.subtotal1').text(sum3.toString())
            }
        }
        if (newvalue != 0) {

            $.ajax({
                url: url,
                dataType: 'json',
                success: function(resp) {
                    console.log(resp)
                }
            });
        }

    }

    function addCoupon() {
        // alert('h')
        data = $('#couponForm').serialize()
        console.log(data)

        $.ajax({
            url: "{{ route('shop.addCoupon') }}",
            data: {
                coupon_code: $('#coupon_code').val()
            },
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            success: function(response) {
                $('.couponDiv').show()
                if (response.message == 'Coupon Applied') {
                    $('.couponForm').hide()
                    $('#coupontext').text('Congratulations Promo Code Applied ' + response.percentage +
                        '% discount applicable')
                    $('.discount_percentage').text(response.percentage + '%')
                    afterdiscount = parseInt($('#total1').text()) - ((5 / 100) * parseInt($('#total1')
                        .text()))
                    $('#total1').text(afterdiscount.toString())
                } else {
                    $('#coupontext').text(response.message)
                }
                console.log(response.message)
            }
        })
    }

    $('.js-search-menus').on('select2:select', function() {
        $('#searchform').submit();
    });
</script>
