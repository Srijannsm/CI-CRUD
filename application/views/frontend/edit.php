<div class="container">
	<div class="row">
		<div class="col-md-12 mt-4">
			<div class="card">
				<div class="card-header">
					<h5>
						Edit Product
						<a href="<?= base_url('welcome') ?>" class="btn btn-success float-right btn-sm ml-2">
							Home
						</a>
						<a href="<?= base_url('products/index') ?>" class="btn btn-danger float-right btn-sm">
							Back
						</a>
					</h5>
				</div>
				<div class="card-body">
					<form method="POST" action="<?= base_url('products/update/'.$product->id) ?>" enctype="multipart/form-data">
						<div class="form-group">
							<label for="name">Product Name</label>
							<input type="text" name="product_name" value="<?= $product->product_name ?>" class="form-control">
							<small><?php echo form_error('product_name'); ?></small>
						</div>
						<div class="form-group">
							<label for="name">Description</label>
							<input type="text" name="product_desc" value="<?= $product->product_desc ?>" class="form-control">
							<small><?php echo form_error('product_desc'); ?></small>
						</div>
						<div class="form-group">
							<label for="Price">Price</label>
							<input type="num" name="price" value="<?= $product->price ?>" class="form-control">
							<small><?php echo form_error('price'); ?></small>
						</div>
						<div class="form-group">
							<label for="file">Product Image:</label><br>
							<?php if ($product->product_img) : ?>
								<!-- Display the currently uploaded file name -->
								<p>Current File: <img src="<?=base_url('images/products/'.$product->product_img)?>" height="60px" width="100px"></p>
							<?php endif; ?>
							<input type="file" name="product_img" value="17006481378521_png_860.png">
							<small><?php echo form_error('product_img'); ?></small>
						</div>

						<button type="submit" class="btn btn-primary">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
