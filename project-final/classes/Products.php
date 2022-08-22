<?php
    session_start();
    require_once (__DIR__ . '/../controller/product.controller.php');
class Products
{

	private ProductController $productController;

	function __construct()
	{
         $this->productController = new ProductController();
	}

	public function getProducts(){

	}

	public function addProduct($product_name,
								$brand_id,
								$category_id,
								$product_desc,
								$product_qty,
								$product_price,
								$product_keywords,
								$file){


		$fileName = $file['name'];
		$fileNameAr= explode(".", $fileName);
		$extension = end($fileNameAr);
		$ext = strtolower($extension);

		if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {

			//print_r($file['size']);

			if ($file['size'] > (1024 * 2)) {

				$uniqueImageName = time()."_".$file['name'];
				if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/ecommerce-app-h/product_images/".$uniqueImageName)) {



					$q =  $this->productController->insertOne($product_name, $product_price, $product_price);

					if ($q) {
						return ['status'=> 202, 'message'=> 'Product Added Successfully..!'];

					}else{
						return ['status'=> 303, 'message'=> 'Failed to run query'];
					}

				}else{
					return ['status'=> 303, 'message'=> 'Failed to upload image'];
				}

			}else{
				return ['status'=> 303, 'message'=> 'Large Image ,Max Size allowed 2MB'];
			}

		}else{
			return ['status'=> 303, 'message'=> 'Invalid Image Format [Valid Formats : jpg, jpeg, png]'];
		}

	}



	public function editProductWithoutImage($pid,
										$product_name,

										$product_price,
										){

		if ($pid != null) {
			$q = $this->productController->updateOne($product_name, $product_price, $product_price);

			if ($q) {
				return ['status'=> 202, 'message'=> 'Product updated Successfully'];
			}else{
				return ['status'=> 303, 'message'=> 'Failed to run query'];
			}

		}else{
			return ['status'=> 303, 'message'=> 'Invalid product id'];
		}

	}







	public function deleteProduct($pid = null){
		if ($pid != null) {
			$q = $this->productController->deleteOne($pid);
			if ($q) {
				return ['status'=> 202, 'message'=> 'Product removed from stocks'];
			}else{
				return ['status'=> 202, 'message'=> 'Failed to run query'];
			}

		}else{
			return ['status'=> 303, 'message'=>'Invalid product id'];
		}

	}









}


if (isset($_POST['GET_PRODUCT'])) {
	if (isset($_SESSION['admin_id'])) {
		$p = new Products();
		echo json_encode($p->getProducts());
		exit();
	}
}


if (isset($_POST['add_product'])) {

	extract($_POST);
	if (!empty($product_name)
	&& !empty($brand_id)
	&& !empty($category_id)
	&& !empty($product_desc)
	&& !empty($product_qty)
	&& !empty($product_price)
	&& !empty($product_keywords)
	&& !empty($_FILES['product_image']['name'])) {


		$p = new Products();
		$result = $p->addProduct($product_name,
								$brand_id,
								$category_id,
								$product_desc,
								$product_qty,
								$product_price,
								$product_keywords,
								$_FILES['product_image']);

		header("Content-type: application/json");
		echo json_encode($result);
		http_response_code($result['status']);
		exit();


	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Empty fields']);
		exit();
	}




}


if (isset($_POST['edit_product'])) {

	extract($_POST);
	if (!empty($pid)
	&& !empty($e_product_name)
	&& !empty($e_brand_id)
	&& !empty($e_category_id)
	&& !empty($e_product_desc)
	&& !empty($e_product_qty)
	&& !empty($e_product_price)
	&& !empty($e_product_keywords) ) {

		$p = new Products();

		if (isset($_FILES['e_product_image']['name'])
			&& !empty($_FILES['e_product_image']['name'])) {
			$result = $p->editProductWithImage($pid,
								$e_product_name,
								$e_brand_id,
								$e_category_id,
								$e_product_desc,
								$e_product_qty,
								$e_product_price,
								$e_product_keywords,
								$_FILES['e_product_image']);
		}else{
			$result = $p->editProductWithoutImage($pid,
								$e_product_name,
								$e_brand_id,
								$e_category_id,
								$e_product_desc,
								$e_product_qty,
								$e_product_price,
								$e_product_keywords);
		}

		echo json_encode($result);
		exit();


	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Empty fields']);
		exit();
	}




}

if (isset($_POST['GET_BRAND'])) {
	$p = new Products();
	echo json_encode($p->getBrands());
	exit();

}

if (isset($_POST['add_category'])) {
	if (isset($_SESSION['admin_id'])) {
		$cat_title = $_POST['cat_title'];
		if (!empty($cat_title)) {
			$p = new Products();
			echo json_encode($p->addCategory($cat_title));
		}else{
			echo json_encode(['status'=> 303, 'message'=> 'Empty fields']);
		}
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Session Error']);
	}
}

if (isset($_POST['GET_CATEGORIES'])) {
	$p = new Products();
	echo json_encode($p->getCategories());
	exit();

}

if (isset($_POST['DELETE_PRODUCT'])) {
	$p = new Products();
	if (isset($_SESSION['admin_id'])) {
		if(!empty($_POST['pid'])){
			$pid = $_POST['pid'];
			echo json_encode($p->deleteProduct($pid));
			exit();
		}else{
			echo json_encode(['status'=> 303, 'message'=> 'Invalid product id']);
			exit();
		}
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Invalid Session']);
	}


}


if (isset($_POST['DELETE_CATEGORY'])) {
	if (!empty($_POST['cid'])) {
		$p = new Products();
		echo json_encode($p->deleteCategory($_POST['cid']));
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Invalid details']);
		exit();
	}
}

if (isset($_POST['edit_category'])) {
	if (!empty($_POST['cat_id'])) {
		$p = new Products();
		echo json_encode($p->updateCategory($_POST));
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Invalid details']);
		exit();
	}
}

if (isset($_POST['add_brand'])) {
	if (isset($_SESSION['admin_id'])) {
		$brand_title = $_POST['brand_title'];
		if (!empty($brand_title)) {
			$p = new Products();
			echo json_encode($p->addBrand($brand_title));
		}else{
			echo json_encode(['status'=> 303, 'message'=> 'Empty fields']);
		}
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Session Error']);
	}
}

if (isset($_POST['DELETE_BRAND'])) {
	if (!empty($_POST['bid'])) {
		$p = new Products();
		echo json_encode($p->deleteBrand($_POST['bid']));
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Invalid details']);
		exit();
	}
}

if (isset($_POST['edit_brand'])) {
	if (!empty($_POST['brand_id'])) {
		$p = new Products();
		echo json_encode($p->updateBrand($_POST));
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Invalid details']);
		exit();
	}
}

?>