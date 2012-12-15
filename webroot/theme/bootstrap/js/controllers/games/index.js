$(document).ready(function() {
	function ajax_request($this) {
		var destination = $this.attr('destination_id');
		var params;
		if ($this.attr('params')) {
			params = $(this).attr('params');
		} else {
			params = null;
		}
		$.ajax({
            url: '/games/handle_ajax',
            type: 'post',
            data: {
                target: $this.attr('data_target'),
                request_type: $this.attr('request-type'),
                params: params
            },
            success: function (data) {
            	console.log(data);
            	if (data.success) {
            		if (data.data.type == 'modal') {
            			$('#'+destination).html(data.data.content);
            			$('#myModal-'+destination).modal('show');
            			$('#myModal').modal({
							'data-backdrop': 'static'
						})
						$('#myModal').on('hidden', function () {
							$('#'+destination).html('');
						});
						$('.request').unbind('click');
						$('.request').click(function() {
							ajax_request($(this));
						});
            		} else if (data.data.type == 'modal-change') {
            			$('#modal-content').html(data.data.content);
            		}
               } else {
               		alert(data.data.message);
               }
            }
        });
	}
	$('.request').click(function() {
		$('.request').unbind('click');
		ajax_request($(this));
	});
	$('.inital_pokemon').click(function() {
		if(confirm('Are you sure you choose '+$(this).attr('value')+' as your first Pokemon?')) {
			
		}
	});
});