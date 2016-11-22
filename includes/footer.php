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
</script>