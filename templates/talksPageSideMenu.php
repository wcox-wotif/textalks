<?php 
    include_once('php/core.php');
    $core = new Core;
    $allResultsArray = $core->returnAllResults();
    foreach ($allResultsArray as $resultArray) {
?>
      <section class="section">
          <h5 class="title"><a href="#talk<?php print $resultArray['id']; ?>"><?php print $resultArray['presenter']; ?> <small><?php print $resultArray['topic']; ?></small></a></h5>
      </section>
<?php
    }
 ?>
