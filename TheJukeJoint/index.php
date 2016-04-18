<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="mainstyle.css">
</head>


<body>
<button id="play">Play</button>
<button id="stop">Stop</button>
<button id="half">Half</button>
<br>
<label>URL</label>
<input type="text" id="url">
<button id="submit">submit</button>


<!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
<div id="player"></div>
<script>
    // 2. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');
    var play = document.getElementById("play");
    var stop = document.getElementById("stop");
    var half = document.getElementById("half");
    var url = document.getElementById("url");
    var submit = document.getElementById("submit");
    var YTUrl;

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.
    var player;



    // 4. The API will call this function when the video player is ready.

       function onPlayerReady(event) {
            play.onclick = function(){
                console.log("dfgdsgdgsd");
                event.target.playVideo();
            };
    }

    stop.onclick = function(){
        StopVideo();
  };
    half.onclick = function(){
      player.setPlaybackRate(0.5);
    };

    function onPlayerStateChange(event) {
        // if (event.data == YT.PlayerState.PLAYING && !done) {
        //     done = true;
        // }
    }
    function StopVideo() {
        player.pauseVideo();
    }

    submit.onclick = function(){
        YTUrl = url.value;
        console.log("url is " + YTUrl);
        YTUrl = splitter();
        console.log("url is " + YTUrl);

        onYouTubeIframeAPIReady();
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
                height: '200',
                width: '200',
                videoId: YTUrl,
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
        }
    };

    function splitter(){
        var trackTitle = YTUrl.toString().slice(32);
        console.log(trackTitle);
        return trackTitle;

    }
</script>
<canvas id="list" width="300" height="500"></canvas>

</body>
</html>