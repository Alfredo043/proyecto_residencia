<?php 
    session_start();
    include ("../../../inc/conexion.php");

    if(!isset($_SESSION['usuario'])) $_SESSION['usuario'] = '';
    if($_SESSION['usuario']==''){
      echo 'Advertencia: Para el estudio es necesario iniciar sesion';
      return;
    }
    
    $IdVideo = (isset($_POST['idYoutube']))?$_POST['idYoutube']:'';
?>
<div id="player"></div>
<script>
    var player;
    var idVideo = '<?php echo $IdVideo; ?>';
    
    function onYouTubeIframeAPIReady(){
        if(!window.YT){
            return;
        }

        player = new YT.Player('player', {
            height: '360',
            width: '100%',
            playerVars: { 
                autoplay: 0,
                controls: 1,
                rel: 0,
                start: 0,
                modestbranding:1,
                showinfo: 0,
                theme: 'light',
                enablejsapi: 1,
                origin: window.location.href
            },
            videoId: idVideo,//<---  aqu? debe de agregarse el id del video de youtube
            host: 'http://www.youtube.com',
            events: {
            'onReady': onPlayerReady,
            'onStateChange': changeState
            }
        });
    }

    onYouTubeIframeAPIReady();
</script>