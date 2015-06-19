

<div class="row post" >

    <div class="youTubeVideo">

      <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
        <div id="player"></div>
        <script>
          // 2. This code loads the IFrame Player API code asynchronously.
          var tag = document.createElement('script');

          tag.src = "https://www.youtube.com/iframe_api";
          var firstScriptTag = document.getElementsByTagName('script')[0];
          firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

          // 3. This function creates an <iframe> (and YouTube player)
          //    after the API code downloads.
          var player;
          // var width = $(window).width() - 10%;
          // var height = $(window).height() -
          function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
              height: '390',
              width: '640',
              videoId: '<?php print $pageInfo['talk']['youtube_id']; ?>',
              events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
              }
            });
          }

          // 4. The API will call this function when the video player is ready.
          function onPlayerReady(event) {
            event.target.playVideo();
          }

          // 5. The API calls this function when the player's state changes.
          //    The function indicates that when playing a video (state=1),
          //    the player should play for six seconds and then stop.
          var done = false;
          function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.PLAYING && !done) {
              setTimeout(stopVideo, 6000);
              done = true;
            }
          }
          function stopVideo() {
            player.stopVideo();
          }
        </script>
    
    </div>

    <div class="presentation_details">
        <div class="large-12 columns">
            <div class="topic"><h2><?php print $pageInfo['talk']['topic']; ?><h2></div>
        </div>
        <div class="large-12 columns">
            <div class="presenter"><h3><?php print $pageInfo['talk']['presenter']; ?><h3></div>
        </div>
        <div class="large-12 columns">
            <div class="stats like_stats"><img class="heart" src="/img/heart_icon.svg"> 
                <span class="likes"><?php print $pageInfo['likes']['like_count']; ?></span> Likes
            </div>
            <div class="stats plays_stats">
                <img class="small_play_logo" src="/img/play_solid_logo.svg"> 
                <span class="plays"><?php print $pageInfo['youtube_info']['views']; ?></span> Plays
            </div>
        </div>
        <div class="large-12 columns">
            <form method="POST" class="comments_form">
                <div class="comments_bar">
                    <img class="" src="/img/comment_logo.svg">                    
                    <input type="hidden" name="talk_id" value="<?php print $pageInfo['talk']['id']; ?>">
                    <input type="text" name="comment" class="comments" placeholder="Please leave positive or constructive feedback">
                </div>
                <a href="#" class="button comment_submit">Submit</a>
                <!-- <input type="submit" class="comment_submit" value="Submit" > -->
            </form>
        </div>
        <div class="large-12 columns">
            <div class="submit_message"> submit message here</div>
        </div>
        <div class="nextPrevTalks">
            <a href="#prev"><img class="prev" src="/img/arrow.svg"></a>
            <a href="#next"><img class="next" src="/img/arrow.svg"></a>
        </div>

        <?php include_once $_SERVER['DOCUMENT_ROOT'].'/templates/talksPageComments.php'; ?>

    </div>

</div>
