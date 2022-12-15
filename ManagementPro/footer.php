<?php 
    if(!isset($page_base)){
        $page_base = '../../';
    }
?>
<footer>
      <div id="contenidofooter" class="ancho">
        <a href="<?php echo $page_base ?>">
          <figure>
            <img src="<?php echo $page_base ?>imagenes/logo_gris.png" alt="" />
          </figure>
        </a>
        <div id="centro">
          <b>Contáctenos</b>
          <hr />
          <a href="mailto:soporte@mproerp.com"
            ><i class="separaricono fa-solid fa-envelope-open-text"></i>
            <span>soporte@mproerp.com</span></a
          >
        </div>
        <div id="derecha">
          <b>Síguenos En</b>
          <hr />
          <div class="redesociales">
            <a href="#" class="circuloredes">
              <i class="fa-brands fa-google-plus-g"></i>
            </a>
            <a
              href="https://twitter.com/mproerp"
              target="_blank"
              class="circuloredes"
            >
              <i class="fa-brands fa-twitter"></i>
            </a>
            <a
              href="https://www.linkedin.com/company/managementpro"
              target="_blank"
              class="circuloredes"
            >
              <i class="fa-brands fa-linkedin-in"></i>
            </a>
            <a
              href="https://www.facebook.com/mproerp"
              target="_blank"
              class="circuloredes"
            >
              <i class="fa-brands fa-facebook-f"></i>
            </a>
            <a
              href="https://www.youtube.com/c/ManagementProERP"
              target="_blank"
              class="circuloredes"
            >
              <i class="fa-brands fa-youtube"></i>
            </a>
          </div>
        </div>
      </div>
      <br />
      <hr />
      <br />
      <div class="ancho" id="copy">
        <p>
          &copy; 2022 | ManagementPro Inc | 12 South 1st. Street Ste. 1100, San
          José, CA, 95113
        </p>
      </div>
    </footer>