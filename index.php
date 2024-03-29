<?php
  session_start();

  function print_message($message, $is_err=false){
    $color = $is_err ? 'red' : 'green';
    echo "<p style=\"color: $color\">$message</p>";
  }

  function print_error_list($list){
    foreach($list as $message){
      print_message($message, true);
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP | File Operations and Endpoints</title>
  <link href="assets/style.css" rel="stylesheet"></link>
</head>
<body>
  <h1>PHP Sessions</h1>

  <form action="add_product.php" method="POST">
  <h3>Add new product</h3>
  <div>
    <label for="name">name</label>
    <input name="name">
  </div>
  <div>
    <label for="cost">cost</label>
    <input name="cost" type="number">
  </div>
  <button>Add Item</button>
  <?php
    if(isset($_SESSION['message'])){
      print_message($_SESSION['message']);
      unset($_SESSION['message']);
    }elseif(isset($_SESSION['errors'])){
      print_error_list($_SESSION['errors']);
      unset($_SESSION['errors']);
    }
  ?>
  </form>
</body>
  <script src="assets/main.js"></script>
</html>