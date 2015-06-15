<?php 
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/core.php';
    $core = new Core;
    $last3ResultsArray = $core->returnLast3Results();
    foreach ($last3ResultsArray as $resultArray) {
?>
        <div class="large-4 small-6 columns">
            <a href="#" title="<?php print $resultArray['presenter'] . ' - ' . $resultArray['topic']; ?>">
                <iframe width="303" height="157" src="https://www.youtube.com/embed/<?php print $resultArray['youtube_id']; ?>?controls=0&fs=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                <div class="panel">
                    <p><?php print $resultArray['topic']; ?></p>
                </div>
            </a>
        </div>
<?php 
    }
 ?>                    
