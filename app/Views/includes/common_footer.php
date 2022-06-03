<!-- Main Footer -->
<footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 <a href="https://redxsofts.com">RedXSofts</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url();?>/public/plugins/jquery/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/public/dist/js/adminlte.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
<script src="<?= base_url(); ?>/public/dist/js/jquery.progressbar.js" type="text/javascript"></script>
<script type="text/javascript">
    (function() {
        $(document).ready(function() {
            var runProgressBar;
            runProgressBar = function() {
                var i, interval,
                    _this = this;
                i = 0;
                clearInterval(interval);
                return interval = setInterval(function() {
                    if (i > 10) {
                        i = 0;
                        clearInterval(interval);
                    }
                    $("body").progressbar(i * 10);
                    return i++;
                }, 200);
            };
            return window.runProgressBar = runProgressBar;
        });

    }).call(this);
    $(document).ready(function()
    {
        javascript:window.runProgressBar();
    });

</script>
<script type="text/javascript">
    //paste this code under the head tag or in a separate js file.
    // Wait for window load
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });
    $(function () {
        var url = window.location;
        // for single sidebar menu
        $('ul.nav-sidebar a').filter(function () {
            return this.href == url;
        }).addClass('active');

        // for sidebar menu and treeview
        $('ul.nav-treeview a').filter(function () {
            return this.href == url;
        }).parentsUntil(".nav-sidebar > .nav-treeview")
            .css({'display': 'block'})
            .addClass('menu-open').prev('a')
            .addClass('active');
    });



</script>
<script>
    // makes sure the whole site is loaded
    jQuery(window).load(function() {
// will first fade out the loading animation
        jQuery("#status").fadeOut();
// will fade out the whole DIV that covers the website.
        jQuery("#preloader").delay(1000).fadeOut("slow");
    })
</script>
