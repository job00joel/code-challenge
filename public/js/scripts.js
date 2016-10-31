jQuery(document).ready(function($){

	$( '#url-save' ).on( 'submit', function(e) {
		e.preventDefault(); 
		$.post(
			APP_URL + '/',			
			$(this).serialize(),
			function( response ) {

				var html = '<tr style="background-color: #cbdbff;"> \
					<td><a href="' + response.url + '">' + response.url + '</a></td> \
					<td>' + response.date + '</td> \
					<td><a href="' + response.generated_url + '">' + response.generated_url + '</a> </td> \
					<td>0</td> \
				</tr>';

				$( '.table tbody' ).prepend( html );

				$( '.table tbody tr:first' ).animate( { backgroundColor: '#f5f8fa'}, 'slow' );

				$( '#url' ).val('');
			}
		);
	});

	$( '.table' ).on( 'mouseover', 'tr', function(){
		$(this).find('.copy').show();
	}).on( 'mouseleave', 'tr', function(){
		$(this).find('.copy').hide();
	});

});
//# sourceMappingURL=scripts.js.map
