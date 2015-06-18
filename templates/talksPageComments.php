<?php 
    $comments = $pageInfo['comments'];
    foreach ($comments as $key => $comment) {
?>
        <div class="large-12 columns">
            <?php print $comment['comment']; ?>
        </div>
<?php 
    }
 ?>                    
