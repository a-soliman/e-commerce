<!-- Footer -->
<footer class="text-center" id="footer">
	<p>&copy; Copyright 2016-2017</p>
	<p>Ahmed Soliman</p>
	
</footer>

<script>
	function detailsmodal(id) {
		var data = {"id" : id};
		$.ajax({
			url: 'details-modal.php',
			method: "post",
			data: data,
			success: function(data) {
				$('body').append(data);
				$('#details-1').modal('toggle');
			},
			error: function() {
				alert("Something went wrong!")
			}
		});
	}

	function update_cart(mode,edit_id,edit_size) {
		var data = {"mode" : mode, "edit_id" : edit_id, "edit_size" : edit_size};
		$.ajax ({
			url : '/admin/parsers/update_cart.php',
			method : "post",
			data : data,
			success : function() {
				location.reload();
			},
			error : function() {
				alert("Something went wrong!");
			}
		})
	}

	function add_to_cart() {
		$('#modal_errors').html("");
		var size = $('#size').val();
		var quantity = $('#quantity').val();
		var available = $('#available').val();
		
		var error = '';
		var data = $('#add_product_form').seralize();

		if (size == '' || quantity == '' || quantity == 0) {
			error += '<p class="text-danger text-center">You Must Choose a size and quantity</p>'
			$('#modal_errors').html(error)
			return;
		} else if(quantity > available) {
			error += '<p class="text-danger text-center">There are only' +available+ '</p>'
			$('#modal_errors').html(error)
			return;

		} else {
			$.ajax ({
				url : '/admin/parsers/add_cart.php',
				method : 'post',
				data : data,
				success : function() {
					location.reload();
				},
				error: function() {
					alert("Something went wrong!");
				}
			})
		}
	}
</script>