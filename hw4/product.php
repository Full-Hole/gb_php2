<?php
//require("../php/dbconn.php");
$db = mysqli_connect("172.23.160.1", "php_gallery","MySecurePassword!","gallery",3306);
if(!$db){
    die('DB not foind');
}

$data = '';
//$db=null;
 $row = date("H:i:s");
if (!empty($_GET)) {
  if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
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
mysqli_close($db);
header('Content-Type: application/json; charset=utf-8');
echo $data;

// function moreProducts(mysqli $db=null){

// };


function getProduct(mysqli $db=null, $start, int $lim=4)
{
    if($db){
  $db_con= mysqli_query($db, "SELECT id, name, src, price FROM product WHERE id > $start AND is_deleted != 1 ORDER BY id LIMIT $lim ");
  $product_list = mysqli_fetch_all($db_con,MYSQLI_ASSOC);
  return getProductList($product_list);
}
  //file_put_contents("test_prod.txt", $prod_json);
  return '[
    {
      "id": 1,
      "name": "T-SHIRT with print",
      "price": 50,
      "src": "img/f-item1.jpg"
    },
    {
      "id": 2,
      "name": "Red Something",
      "price": 183,
      "src": "img/f-item2.jpg"
    },
    {
      "id": 3,
      "name": "DarkBlue Something",
      "price": 465,
      "src": "img/f-item3.jpg"
    },
    {
      "id": 4,
      "name": "Something with flowers",
      "price": 317,
      "src": "img/f-item4.jpg"
    },
    {
      "id": 5,
      "name": "Strange Something",
      "price": 230,
      "src": "img/f-item5.jpg"
    },
    {
      "id": 6,
      "name": "Fancy Dude",
      "price": 2000,
      "src": "img/f-item6.jpg"
    },
    {
      "id": 7,
      "name": "Body without head",
      "price": 599,
      "src": "img/f-item7.jpg"
    },
    {
      "id": 8,
      "name": "another fancy dude",
      "price": 3000,
      "src": "img/f-item8.jpg"
    }
  ]';
}
function getProductList(array $product_list){
$prod_json = '[';
  for($i=0;$i<count($product_list); $i++ ){
    $prod_json .= '
    {
      "id": '.$product_list[$i]["id"].',
      "name": "'.$product_list[$i]["name"].'",
      "price": '.$product_list[$i]["price"].',
      "src": "'.$product_list[$i]["src"].'"
    },';
  }
  return  substr_replace($prod_json, ']', -1);

}