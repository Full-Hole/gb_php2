<?php
//require("../php/dbconn.php");
$data = '';
$db=null;
 $row = date("H:i:s");
if (!empty($_GET)) {
  if (isset($_GET["id"]) && !empty($_GET["id"])) {
        $data = getProduct($db, $_GET["id"]);  
        // $row .= $data . "f data\n";
        // file_put_contents("test.txt", $row, FILE_APPEND);      
        
    }
    // $row .= $_GET["id"] . " dump\n";
    // file_put_contents("test.txt", $row, FILE_APPEND);
  } else {
    $data = "{}";
    // $row .= "not set \n";
    // file_put_contents("test.txt", $row, FILE_APPEND);
    // $data = '{"result":0, "text": "nodata"}';
  }
//   $row = date("H:i:s") . var_dump($data) . " data\n";
//   file_put_contents("test.txt", $row, FILE_APPEND); 
header('Content-Type: application/json; charset=utf-8');
echo $data;

// function moreProducts(mysqli $db=null){

// };


function getProduct(mysqli $db=null, $start, int $lim=5)
{
    if($db){
  $db_con= mysqli_query($db, "SELECT id, name, img_link, price FROM products WHERE id>$start AND is_deleted != 1 AND on_stock !=0 ORDER BY id DESC LIMIT $lim ");
  $product_list = mysqli_fetch_all($db_con,MYSQLI_ASSOC);
  return getProductList($product_list);
}
  //file_put_contents("test_prod.txt", $prod_json);
  return '[
    {
      "id_product": 1,
      "product_name": "T-SHIRT with print",
      "price": 50,
      "img": "img/f-item1.jpg"
    },
    {
      "id_product": 2,
      "product_name": "Red Something",
      "price": 183,
      "img": "img/f-item2.jpg"
    },
    {
      "id_product": 3,
      "product_name": "DarkBlue Something",
      "price": 465,
      "img": "img/f-item3.jpg"
    },
    {
      "id_product": 4,
      "product_name": "Something with flowers",
      "price": 317,
      "img": "img/f-item4.jpg"
    },
    {
      "id_product": 5,
      "product_name": "Strange Something",
      "price": 230,
      "img": "img/f-item5.jpg"
    },
    {
      "id_product": 6,
      "product_name": "Fancy Dude",
      "price": 2000,
      "img": "img/f-item6.jpg"
    },
    {
      "id_product": 7,
      "product_name": "Body without head",
      "price": 599,
      "img": "img/f-item7.jpg"
    },
    {
      "id_product": 8,
      "product_name": "another fancy dude",
      "price": 3000,
      "img": "img/f-item8.jpg"
    }
  ]';
}
function getProductList(array $product_list){
$prod_json = '[';
  for($i=0;$i<count($product_list); $i++ ){
    $prod_json .= '
    {
      "id_product": '.$product_list[$i]["id"].',
      "product_name": "'.$product_list[$i]["name"].'",
      "price": '.$product_list[$i]["price"].',
      "img": "'.$product_list[$i]["img_link"].'"
    },';
  }
  return  substr_replace($prod_json, ']', -1);

}