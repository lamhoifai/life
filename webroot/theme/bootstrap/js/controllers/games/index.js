$(document).ready(function() {
	//$('#myPokemonInfoModal').modal('show');
	$('.request').click(function() {
		var destination = $(this).attr('destination_id');
		var params;
		if ($(this).attr('params')) {
			params = $(this).attr('params');
		} else {
			params = null;
		}
		$.ajax({
            url: '/games/handle_ajax',
            type: 'post',
            data: {
                target: $(this).attr('data_target'),
                request_type: $(this).attr('request-type'),
                params: params
            },
            success: function (data) {
            	console.log(data);
            	if (data.success) {
            		if(data.data.type == 'modal') {
            			$('#'+destination).html(data.data.content);
            			$('.request').click(function() {
            				alert('123');
            				var $parent = $(this).parent();
							$parent.clone(true);
            			});
            			$('#myModal').modal('show');
            			$('#myModal').modal({
							'data-backdrop': 'static'
						})
						$('#myModal').on('hidden', function () {
							$('#'+destination).html('');
						});
            		}
               } else {
               		alert(data.data.message);
               }
            }
        });
	});
	$('.inital_pokemon').click(function() {
		if(confirm('Are you sure you choose '+$(this).attr('value')+' as your first Pokemon?')) {
			
		}
	});
});