// SCRIPT PARA EL MENU DE SANDWICH DESPLEGABLE
$("#iconomenu").click(function () {
  $(".contenedormenu").slideToggle();
});

// FUNCIÓN PARA DESPLAZAMIENTO DE LOS VÍNCULOS
$(".btn_ancla").click(function () {
  var ancla = $(this).attr("href");
  $("html,body").animate(
    {
      scrollTop: $(ancla).offset().top,
    },
    1000
  );
});

// SCRIPT PARA EL BOTON SUBIR
$(document).ready(function () {
  $(".ir_arriba").click(function () {
    $("body, html").animate(
      {
        scrollTop: "0px",
      },
      1000
    );
  });
});

// SCRIPT PARA EL ACORDEON
$(".acordeon-titulo").click(function () {
  var t = $(this);
  var icon = t.children("#icono");
  var tp = t.next();
  tp.slideToggle();
  icon.toggleClass("fa-plus-square fa-minus-square");
});

// SCRIPT PARA EL ACORDEON PLAYLIST
// $(".acordeon-titulo-video").click(function () {
//   var t = $(this);
//   var icon = t.children("#icono");
//   var tp = t.next();
//   tp.slideToggle();
//   icon.toggleClass("fa-angle-right fa-angle-down");
// });

// SCRIPT MENÚ TABS
// $("ul li #btn1").addClass("activo");

$(".linea").click(function () {
  $(".linea").removeClass("activo");
  $(this).addClass("activo");

  var activar_tab = $(this).attr("href");
  $(activar_tab).show();
});

// SCRIPT MENÚ TABS PLAYLIST
$("#btn2").addClass("activacion");
$("#contenedor_tabs article").hide();
$("#op1").show();

$(".link").click(function () {
  $(".link").removeClass("activacion");
  $(this).addClass("activacion");
  $("#contenedor_tabs article").hide();

  var activar_tab = $(this).attr("href");
  $(activar_tab).show();
});

//link activo
const currentLocation = location.href;
const menuItem = document.querySelectorAll("a");
const menuLength = menuItem.length;
for (let i = 0; i < menuLength; i++) {
  if (menuItem[i].href === currentLocation) {
    menuItem[i].className = "activo";
  }
}
