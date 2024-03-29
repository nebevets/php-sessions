<?php
  session_start();
  $directory = 'products/';
  $output = [
    'success' => false
  ];

  if(!empty($_GET['product_type'])){
    $file_name = $_GET['product_type'];
  }else{
    $file_name = 'cupcakes';
  }

  $full_path = $directory.$file_name.'.php';

  if(!empty($_POST['name'])){
    $product_name = $_POST['name'];
  }else{
    $output['errors'][] = 'no product name supplied';
  }

  if(!empty($_POST['cost']) && is_numeric($_POST['cost'])){
    $product_cost = (int) $_POST['cost'];
  }else{
    $output['errors'][] = 'invalid product cost given';
  }

  if(empty($output['errors'])){
    $product_id = time();

    if(!file_exists($directory)){
      mkdir($directory);
    }

    $products = [];

    if(file_exists($full_path)){
      $file_size = filesize($full_path);
      if($file_size){
        $product_file = fopen($full_path, 'r');
        $file_contents = fread($product_file, $file_size);
        $products = json_decode($file_contents, true);
      }
    }

    $products[$product_id] = [
      'name' => $product_name,
      'cost' => $product_cost
    ];

    $product_file = fopen($full_path, 'w');

    fwrite($product_file, json_encode($products));

    $output['success'] = true;
    $output['message'] = "new product, $product_name, added successfully";
  }
  if($output['success']){
    $_SESSION['message'] = $output['message'];
  }else{
    $_SESSION['errors'] = $output['errors'];
  }

  header('location: index.php');
  //print json_encode($output);
?>