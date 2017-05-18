$(document).ready(function(){
  var btnDefault = '<button onClick="$(this).TryDelete();">delete</button>';
	var btnYes = '<button onClick="$(this).DoDelete();">delete</button>';
	var btnNo = '<button onClick="$(this).CancelDelete();">cancel</button>';
  $.fn.TryDelete = function() {
		this.parent().html(btnYes+btnNo);
  };
	$.fn.DoDelete = function() {
		var el = this.parent().parent();
		var id = this.parent().attr('data-id');
		$.ajax({
			type: "POST",
			url: "ajax-php/ajax-del.php",
			dataType: 'html',
			data: "q="+action+"&id="+id,
			success: function(msg){
				if (msg == true) {
					el.remove();
					notie.alert('success', 'Nilai berhasil dihapus', 2);
				}
				else {
					notie.alert('error', 'Nilai gagal dihapus', 2);
				}
			},

		});
  };
	$.fn.CancelDelete = function() {
		this.parent().html(btnDefault);
  };

	$.fn.TryEditInti = function() {
		var id = this.attr('data-id');
		var body = $('#body-edit');
		$.ajax({
			type: "POST",
			url: "ajax-php/ajax-get-item-edit.php",
			dataType: 'html',
			data: "q="+action+"&id="+id,
			success: function(msg){
				body.html(msg);
			},
		});
	};

	$.fn.TryDeleteInti = function() {
		var id = this.attr('data-id');
		var body = $('#body-delete');
		$.ajax({
			type: "POST",
			url: "ajax-php/ajax-get-item-delete.php",
			dataType: 'html',
			data: "q="+action+"&id="+id,
			success: function(msg){
				body.html(msg);
			},
		});
	};
});
