<!doctype html>
<html class="no-js" lang="en">
    <head>
        <?php include_once('includes/head.php'); ?>
        <title>TEX Talks - Latest talks</title>
        <script src="js/tips.js"></script>
    </head>
    <body>

<?php 
    $vote = '<div class="voteing">
                <a href="#" class="upvote"><i class="fa fa-sort-asc"></i></a>
                <span class="count">10</span>
                <a href="#" class="downvote"><i class="fa fa-sort-desc"></i></a>
             </div>';
  ?>
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
                            <section class="section">
                                <h5 class="title"><a href="#talk1">Warwick Cox <small>How to present with confidence</small></a></h5>
                            </section>
                            <section class="section">
                                <h5 class="title"><a href="#talk2">Lisa Cutmore: <small>Women in leadership</small></a></h5>
                            </section>
                        </div>
                        
                    </div>
                </div>
                
                <div class="large-9 columns">
                    
                   
                    <div class="row post" id="talk1" data-up_votes="" data-id="talk1">
                        <div class="large-1 columns small-3">
                            <?php echo $vote; ?>
                        </div>
                        <div class="large-11 columns">
                            <h4>Warwick Cox: How to present with confidence</h4>
                            <iframe width="640" height="360" src="https://www.youtube.com/embed/ev1QqABlYIs?showinfo=0" frameborder="0" allowfullscreen></iframe>

                            <table>
                              <thead>
                                <tr>
                                  <th width="120">Date</th>
                                  <th width="150">Presenter</th>
                                  <th width="220">Topic</th>
                                  <th width="150">Slides</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>25 March 2015</td>
                                  <td>Warwick Cox</td>
                                  <td>How to present with confidence</td>
                                  <td><a target="_blank" href="http://prezi.com/z6tmxfnby1tf/?utm_campaign=share&utm_medium=copy" title="">Presentation link</a></td>
                                </tr>
                              </tbody>
                            </table>

                        </div>
                    </div>
                    
                    <hr/>
                    
                    <div class="row post" id="talk2" data-up_votes="" data-id="talk2">
                        <div class="large-1 columns small-3">
                            <?php echo $vote; ?>
                        </div>
                        <div class="large-11 columns">
                            <h4>Lisa Cutmore: Women in leadership</h4>
                            <iframe width="640" height="360" src="https://www.youtube.com/embed/qxiMQy02CGw?controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>

                            <table>
                              <thead>
                                <tr>
                                  <th width="120">Date</th>
                                  <th width="150">Presenter</th>
                                  <th width="220">Topic</th>
                                  <th width="150">Slides</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>25 March 2015</td>
                                  <td>Lisa Cutmore</td>
                                  <td>Women in leadership</td>
                                  <td><a href="https://docs.google.com/presentation/d/18XwM6-q_lZmCwkKbUVoksGBJ0tm3_ZO7QsM2JVNP6lI/edit#slide=id.p" title="">Presentation Link</a></td>
                                </tr>
                              </tbody>
                            </table>


                        </div>
                    </div>
                    
                    <hr/>
                    
                </div>

            </div>
            
            <?php include_once('includes/footer.php'); ?>

            <script src="js/foundation.min.js"></script>

            <script>
                $(document).foundation();
                TIPS.init();
            </script>
        </body>
    </html>