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
  <h1>PHP | File Operations and Endpoints</h1>

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
  <?php if(!empty($_GET['msg'])): ?>
    <p style="color:green"><?= $_GET['msg'] ?></p>
  <?php endif; ?>
  <?php if(!empty($_GET['error'])): ?>
    <p style="color:red"><?= $_GET['error'] ?></p>
  <?php endif; ?>
  </form>
</body>
  <script src="assets/main.js"></script>
</html>