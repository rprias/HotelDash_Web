(function ($) {
  // Inicia una IIFE (Immediately Invoked Function Expression) que toma jQuery como argumento.

  "use strict"; // Activa el modo estricto de JavaScript para ayudar a evitar errores comunes.

  // Define la función fullHeight
  var fullHeight = function () {
    // Establece la altura de todos los elementos con la clase 'js-fullheight' al alto de la ventana del navegador.
    $(".js-fullheight").css("height", $(window).height());

    // Añade un evento que se activa cuando la ventana se redimensiona.
    $(window).resize(function () {
      // Vuelve a establecer la altura de los elementos con la clase 'js-fullheight' al nuevo alto de la ventana.
      $(".js-fullheight").css("height", $(window).height());
    });
  };

  fullHeight(); // Llama a la función fullHeight para que se ejecute inmediatamente al cargar el script.

  // Añade un evento de clic al elemento con el ID 'sidebarCollapse'.
  $("#sidebarCollapse").on("click", function () {
    // Alterna (agrega o quita) la clase 'Active' en el elemento con el ID 'sidebar'.
    $("#sidebar").toggleClass("active");
  });
})(jQuery); // Finaliza la IIFE y pasa jQuery como argumento.
