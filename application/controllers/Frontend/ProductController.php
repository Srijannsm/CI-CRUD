<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('productModel');
	}
	public function index()
	{
		$products = new ProductModel;
		$result['products'] = $products->getProducts(); // Assuming getProducts() fetches products from the database
		// var_dump($result);
		// die();
		$this->load->view('templete/header');
		$this->load->view('frontend/index', $result); // Pass $result as an associative array
		$this->load->view('templete/footer');
	}


	public function create()
	{
		$this->load->view('templete/header');
		$this->load->view('frontend/create');
		$this->load->view('templete/footer');
	}

	public function store()
	{
		$this->form_validation->set_rules('product_name', 'Product Name', 'required');
		$this->form_validation->set_rules('product_desc', 'Description', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');

		if ($this->form_validation->run()) {

			$ori_filename = $_FILES['product_img']['name'];
			$new_name = time() . "" . str_replace('', '-', $ori_filename);
			$config = [
				'upload_path' => './images/products',
				'allowed_types' => 'gif|jpg|png',
				'file_name' => $new_name
			];

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('product_img')) {

				$imageError = array('imageError' => $this->upload->display_errors());

				$this->load->view('templete/header');
				$this->load->view('frontend/create', $imageError);
				$this->load->view('templete/footer');
			} else {
				$product_filename = $this->upload->data('file_name');

				$data = [
					'product_name' => $this->input->post('product_name'),
					'product_desc' => $this->input->post('product_desc'),
					'price' => $this->input->post('price'),
					'product_img' => $product_filename,
				];

				$product = new ProductModel;
				$res = $product->insertProduct($data);
				$this->session->set_flashdata('status', 'Product Created Successfully');
				redirect(base_url('products/index'));
			}
		} else {
			$this->create();
		}
	}

	public function edit($id)
	{
		$product = new ProductModel;
		$data['product'] =  $product->editProduct($id);

		// var_dump($data);
		// die();

		$this->load->view('templete/header');
		$this->load->view('frontend/edit', $data); // Pass $result as an associative array
		$this->load->view('templete/footer');
	}

	public function update($id)
	{
		$this->form_validation->set_rules('product_name', 'Product Name', 'required');
		$this->form_validation->set_rules('product_desc', 'Description', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');

		if ($this->form_validation->run()) {
			$data = [
				'product_name' => $this->input->post('product_name'),
				'product_desc' => $this->input->post('product_desc'),
				'price' => $this->input->post('price'),
			];

			if (!empty($_FILES['product_img']['name'])) { // Image exists
				$ori_filename = $_FILES['product_img']['name'];
				$new_name = time() . "" . str_replace('', '-', $ori_filename);
				$config = [
					'upload_path' => './images/products',
					'allowed_types' => 'gif|jpg|png',
					'file_name' => $new_name
				];

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('product_img')) {
					$imageError = array('imageError' => $this->upload->display_errors());

					$this->load->view('templete/header');
					$this->load->view('frontend/edit', $imageError);
					$this->load->view('templete/footer');
				} else {
					$product_filename = $this->upload->data('file_name');
					$data['product_img'] = $product_filename;
				}
			}

			$product = new ProductModel;
			$res = $product->updateProduct($id, $data);
			$this->session->set_flashdata('status', 'Product Updated Successfully');
			redirect(base_url('products/index'));
		} else {
			$this->create();
		}
	}


	public function delete($id)
	{
		$this->load->model('ProductModel', 'prod');
		$this->prod->deleteProduct($id);
		$this->session->set_flashdata('status', 'Product deleted successfully');

		// Instead of redirecting immediately, use a different approach
		// You can either redirect with a delay or return JSON response
		// Delayed redirect example:
		echo '<script>
	setTimeout(function() {
		window.location.href = "' . base_url('products') . '";
	}, 1000); // Redirect after 1 second (adjust as needed)
</script>';
	}
}
