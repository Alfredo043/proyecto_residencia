<?php 
    if(!isset($page_base)){
        $page_base = '../../';
    }
?>
    <a class="ir_arriba" href="#">
      <i class="fa fa-arrow-up fa-1x"></i>
    </a>
    <header id="menu_fixed">
      <div class="cabecera_azul">
        <div class="ancho cabeceraredes">
          <div class="correo">
            <a href="mailto:soporte@mproerp.com"
              ><i class="separaricono fa-solid fa-envelope-open-text"></i>
              <span>soporte@mproerp.com</span></a
            >
          </div>
          <div class="redes">
            <a href="https://www.facebook.com/mproerp" target="_blank"
              ><i class="fa-brands fa-facebook-f"></i
            ></a>
            <a
              href="https://www.linkedin.com/company/managementpro"
              target="_blank"
              ><i class="fa-brands fa-linkedin-in"></i
            ></a>
          </div>
        </div>
      </div>
      <div class="cabecera">
        <div class="ancho contenedorcabecera">
          <div class="alineacion">
            <a href="<?php echo $page_base ?>">
              <figure>
                <img src="<?php echo $page_base ?>imagenes/logo_azul.png" alt="" />
              </figure>
            </a>
            <div class="contenedoricono">
              <i id="iconomenu" class="fas fa-bars fa-2x"></i>
            </div>
          </div>
          <nav>
            <ul id="menu" class="contenedormenu">
              <li><a href="<?php echo $page_base ?>" class="linea">Inicio</a></li>
              <span>|</span>
              <li>
                <a href="<?php echo $page_base ?>capacitacion/" class="linea">Capacitación</a>
              </li>
              <span>|</span>
              <?php 
              if(isset($_SESSION['usuario'])?$_SESSION['usuario']:''!=''){ 
                $tipoUsuario = isset($_SESSION['tipo'])?$_SESSION['tipo']:'0';
                  //Si es cliente o partner se muestra la sección logros
                  ?>
                  <li><a href="<?php echo $page_base ?>logros/" class="linea">Logros</a></li>
                  <span>|</span>
                  <?php
              } ?>
              <li><a href="<?php echo $page_base ?>soporte.php" class="linea">Soporte</a></li>
              <span>|</span>
              <li><a href="<?php echo $page_base ?>contacto.php" class="linea">Contacto</a></li>
              <?php 
              if(isset($_SESSION['usuario'])?$_SESSION['usuario']:''!=''){ 
                $tipoUsuario = isset($_SESSION['tipo'])?$_SESSION['tipo']:'0';
                if($tipoUsuario=='1'){
                  //Si es admin se muestra el boton administrar
                  ?>
                  <li>
                    <a href="<?php echo $page_base ?>admin/usuarios/" id="btn_azul"
                      >Administrar <i class="fa-solid fa-user"></i
                    ></a>
                  </li>
                  <?php
                }else{
                  //Si no es admin, muestra el boton Salir
                  ?>
                  <li>
                    <a href="<?php echo $page_base ?>usuario/logoff/" id="btn_azul"
                      >Cerrar Sesión <i class="fa-solid fa-user"></i
                    ></a>
                  </li>
                  <?php
                }
              }else{ ?>
              <li>
                <a href="<?php echo $page_base ?>usuario/login/" id="btn_azul"
                  >Iniciar Sesión <i class="fa-solid fa-right-to-bracket"></i
                ></a>
              </li>
              <?php 
              }
              ?>
            </ul>
          </nav>
        </div>
      </div>
    </header>