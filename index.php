<?php include_once('php/core.php'); ?>
<?php 
    $core = new Core;
    $lastResultArray = $core->returnLastResult();
    $lastItemYoutubeId = $lastResultArray['youtube_id'];

 ?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <?php include_once('includes/head.php'); ?>
    <title>TEX Talks - Expedia learning</title>
  </head>
  <body>
    <body>
        <?php include_once('includes/header.php'); ?>
        <div class="row">
            <div class="large-12 columns">
                <div class="row">
                    
                    <div class="large-6 columns">
                        <a href="/talks.php">

                            <iframe id="ytplayer" width="470" height="275" src="https://www.youtube.com/embed/<?php print $lastItemYoutubeId; ?>?controls=0&fs=0&rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe><br>
                        </a>
                        
                    </div>
                    <div class="large-6 columns">
                        
                        <h3 class="show-for-small"><strong class="logo_color">T</strong>alk <strong class="logo_color">EX</strong>pedia <strong class="logo_color">Talks</strong><hr/></h3>
                        
                        <div class="panel">
                            <h4 class="hide-for-small"><strong class="logo_color">T</strong>alk <strong class="logo_color">EX</strong>pedia <strong class="logo_color">Talks</strong><hr/></h4>
                            <h5 class="subheader">
                                <ul>
                                    <li>Once a week</li>
                                    <li>2 power talks</li>
                                    <li>Talk about anything</li>
                                    <li>Talk for 18 mins max</li>
                                    <li>Presentation is recorded and added here</li>
                                    <li>Constructive feedback about presentation provided</li>
                                </ul>
                            </h5>
                        </div>
                    </div>
                        
                    <div class="large-12 columns">

                        <div class="row" data-equalizer>
                            <div class="large-6 small-6 columns">
                                <div class="panel buttonPadding" data-equalizer-watch>
                                    <h5><strong class="logo_color">Previous talks</strong></h5>
                                    <h6 class="subheader">Check out all the talks and vote on them</h6>
                                    <a href="/talks.php" class="small button bottomButton right">View All Talks</a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            
                            <div class="large-6 small-6 columns" >
                                <div class="panel buttonPadding" data-equalizer-watch>
                                    <h5><strong class="logo_color">Tips / Resources</strong></h5>
                                    <h6 class="subheader">Check out the list of resouces to become a better speaker</h6>
                                    <a href="/tips.php" class="small button bottomButton right">Resources</a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row small_videos">

                    <?php include_once('templates/homePagePreviousTalkTiles.php'); ?>

                </div>

                <?php include_once('includes/footer.php'); ?>
            </div>
        </div>
        <script src="js/vendor/jquery.js"></script>
        <script src="js/foundation.min.js"></script>
        <script>
          $(document).foundation();
        </script>
    </body>
</html>