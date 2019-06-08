<?php
  $output = [
    'success' => false
  ];

  if(empty($_POST['product_id'])){
    $output['errors'][] = 'no product id given';
  }else{
    $product_id = $_POST['product_id'];
  }

  if(empty($_GET['product_type'])){
    $file_name = 'cupcakes';
  }else{
    $file_name = $_GET['product_type'];
  }
  
  $products = [];
  $directory = 'products/';
  $full_path = $directory.$file_name.'.php';

  if(file_exists($full_path)){
    $file_size = filesize($full_path);
    if($file_size){
      $product_file = fopen($full_path, 'r');
      $file_contents = fread($product_file, $file_size);
      $products = json_decode($file_contents, true);
    }else{
      $output['errors'][] = "no products of type $file_name found";
    }
  }
  else{
    $output['errors'][] = "no $file_name found";
  }

  if(empty($output['errors'])){
    if(isset($products[$product_id])){
      $output['success'] = true;
      $output['product'] = $products[$product_id];
    }else{
      $output['error'] = "product id: $product_id, not found";
    }
  }

  print json_encode($output);
?>