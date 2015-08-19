<header id="header">

    <div class="header mobile">
        <a href="/"><img src="/img/tex_full_logo.svg"></a>
    </div>

    <div class="header compressed">
        <div class="logo"><img src="/img/play_solid_logo.svg"></div>
        <div class="menu_icon"><i class="fa fa-bars"></i></div>
    </div>

    <div class="header uncompressed">
        <div class="menu_close"><i class="fa fa-times"></i></div>

        <div class="logo">
            <a href="/">
                <img class="words" src="/img/logo.svg">
                <div class="icons">
                    <img class="icon icon-play_hollow" src="/img/play_logo.svg">
                    <img class="icon icon-speak" src="/img/speak_logo.svg">
                    <img class="icon icon-comment" src="/img/comment_logo.svg">
                    <img class="icon icon-play_solid" src="/img/play_solid_logo.svg">
                </div>
            </a>
        </div>

        <menu type="context toolbar">
            <li><a href="/about" title="TEX's home.">About</a></li>
            <li><a href="/" title="TEX's home.">Home</a></li>

<?php

    include_once $_SERVER['DOCUMENT_ROOT'].'/php/Page.php';
    function returnLink($location) {
        $Page = new Page;
        if($Page->doesLocationHaveVideos($location)) {
            return '<li><a href="/'.strtolower($location).'" title="'.ucfirst($location).'">'.ucfirst($location).'</a></li>';
        } else {
            return '<li><span class="disabledLink">'.ucfirst($location).'</span></li>';
        }
    }
 
    print returnLink('brisbane');
    print returnLink('bellevue');
    print returnLink('montreal');
    print returnLink('london');
    print returnLink('sydney');
 ?>
        </menu>

    </div>


</header><!-- /header -->
