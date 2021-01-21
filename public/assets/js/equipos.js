

$(document).ready(function(){
  var maxField = 20; //Input fields increment limitation
  var addButton = $('.add_button'); //Add button selector
  var wrapper = $('.field_wrapper'); //Input field wrapper 
  var fieldHTML = '<div id="este" class="input-group"><input type="text" class="form-control mb-2 col-md-11" name="cantidades[]" value="" placeholder="Ficha Tecnica" required min="1" maxlength="20"/><a href="javascript:void(0);" class="remove_button form-group col-1" title="Eliminar casilla"><i class="fa fa-minus" aria-hidden="true"></i></a></div>';  
  var x = 1; //Initial field counter is 1
  $(addButton).click(function(){ //Once add button is clicked
      if(x < maxField){ //Check maximum number of input fields
          x++; //Increment field counter
          $(wrapper).append(fieldHTML); // Add field html
      }
  });
  $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
      e.preventDefault();
      $(this).parent('div').remove(); //Remove field html
      x--; //Decrement field counter
  });
});

function confirmarEliminar() {
    var result = confirm('¿Desea Eliminar el Equipo?');

    if (result) {
            return true;
        } else {
            return false;
        }
}


(function confirmarModificar() {
    var form = document.getElementById('modificar');
    form.addEventListener('click', function(event) {
      // si es false entonces que no haga el submit
      if (!confirm('¿Desea Modificar las Caracteristicas del Equipo?')) {
        event.preventDefault();
      }
    }, false);
  })();


(function confirmarObservacion() {
var form = document.getElementById('observacion');
form.addEventListener('click', function(event) {
    // si es false entonces que no haga el submit
    if (!confirm('¿Desea Agregar una Observacion al Equipo?')) {
    event.preventDefault();
    }
}, false);
})();

function showQr(CodigoQR){
    //alert(Tipo);
   $("#ex1").html(`
        <img src="${CodigoQR}" width="40%">
        <p>Escanee el código para tener más información sobre el equipo</p>
    `);
}

function insertCategori(){
   $("#modal").show().height("450px");
}

document.querySelector('#Busqueda').addEventListener('keypress', function (e) {
  if (e.key === 'Enter' && $('#Busqueda').val().length == 0) {
      
      alert('Debe llenar el campo');
      return false;
  }
});




