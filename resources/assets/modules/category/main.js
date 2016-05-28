$(document).ready(function(){
	console.info('ok... load!');

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
});