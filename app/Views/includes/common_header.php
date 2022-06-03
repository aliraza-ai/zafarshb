<?php
if(!session()->get('logged_in'))
{
    echo '<script>window.location.replace("'.base_url().'")</script>';
}

?>
<meta charset="utf-8">
<title>Booking Software</title>
<link rel="icon" href="<?php echo base_url();?>/public/fav.png" type="image/gif" sizes="32x32">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="<?php echo base_url();?>/public/plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url();?>/public/dist/css/adminlte.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>/public/dist/css/style.css">
<link rel="stylesheet" href="https://www.jqueryscript.net/demo/Youtube-Inspired-Top-Loading-Bar-Plugin-with-jQuery-progressbar/stylesheets/jquery.progressbar.css"/>


<style>
    #preloader {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #fefefe;
        z-index: 99;
        height: 100%;
    }

    #status {
        width: 200px;
        height: 200px;
        position: absolute;
        left: 50%;
        top: 50%;
        background-image: url(<?= base_url(); ?>/public/dist/img/ajax-loader.gif);
        background-repeat: no-repeat;
        background-position: center;
        margin: -100px 0 0 -100px;

    }



</style>
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>