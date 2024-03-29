<!-- JS Global Compulsory -->
<script src="{{ asset('shops/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('shops/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('shops/assets/vendor/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('shops/assets/vendor/bootstrap/bootstrap.min.js') }}"></script>

<!-- JS Implementing Plugins -->
<script src="{{ asset('shops/assets/vendor/appear.js') }}"></script>
<script src="{{ asset('shops/assets/vendor/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('shops/assets/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
<script src="{{ asset('shops/assets/vendor/svg-injector/dist/svg-injector.min.js') }}"></script>
<script src="{{ asset('shops/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}">
</script>
<script src="{{ asset('shops/assets/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('shops/assets/vendor/fancybox/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('shops/assets/vendor/typed.js/lib/typed.min.js') }}"></script>
<script src="{{ asset('shops/assets/vendor/slick-carousel/slick/slick.js') }}"></script>
<script src="{{ asset('shops/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

<!-- JS Electro -->
<script src="{{ asset('shops/assets/js/hs.core.js') }}"></script>
<script src="{{ asset('shops/assets/js/components/hs.countdown.js') }}"></script>
<script src="{{ asset('shops/assets/js/components/hs.header.js') }}"></script>
<script src="{{ asset('shops/assets/js/components/hs.hamburgers.js') }}"></script>
<script src="{{ asset('shops/assets/js/components/hs.unfold.js') }}"></script>
<script src="{{ asset('shops/assets/js/components/hs.focus-state.js') }}"></script>
<script src="{{ asset('shops/assets/js/components/hs.malihu-scrollbar.js') }}"></script>
<script src="{{ asset('shops/assets/js/components/hs.validation.js') }}"></script>
<script src="{{ asset('shops/assets/js/components/hs.fancybox.js') }}"></script>
<script src="{{ asset('shops/assets/js/components/hs.onscroll-animation.js') }}"></script>
<script src="{{ asset('shops/assets/js/components/hs.slick-carousel.js') }}"></script>
<script src="{{ asset('shops/assets/js/components/hs.show-animation.js') }}"></script>
<script src="{{ asset('shops/assets/js/components/hs.svg-injector.js') }}"></script>
<script src="{{ asset('shops/assets/js/components/hs.go-to.js') }}"></script>
<script src="{{ asset('shops/assets/js/components/hs.selectpicker.js') }}"></script>

<!-- JS Plugins Init. -->
<script>
    $(window).on('load', function() {
        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
            event: 'hover',
            direction: 'horizontal',
            pageContainer: $('.container'),
            breakpoint: 767.98,
            hideTimeOut: 0
        });
    });

    $(document).on('ready', function() {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#header'));

        // initialization of animation
        $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');

        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
            afterOpen: function() {
                $(this).find('input[type="search"]').focus();
            }
        });

        // initialization of popups
        $.HSCore.components.HSFancyBox.init('.js-fancybox');

        // initialization of countdowns
        var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
            yearsElSelector: '.js-cd-years',
            monthsElSelector: '.js-cd-months',
            daysElSelector: '.js-cd-days',
            hoursElSelector: '.js-cd-hours',
            minutesElSelector: '.js-cd-minutes',
            secondsElSelector: '.js-cd-seconds'
        });

        // initialization of malihu scrollbar
        $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

        // initialization of forms
        $.HSCore.components.HSFocusState.init();

        // initialization of form validation
        $.HSCore.components.HSValidation.init('.js-validate', {
            rules: {
                confirmPassword: {
                    equalTo: '#signupPassword'
                }
            }
        });

        // initialization of show animations
        $.HSCore.components.HSShowAnimation.init('.js-animation-link');

        // initialization of fancybox
        $.HSCore.components.HSFancyBox.init('.js-fancybox');

        // initialization of slick carousel
        $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');

        // initialization of hamburgers
        $.HSCore.components.HSHamburgers.init('#hamburgerTrigger');

        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
            beforeClose: function() {
                $('#hamburgerTrigger').removeClass('is-active');
            },
            afterClose: function() {
                $('#headerSidebarList .collapse.show').collapse('hide');
            }
        });

        $('#headerSidebarList [data-toggle="collapse"]').on('click', function(e) {
            e.preventDefault();

            var target = $(this).data('target');

            if ($(this).attr('aria-expanded') === "true") {
                $(target).collapse('hide');
            } else {
                $(target).collapse('show');
            }
        });

        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

        // initialization of select picker
        $.HSCore.components.HSSelectPicker.init('.js-select');
    });

    function showDescription() {
        $('#Description').show('slow')
        $('#Reviews').hide('slow')

    }

    function showReviews() {
        $('#Reviews').show('slow')
        $('#Description').hide('slow')

    }
</script>
