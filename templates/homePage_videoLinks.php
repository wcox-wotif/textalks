
<div class="video_container">
    <div class="grid-sizer"></div>

<?php 

  include_once $_SERVER['DOCUMENT_ROOT'].'/php/core.php';
  $Core = new Core;
  $talks = $Core->returnAllTalks();

  foreach ($talks as $key => $value) {
    $presenter = $value['presenter'];
    $presenterUrl = str_replace(" ", "_", $presenter);
    $topic = $value['topic'];
    $topicUrl =  str_replace(" ", "_", $topic);
    $heroImg = $value['hero_url'];
?>
  <div data-title="<?php print $topic; ?>" data-speaker="<?php print $presenter; ?>" class="item w2">
      <a href="/talks/<?php print $presenterUrl; ?>-<?php print $topicUrl; ?>" title="<?php print $presenter; ?>. <?php print $topic; ?>">
          <img src="<?php print $heroImg; ?>" alt="<?php print $topic; ?>">
          <div class="details">
              <div class="topic"><?php print $topic; ?></div>
              <div class="speaker"><?php print $presenter; ?></div>
          </div>
      </a>
  </div>
<?php
  }
?>

</div>


