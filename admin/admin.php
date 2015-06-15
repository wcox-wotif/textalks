<?php session_start(); ?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <?php include_once('includes/head.php'); ?>
        <title>TEX Talks - Latest talks</title>
        <script src="js/admin.js"></script>
    </head>
    <body>

        <?php include_once('includes/header.php'); ?>
            
            
            <div class="row">
                <div class="large-12 columns">
                    <h1 class="logo_primary_font logo_color">Add talk</h1>
                </div>
            </div>
            
            <form class="addTalkForm">

              <div class="row">
                <div class="large-12 columns">
                  <div class="row collapse prefix-radius">
                    <div class="small-5 columns">
                      <span class="prefix">Youtube id </span>
                    </div>
                    <div class="small-7 columns">
                      <input type="text" name="youtube_id" placeholder="...utube.com/watch?v=[??????]">
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="large-12 columns">
                  <div class="row collapse prefix-radius">
                    <div class="small-5 columns">
                      <span class="prefix">Youtube id </span>
                    </div>
                    <div class="small-7 columns">
                      <input type="text" name="youtube_id" placeholder="...utube.com/watch?v=[??????]">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="large-12 columns">
                  <div class="row collapse prefix-radius">
                    <div class="small-5 columns">
                      <span class="prefix">Presenter</span>
                    </div>
                    <div class="small-7 columns">
                      <input type="text" name="presenter" placeholder="The awesome persons name...">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="large-12 columns">
                  <div class="row collapse prefix-radius">
                    <div class="small-5 columns">
                      <span class="prefix">Topic</span>
                    </div>
                    <div class="small-7 columns">
                      <input type="text" name="topic" placeholder="What was the presentation about??">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="large-12 columns">
                  <div class="row collapse prefix-radius">
                    <div class="small-5 columns">
                      <span class="prefix">Date (dd MMM yyyy)</span>
                    </div>
                    <div class="small-7 columns">
                      <input type="text" name="date" placeholder="25 Mar 2015">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="large-12 columns">
                  <div class="row collapse prefix-radius">
                    <div class="small-5 columns">
                      <span class="prefix">Presentation Link</span>
                    </div>
                    <div class="small-7 columns">
                      <input type="text" name="presentation_link" placeholder="Whats the url of the slides??">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="large-12 columns">
                  <a href="#" class="newTalkSubmit button expand success">Add new talk</a>
                </div>
              </div>

            </form>
            
            <?php include_once('includes/footer.php'); ?>

            <script src="js/foundation.min.js"></script>

            <script>
                $(document).foundation();
                ADMIN.init();
            </script>
        </body>
    </html>