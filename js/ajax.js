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
             alert(+id+"dihapus");
           }
           else {
             elemen.remove();
             alert("salaaah"+id);
           }
         },
       });
     }
   }
   $.fn.HapusDosen = function() {
     if (confirm("yakin ini mo dihapus?") == true) {
       var elemen = this.parent().parent().parent();
       var id = this.parent().attr('data-id');
       $.ajax({
         type: "POST",
         url: "dosen_delete.php",
         dataType: 'html',
         data: "&id="+id,
         success: function(msg){
           if(msg == true){
             elemen.remove();
             alert("success"+id);
           }
           else {
             elemen.remove();
             alert("salaaah"+id);
           }
         },
       });
     }
   }
   $.fn.HapusEksekutif = function() {
     if (confirm("yakin ni mo dihapus?") == true) {
       var elemen = this.parent().parent().parent();
       var id = this.parent().attr('data-id');
       $.ajax({
         type: "POST",
         url: "eksekutif_delete.php",
         dataType: 'html',
         data: "&id="+id,
         success: function(msg){
           if(msg == true){
             elemen.remove();
             alert("success"+id);
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
