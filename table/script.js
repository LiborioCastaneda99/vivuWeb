$(document).ready(function(){

 var dataTable = $('#personal').DataTable({
  "language": {
  "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
  },
  "processing" : true,
  "serverSide" : true,
  "order" : [],
  "ajax" : {
   url:"datos.php",
   type:"POST"
  }
 });

 $('#personal').on('draw.dt', function(){/*`personal_nombre``personal_edad``personal_salario`*/
  $('#personal').Tabledit({
   url:'edicion.php',
   dataType:'json',
   columns:{
    identifier : [0, 'id'],
	editable:[[1, 'curso'], [2, 'jornada'], [3, 'municipio']]
   },
   restoreButton:false,
   onSuccess:function(data, textStatus, jqXHR)
   {
    if(data.action == 'delete')
    {
     $('#' + data.idp).remove();
     $('#personal').DataTable().ajax.reload();
    }
   }
  });
 });
  
}); 