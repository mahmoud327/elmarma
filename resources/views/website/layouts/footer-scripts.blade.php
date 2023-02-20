<!-- Vendor JS Files -->
<script src="{{ asset('website/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('website/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('website/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('website/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('website/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('website/js/snap-scroll.min.js') }}"></script>


<script src="{{ asset('website/js/main.js') }}"></script>
<script src="{{ asset('website/js/jquery.js') }}" type="text/javascript"></script>
<script src="{{ asset('website/js/slider.js') }}"></script>

<script>
    $(function() {
        $('#slider').rbtSlider({
            height: '100vh',
            'dots': true,
            'arrows': true,
            'auto': 3
        });
    });
</script>
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
            '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>

<script>
    $('.slItem .slText.active').slideUp(200);
    $(window).scroll(function() {

        var hT = $('.stats-section').offset().top,
            hH = $('.stats-section').outerHeight(),
            wH = $(window).height(),
            wS = $(this).scrollTop();

        if (wS > (hT + hH - wH) && (hT > wS) && (wS + wH > hT + hH)) {
            $('.counting').each(function() {
                var $this = $(this),
                    countTo = $this.attr('data-count');

                $({
                    countNum: $this.text()
                }).animate({
                        countNum: countTo
                    },
                    {
                        duration: 3000,
                        easing: 'linear',
                        step: function() {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.text(this.countNum);
                            //alert('finished');
                        }
                    });
            });
        }

    });

    $(function() {
        //  $("section").SnapScroll();
    });
</script>

<script>
    $(function() {

        $('a.whatsapp-popup-btn').click(function() {

            $('.whatsapp-section').toggleClass('d-none');
        });

        $('.whatsapp-section .close-btn').click(function() {

            $('.whatsapp-section').toggleClass('d-none');
        });

        setTimeout(function() {
            $('.whatsapp-section').toggleClass('d-none');
        }, 5000);
    });
</script>

<script>
    const items = document.querySelectorAll('.accordion button');

    function toggleAccordion() {
        const itemToggle = this.getAttribute('aria-expanded');

        for (i = 0; i < items.length; i++) {
            items[i].setAttribute('aria-expanded', 'false');
        }

        if (itemToggle == 'false') {
            this.setAttribute('aria-expanded', 'true');
        }
    }

    items.forEach((item) => item.addEventListener('click', toggleAccordion));
</script>
