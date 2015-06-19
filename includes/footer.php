<footer class="row">

</footer>

<script src="/js/vendor/jquery.js"></script>
<script src="/isotope/dist/isotope.pkgd.js"></script>
<script src="/isotope/js/packery.js"></script>
<script src="/js/foundation.min.js"></script>
<script src="/js/menu.js"></script>
<script src="/js/collage.js"></script>
<script src="/js/talks.js"></script>
<script>

$(function() {
    MENU.init();
    COLLAGE.init();
    TALKS.init();
    $(document).foundation();
});
$(window).load(function() {
    COLLAGE.startLayout();
});
</script>

