<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>



<script>
	$(document).ready(function() {
		// Initialize DataTable with custom rows
		$('#productTable').DataTable({
			"lengthMenu": [5, 10, 25, 50, 100], // Define custom rows per page
			// Add any other configurations or options here
		});
	});
	// Use event delegation to handle click events for dynamically added elements
	$(document).on('click', '.confirm-delete', function(e) {
		e.preventDefault();
		var id = $(this).val();
		// alert(id);

		confirmDialog = confirm("Are you sure about deleting the product data?");

		if (confirmDialog) {
			var id = $(this).val();

			$.ajax({
				type: "DELETE",
				url: "confirmdelete/" + id,
				success: function(response) {
					window.location.reload();
				},
				error: function(xhr, status, error) {
					console.error("XHR response:", xhr);
					console.error("Status:", status);
					console.error("Error:", error);
				}

			});
		}
	});
</script>

</body>

</html>
