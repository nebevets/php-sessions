console.log('main.js running, buddy...');

async function getAllProducts(){
  const resp = await fetch('get_all_products.php');
  const products = await resp.json();
  console.log('get all products result: ', products);
}

async function addProduct(name, cost, type='cupcakes'){
  const data = new URLSearchParams();
  data.append('name', name);
  data.append('cost', cost);
  const config = {
    method: 'post',
    body: data,
  }
  const resp = await fetch(`add_product.php?product_type=${type}`, config);
  const result = await resp.json();
  console.log('add products result: ', result);
}

async function getProduct(product_id, type='cupcakes'){
  const data = new URLSearchParams();
  data.append('product_id', product_id);
  const config = {
    method: 'post',
    body: data,
  }
  const resp = await fetch(`get_product.php?product_type=${type}`, config);
  const result = await resp.json();
  console.log('add products result: ', result);
}

getAllProducts();
// addProduct('test fetch', 200);
getProduct('1560019845');