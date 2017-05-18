$(document).ready(function() {

  $('#import').change(function(){
    $('#form-import').submit();
  });

   $.fn.HapusLog = function() {
     if (confirm("yakin dihapus?") == true) {
       var elemen = this.parent().parent().parent();
       var id = this.parent().attr('data-id');
       $.ajax({
         type: "POST",
         url: "delete-log.php",
         dataType: 'html',
         data: "&id="+id,
         success: function(msg){
           if(msg == true){
             elemen.remove();
             alert(+id);
           }
           else {
             elemen.remove();
             alert("salaaah"+id);
           }
         },
       });
     }
   }
 });
