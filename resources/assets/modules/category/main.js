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
      	//console.info("id #"+id);
      	$.getJSON("/api_transaction/"+id, function ( result ){
      		var transaction = result.row;
      		$('#id').val(transaction.id);
      		$('#fitid').val(transaction.fitid);
      		$('#description').val(transaction.description);
      		$('#value').val(transaction.value);
      		$('#id_category').val(transaction.id_category);

      		$("#id_category").val(transaction.category.id_category);
      		var options = $("#id_sub_category");
			$.each(result.categories, function() {
				var option = $("<option />").val(this.id).text(this.name);
			    options.append(option);
			});
			options.val(transaction.id_category);
      	})
      	var modal = $(this)
      	modal.find('.modal-title').text('Transação  #' + id);
    });

    $('#gravar').click(function(){
    	//console.info('grava!');
    	var transaction = {
    		"_token": $('#token').val(),
    		'id':$('#id').val(),
    		'id_category':$('#id_sub_category').val()
    	};
    	//console.info(transaction);
    	$.ajax({
			type: "POST",
			url: "/api_transaction",
			data: transaction,
		  	success: function(response){
		  		$("#transaction_form").hide();
		  		$("#alert").show();
		  	},
		  	dataType: 'json'
		});
    })
});