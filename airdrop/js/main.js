jQuery( document ).ready(function( $ ) {
	var $form_subscribe = $('#subscribe-form'),
			$form_unsubscribe = $('#unsubscribe-form');

	$form_subscribe.add($form_unsubscribe).submit(function(){
		var $form = $(this),
				$loading = $('.form-loading', $form),
				$content = $('.form-content', $form),
				$message = $('.form-message', $form);

		$loading.removeClass('hide');

		$.ajax({
			type: 'POST',
			url: 'script.php',
			data: $(this).serialize(),
			dataType: 'json',
			success: function(data){
				$loading.fadeOut('fast', function(){
					$(this).addClass('hide').fadeIn();
				});
				$('.error-message', $form).remove();
				if (data.code == 'failed'){
					data.fields = data.fields.reverse();
					for (var i in data.fields){
						$('[name=' + data.fields[i].name + ']', $form).trigger('focus').each(function(){
							if (['checkbox', 'radio'].indexOf($(this).prop('type')) === -1){
								$(this).trigger('click');
							}
						}).parent('div').each(function(){
							$(this).append($('<div>').addClass('error-message').html(data.fields[i].message));
						});
					}
				}else if (data.code == 'success'){
					$content.fadeOut('fast', function(){
						$(this).addClass('hide');
						$message.removeClass('hide');
					});
				}
			},
		});
		return false;
	});

	/**
	 * Show/Hide forms
	 * @param  {Boolean} is_subscribe [description]
	 * @return {[type]}               [description]
	 */
	function showForm(is_subscribe){
		var $form, $form_hide, timeout;
		if (is_subscribe){
			$form = $form_subscribe;
			$form_hide = $form_unsubscribe;
		}else{
			$form_hide = $form_subscribe;
			$form = $form_unsubscribe;
		}
		if (!$form_hide.hasClass('hide')){
			$form_hide.removeClass('show-me');
			timeout = 600; // base on css transitio duration
		}else{
			timeout = 0;
		}

		setTimeout(function(){
			$form_hide.addClass('hide');
			$form.removeClass('hide');
			setTimeout(function(){
				$form.addClass('show-me');
			}, 100);
		}, timeout);
	}

	$('[data-toggle=subscribe]').click(function(){
		showForm(true);
		return false;
	});

	$('[data-toggle=unsubscribe]').click(function(){
		showForm();
		return false;
	});

	// on load
	showForm(true);

});
