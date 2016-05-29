$(document).ready(function(){
	//console.info('ok... load!');

	$('#id_category').change(function(){
		//console.info('change!');
		id_category = $(this).val();
		$.getJSON( "/api_category/sub_categories/"+id_category, function( data ) {
			$('#id_sub_category').find('option').remove();
			options = $('#id_sub_category');
		  	$.each(data, function() {
			    options.append($("<option />").val(this.id).text(this.name));
			});
		});
	});


    $('#myModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
      	var id = button.data('id') // Extract info from data-* attributes
      	console.info("id #"+id);
      	$.getJSON("/api_transaction/"+id, function (transaction ){
      		$('#id').val(transaction.id);
      		$('#fitid').val(transaction.fitid);
      		$('#description').val(transaction.description);
      		$('#value').val(transaction.value);
      		$('#id_category').val(transaction.id_category);
      	})
      	var modal = $(this)
      	modal.find('.modal-title').text('Transação  #' + id);
    });
});