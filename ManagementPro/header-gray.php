<!-- FLECHA -->
    <a class="ir_arriba" href="#">
      <i class="fa fa-arrow-up fa-1x"></i>
    </a>
    <header>
      <div class="cabecera_azul">
        <div class="ancho cabeceraredes">
          <div class="correo">
            <a href="mailto:soporte@mproerp.com"
              ><i class="fa-solid fa-envelope-open-text"></i>
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
      <div class="cabecera_gris">
        <div class="ancho contenedorcabecera">
          <div class="alineacion">
            <a href="index.php">
              <figure>
                <img src="imagenes/logo_azul.png" alt="" />
              </figure>
            </a>
            <div class="contenedoricono">
              <i id="iconomenu" class="fas fa-bars fa-2x"></i>
            </div>
          </div>
          <nav>
            <ul id="menu" class="contenedormenu">
              <li><a href="index.php" class="linea">Inicio</a></li>
              <span>|</span>
              <li>
                <a href="capacitacion.php" class="linea">Capacitación</a>
              </li>
              <span>|</span>
              <li><a href="soporte.php" class="linea">Soporte</a></li>
              <span>|</span>
              <li><a href="contacto.php" class="linea">Contacto</a></li>
<<<<<<< HEAD
              <?php if(isset($_SESSION['usuario'])?$_SESSION['usuario']:''!=''){ ?>
=======
              <?php if($_SESSION['usuario']!=''){ ?>
>>>>>>> 7a6a334b95347326a4ff225c0779d96c56547b72
              <li>
                <a href="./admin/usuarios/" id="btn_azul"
                  >Administrar <i class="fa-solid fa-user"></i
                ></a>
              </li>
              <?php }else{ ?>
              <li>
                <a href="./usuario/login/" id="btn_azul"
                  >Iniciar Sesión <i class="fa-solid fa-right-to-bracket"></i
                ></a>
              </li>
              <?php } ?>
            </ul>
          </nav>
        </div>
      </div>
    </header>