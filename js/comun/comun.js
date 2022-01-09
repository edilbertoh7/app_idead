/**SOLO NUMEROS CON DECIMALES*/
function numeroDecimal(elemento){
    var val = $(elemento).val();        
    if(isNaN(val)){        
         val = val.replace(/[^0-9\,]/g,'');
         if(val.split(',').length>2) 
             val =val.replace(/\,+$/,'');
    }
    $(elemento).val(val);
};

function VerMuni(arg) {
    alert('ok entra'+arg);
}
/**CALCULO DEL VALOR PARA LA HOJA DE VIDA*/
function calcularTotalHV(){
    total = parseFloat(0.00);
    total += parseFloat($("#pregrado").val());
    total += parseFloat($("#especialista").val());
    total += parseFloat($("#magister_esp_medica").val());
    total += parseFloat($("#doctorado").val());
    total += parseFloat($("#seminarios_cursos").val());
    total += parseFloat($("#experiencia_docencia_universitaria").val());
    total += parseFloat($("#produccion_intelectual").val());
    total += parseFloat($("#experiencia_profesional").val());
   // total /= 8;
    $("#total_hoja_vida").val(total.toFixed(2));
}

/**CONSULTAR CURSOS DEPENDIENDO DEL PROGRAMA*/
function getCursos(){
    var programa_id = $('#programa_id').val();
    if(programa_id) {
        $.ajax({
            url: "/cursos/todos/programa/"+programa_id,
            type:'get',
            dataType:"json",
            beforeSend: function(){
                
            },
            success:function(data) {
                $('#curso_id').empty();
                $.each(data, function(key, value){
                    $('#curso_id').append('<option value="'+ key +'">' + value + '</option>');
                });
            },
            complete: function(){
                    
            }
        });
    } else {
        $('#curso_id').empty();
    }
}

/*CONSULTAR MUNICIPIOS DEPENDIENDO*/
function getMunicipios(arg){
    var departamento_id = arg;
    // alert(departamento_id);
    if(departamento_id) {
        var id = {'Accion':'Municipios',id:departamento_id};
        $.ajax({
          url:"../../scripts/consultas.php",
          type: "POST",
          data: id,
          async: false,
          success: function (data) {
            // alert(data);
             $('#municipio').html(data);
          }   
      });
    } else {
        $('#municipio_id').empty();
    }
}

function inactiva(arg) {
    
    $(".inactiva").prop('disabled', true);
    $(".inactiva1").prop('disabled', true);
    if (arg==1) {
    $(".inactiva").prop('disabled', false);
    $(".activa").prop('disabled', true);
    }
}


/**MODAL PARA APLICACION A CONVOCATORIRAS*/
$('#AplicarConvocatoriaModal').on('show.bs.modal', function (event) {
  button = $(event.relatedTarget);
  recipient = button.data('convocatoria');

  modal = $(this);
  modal.find('.modal-body #detalleConvocatoria_id').val(recipient);
  modal.find('.modal-body #detalleConvocatoria_id_show').val(recipient);
})

/**MODAL PARA Pre-Seleccion de aspirantes*/
$('#preSeleccionModal').on('show.bs.modal', function (event) {      
    button = $(event.relatedTarget);
    recipient = button.data('aplicacion');    
    modal = $(this);
    modal.find('.modal-body #id').val(recipient);
})

 
