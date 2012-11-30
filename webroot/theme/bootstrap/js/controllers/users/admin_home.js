$(document).ready(function() {

	$('#status').on('click', function() {
		if($('#status').html() == 'Disconnected') {
			$.ajax({
		        url: '/admin/ajax/originate',
		        type: 'post',
		        success: function (data) {
		        	if (data.success) {
		        		$('#status').html('Connecting...');
		        	}
		            else{
		            	alert(data.data.message);
		            }
		        }
	    	});
		}
	});
    Handlebars.registerHelper('list', function(items, options) {
        var out = '<div class="span2">';

        for(var i=0, l=items.length; i<l; i++) {
            out = out + options.fn(items[i]);
        }

        return out + '</div>';
    });

    setInterval(function () {
        $.ajax({
            url: '/admin/ajax/get_active_channels',
            success: function(data) {
                if (data.success) {
					if(data.data.status != null) {
						$('#status').html(data.data.status);
					}
					if (data.data.active_call.length>0) {
                        var source = $('#active_call_list-template').html();
                        var template = Handlebars.compile(source);
                        var context = data;
                        var html = template(context);
                        $('#active_call_list').html(html);

						$('.call').on('click', function() {
                            $this = $(this);
                            $channel = $this.data('channel');
                            $channel_state = $this.data('channelstate');
                            $my_ext = $this.data('myext');
                            $unique_id = $this.data('uniqueid');
                            console.log('call cick');
                            $.ajax({
                                url: '/admin/ajax/hold',
                                type: 'post',
                                data: {
                                    ext: $my_ext,
                                    channel: $channel
                                },
                                success: function (data) {
                                	if (data.success) {
                                    	console.log('success hold');
                                   } else {
                                   		alert(data.data.message);
                                   }
                                }
                            });
                            console.log('you clicked call!! channel ' + $channel);
                        });
                    } else {
                        $('#active_call_list').html('');
                    }

					if (data.data.hold.length>0) {
                        var source = $('#hold_list-template').html();
                        var template = Handlebars.compile(source);
                        var context = data;
                        var html = template(context);
                        $('#hold_list').html(html);
						$('.call').on('click', function() {
                            $this = $(this);
                            $channel = $this.data('channel');
                            $channel_state = $this.data('channelstate');
                            $my_ext = $this.data('myext');
                            $unique_id = $this.data('uniqueid');
                            console.log('call cick');
                            $.ajax({
                                url: '/admin/ajax/transfer',
                                type: 'post',
                                data: {
                                    ext: $my_ext,
                                    channel: $channel
                                },
                                success: function (data) {
                                	if (data.success) {
                                    	console.log('success transfer');
                                   } else {
                                   		alert(data.data.message);
                                   }
                                }
                            });
                            console.log('you clicked call!! channel ' + $channel);
                        });
                    } else {
                        $('#hold_list').html('');
                    }
                    
                    if (data.data.queue.length>0) {
                        var source = $('#queue_list-template').html();
                        var template = Handlebars.compile(source);
                        var context = data;
                        var html = template(context);
                        $('#queue_list').html(html);

                        $('.call').on('click', function() {
                            $this = $(this);
                            $channel = $this.data('channel');
                            $channel_state = $this.data('channelstate');
                            $my_ext = $this.data('myext');
                            $unique_id = $this.data('uniqueid');
                            console.log('call cick');
                            $.ajax({
                                url: '/admin/ajax/transfer',
                                type: 'post',
                                data: {
                                    ext: $my_ext,
                                    channel: $channel
                                },
                                success: function (data) {
                                	if (data.success) {
                                    	console.log('success transfer');
                                   } else {
                                   		alert(data.data.message);
                                   }
                                }
                            });
                            console.log('you clicked call!! channel ' + $channel);
                        });

                    } else {
                        $('#queue_list').html('');
                    }
                }
            }
        });
    }, 1000);
});