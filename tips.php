<!doctype html>
<html class="no-js" lang="en">
    <head>
        <?php include_once('includes/head.php'); ?>
        <title>TEX Talks - Tips and Resources</title>
        <script src="js/vote.js"></script>
    </head>
    <body>

<?php 
    // $vote = '<div class="voteing">
    //             <a href="#" class="upvote"><i class="fa fa-sort-asc"></i></a>
    //             <span class="count">10</span>
    //             <a href="#" class="downvote"><i class="fa fa-sort-desc"></i></a>
    //          </div>';
  ?>
        <?php include_once('includes/header.php'); ?>
            
            
            <div class="row">
                <div class="large-12 columns">
                    <h1 class="logo_primary_font logo_color">Tips / Resources</h1>
                </div>
            </div>
            
            <div class="row">
                
                <div class="large-3 columns ">
                    <div class="panel">
                        <div class="section-container vertical-nav" data-section data-options="deep_linking: false; one_up: true">
                            <section class="section">
                                <h5 class="title"><a href="#post1">Presentation tools</a></h5>
                            </section>
                            <section class="section">
                                <h5 class="title"><a href="#post2">Public speaking tips</a></h5>
                            </section>
                            <section class="section">
                                <h5 class="title"><a href="#post3">How to use slides</a></h5>
                            </section>
                        </div>
                        
                    </div>
                </div>
                
                <div class="large-9 columns">
                    
                   
                    <div class="row post" id="post1" data-up_votes="" data-id="post1">
                        <div class="large-1 columns small-3">
                            <?php include('templates/vote.php'); ?>
                        </div>
                        <div class="large-11 columns">
                            <h5>Tools</h5>

                            <table>
                              <thead>
                                <tr>
                                  <th width="200">Resource</th>
                                  <th width="200">link</th>
                                  <th width="150">Comments</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Prezi</td>
                                  <td><a href="http://prezi.com/" title="Prezi">http://prezi.com</a></td>
                                  <td>Presentation tool. Online. Free to use.</td>
                                </tr>
                                <tr>
                                  <td>Keynote</td>
                                  <td>On your computer</td>
                                  <td>Presentation tool. It also has a timer, etc.</td>
                                </tr>
                              </tbody>
                            </table>

                        </div>
                    </div>
                    
                    <hr/>
                    
                    <div class="row post" id="post2" data-up_votes="" data-id="post2">
                        <div class="large-1 columns small-3">
                            <?php include('templates/vote.php'); ?>
                        </div>
                        <div class="large-11 columns">
                            <h5>Public speaking tips</h5>

                            <table>
                              <thead>
                                <tr>
                                  <th width="200">Resource</th>
                                  <th width="200">link</th>
                                  <th width="150">Comments</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Public Speaking Tips</td>
                                  <td><a href="http://www.slideshare.net/CommunicationSkillsTips/35-publicspeakingtools" title="">http://www.slideshare.net/..</a></td>
                                  <td>Public speaking tips to follow.</td>
                                </tr>
                              </tbody>
                            </table>

                        </div>
                    </div>
                    
                    <hr/>
                    
                    <div class="row post" id="post3" data-up_votes="" data-id="post3">
                        <div class="large-1 columns small-3">
                            <?php include('templates/vote.php'); ?>
                        </div>
                        <div class="large-11 columns">
                            <h5>Presenation tips</h5>

                            <table>
                              <thead>
                                <tr>
                                  <th width="200">Resource</th>
                                  <th width="200">link</th>
                                  <th width="150">Comments</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Slide tips</td>
                                  <td><a href="https://www.ted.com/participate/organize-a-local-tedx-event/tedx-organizer-guide/speakers-program/prepare-your-speaker/create-prepare-slides" title="">https://www.ted.com/...tips</a></td>
                                  <td>Do you really need your slides? If so, how do you use them?</td>
                                </tr>
                              </tbody>
                            </table>

                        </div>
                    </div>
                    
                </div>

            </div>
            
            <?php include_once('includes/footer.php'); ?>

            <script src="js/foundation.min.js"></script>

            <script>
                $(document).foundation();
                VOTE.init();
            </script>
        </body>
    </html>