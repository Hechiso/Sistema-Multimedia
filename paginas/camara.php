<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="utf-8" />
    <title>Stream HLS con VLC</title>
</head>
<body>

<video id="video" width="640" height="360" controls autoplay muted></video>

<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
<script>
    var video = document.getElementById('video');
    if (Hls.isSupported()) {
        var hls = new Hls();
        hls.loadSource('/stream/playlist.m3u8');
        hls.attachMedia(video);
        hls.on(Hls.Events.MANIFEST_PARSED, function() {
            video.play();
        });
    } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
        video.src = '/stream/playlist.m3u8';
        video.addEventListener('loadedmetadata', function() {
            video.play();
        });
    }
</script>

</body>
</html>

