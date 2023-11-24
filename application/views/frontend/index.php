	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-4">
				<div class="card">
					<div class="card-header">
					<?php if($this->session->flashdata('status')):?>
							<div class="alert alert-success alert-dismissible fade show">
								<span><?= $this->session->flashdata('status');?></span>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php endif;?>
						<h5>
							Products Table
							<a href="<?= base_url('products/create') ?>" class="btn btn-primary float-right">Add Products</a>
						</h5>
					</div>
					<div class="card-body">
						<table id="productTable" class="table table-bordered">
							<thead>
								<tr style="text-align: center;">
									<th>S/N</th>
									<th>Product Image</th>
									<th>Product Name</th>
									<th>Description</th>
									<th>Price</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$counter = 1; // Initialize a counter variable
								foreach ($products as $product):
								?>
								
									<tr style="text-align: center;">
										<td><?= $counter++ ?></td>
										<td><img src="<?=base_url('images/products/'.$product->product_img)?>" height="100px" width="150px" alt="Product image"></td>
										<td><?= $product->product_name ?></td>
										<td><?= $product->product_desc ?></td>
										<td><?= $product->price ?></td>
										<td>
											<a href="<?=base_url('products/edit/'.$product->id)?>" class="btn btn-success btn-md">Edit</a>
											<button type="button" class="btn btn-danger confirm-delete btn-md" value="<?= $product->id ?>" >Delete</button>





											
										
										</td>

									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
