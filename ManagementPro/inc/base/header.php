<?php 
    if(!isset($page_base)){
        $page_base = '../../';
    }
?>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#012639">
        <div class="container">
          <a class="navbar-brand" href="<?php echo $page_base ?>">
            <img src="<?php echo $page_base ?>imagenes/fondo_curso.jpg" height="32" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navdropMain" aria-controls="navdropMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navdropMain">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo $page_base ?>">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo $page_base ?>admin/usuarios/">Usuarios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo $page_base ?>admin/cursos/">Cursos</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navdropUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Usuario
                </a>
                <ul class="dropdown-menu" aria-labelledby="navdropUser">
                  <li><a class="dropdown-item" href="<?php echo $page_base ?>usuario/cuenta/">Cuenta</a></li>
                  <li><a class="dropdown-item" href="<?php echo $page_base ?>usuario/logoff/">Salir</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>