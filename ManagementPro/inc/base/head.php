<?php
    if(isset($page_base)){
        $page_base = '../../';
    }

    if(isset($page_title)){
        $page_tittle = 'Proyecto Capacitación';
    }
?>
    <meta charset="UTF-8" />
    <meta name="google" value="notranslate" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $page_title ?></title>
    <link rel="icon" type="image/png" href="<?php echo $page_base ?>imagenes/fondo_curso.jpg" />
    <link rel="stylesheet" href="<?php echo $page_base ?>css/site.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
      rel="stylesheet"
    />
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>