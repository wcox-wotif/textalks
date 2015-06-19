
<div class="video_container">
    <div class="grid-sizer"></div>

<?php 

  foreach ($pageInfo['talks'] as $key => $value) {
    $presenter = $value['presenter'];
    $topic = $value['topic'];
    $url = $value['url'];
    $heroImg = $value['hero_url'];
    $imgWidth = '';
    $widthClass = '';
    if($heroImg != '') {    
      try {
        $imgWidth = getimagesize($_SERVER['DOCUMENT_ROOT'].$heroImg);
      } catch (Exception $e) {
        print_r($e);    
      }
      if($imgWidth[0] == 803) {
        $widthClass = 'w2';
      } else {
        $widthClass = 'grid-sizer';        
      }
    }

?>
  <div data-title="<?php print $topic; ?>" data-speaker="<?php print $presenter; ?>" class="item <?php print $widthClass; ?>">
      <a href="<?php print $url; ?>" title="<?php print $presenter; ?>. <?php print $topic; ?>"  data-title="<?php print $topic; ?>" data-speaker="<?php print $presenter; ?>">
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


