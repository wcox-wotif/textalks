<!doctype html>
<html class="no-js" lang="en">
    <head>
        <?php include_once('includes/head.php'); ?>
        <title>TEX Talks - Latest talks</title>
        <script src="js/vote.js"></script>
        <script src="js/feedback.js"></script>
    </head>
    <body>

        <?php include_once('includes/header.php'); ?>
            
            
            <div class="row">
                <div class="large-12 columns">
                    <h1 class="logo_primary_font logo_color">Talks</h1>
                </div>
            </div>
            
            <div class="row">
                
                <div class="large-3 columns ">
                    <div class="panel">
                        <div class="section-container vertical-nav" data-section data-options="deep_linking: false; one_up: true">

                            <?php include_once('templates/talksPageSideMenu.php'); ?>

                        </div>
                        
                    </div>
                </div>
                
                <div class="large-9 columns">
                    
                    <?php include_once('templates/talksPageTalksPost.php'); ?>
                   
                </div>

            </div>
            
            <?php include_once('includes/footer.php'); ?>

            <script src="js/foundation.min.js"></script>

            <script>
                $(document).foundation();
                VOTE.init();
                FEEDBACK.init();
            </script>
        </body>
    </html>