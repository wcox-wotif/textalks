<!doctype html>
<html class="no-js" lang="en">
  <head>
    <?php include_once('includes/head.php'); ?>
    <title>TEX Talks - Tips and Resources</title>
    <script src="js/tips.js"></script>
    <script src="js/feedback.js"></script>
  </head>
  <body>
    <?php include_once('includes/header.php'); ?>
    
    
    <div class="row">
      <div class="large-12 columns">
        <h1 class="logo_primary_font logo_color">Feedback about TEX</h1>
      </div>
    </div>

    <div class="row post masterRow" id="texFeedback" data-up_votes="" data-id="texFeedback">

      <?php include_once('templates/feedback.php'); ?>

    </div>
    
    <?php include_once('includes/footer.php'); ?>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
      TIPS.init();
      FEEDBACK.init();
    </script>
  </body>
</html>