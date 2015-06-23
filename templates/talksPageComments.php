<div class="row page_comments">    
<?php 
    $comments = $pageInfo['comments'];
    foreach ($comments as $key => $comment) {
?>
        <div class="large-12 columns comment">
            <?php print $comment['comment']; ?>
        </div>
        <div class="large-12 columns border_bottom"></div>
<?php 
    }
 ?>                    
</div>
