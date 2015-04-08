<?php 
    include_once('php/core.php');
    $core = new Core;
    $allResultsArray = $core->returnAllResults();
    foreach ($allResultsArray as $resultArray) {
?>
    <div class="row post masterRow" id="talk<?php print $resultArray['id']; ?>" data-up_votes="" data-id="talk<?php print $resultArray['id']; ?>">
        <div class="large-1 columns small-3">
            <?php include('templates/vote.php'); ?>
        </div>
        <div class="large-11 columns">
            <h4><?php print $resultArray['presenter']; ?>: <?php print $resultArray['topic']; ?></h4>
            <iframe width="640" height="360" src="https://www.youtube.com/embed/<?php print $resultArray['youtube_id']; ?>?showinfo=0" frameborder="0" allowfullscreen></iframe>

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
                  <td><?php print $resultArray['date']; ?></td>
                  <td><?php print $resultArray['presenter']; ?></td>
                  <td><?php print $resultArray['topic']; ?></td>
                  <td><a target="_blank" href="<?php print $resultArray['presentation_link']; ?>" title="<?php print $resultArray['topic']; ?> presentation link">Presentation link</a></td>
                </tr>
              </tbody>
            </table>

            <?php // include('templates/feedback.php'); ?>

        </div>
    </div>

    <hr/>

<?php
    }
 ?>
