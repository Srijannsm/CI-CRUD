<div class="container">
	<div class="row">
		<div class="col-md-12 mt-4">
			<div class="card">
				<div class="card-header">
					<h5>
						Add Product
						<a href="<?= base_url('products/index') ?>" class="btn btn-danger float-right btn-sm">
							Back
						</a>
					</h5>
				</div>
				<div class="card-body">
					<form method="POST" action="<?= base_url('products/store')?>" enctype="multipart/form-data">
						<div class="form-group">
							<label for="name">Product Name</label>
							<input type="text" name="product_name" class="form-control">
							<small><?php echo form_error('product_name'); ?></small>
						</div>
						<div class="form-group">
							<label for="name">Description</label>
							<input type="text" name="product_desc" class="form-control">
							<small><?php echo form_error('product_desc'); ?></small>
						</div>
						<div class="form-group">
							<label for="Price">Price</label>
							<input type="num" name="price" class="form-control">
							<small><?php echo form_error('price'); ?></small>
						</div>
						<div class="form-group">
							<label for="file">Product Image :</label><br>
							<input type="file" name="product_img">
							<small><?php echo form_error('product_img'); ?></small>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
