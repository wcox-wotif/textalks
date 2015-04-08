<div class="row post masterRow" id="feedback_<?php print $data['id']; ?>" data-up_votes="" data-type="<?php print $data['type']; ?>" data-id="feedback_<?php print $data['id']; ?>">
    <div class="large-2 columns small-3">
        <?php include('vote.php'); ?>
    </div>
    <div class="large-10 columns">
        <?php print $data['feedback'] ?>
    </div>
</div>
<hr/>
