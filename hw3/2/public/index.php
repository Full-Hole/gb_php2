<?php
//echo 'hello';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once dirname(__DIR__) . '/vendor/autoload.php';

try {
$loader = new FilesystemLoader(dirname(__DIR__).'/templates');
$twig = new Environment($loader,
//  [
//     'cache' => dirname(__DIR__).'/cache',
// ]
);


try {
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,];
    $dbh = new PDO('mysql:dbname=gallery;host=172.25.224.1', 'php_gallery', 'MySecurePassword!', $opt);
  } catch (PDOException $e) {
    echo "Error: Could not connect. " . $e->getMessage();
  }
//$db = mysqli_connect("172.23.160.1", "php_gallery","MySecurePassword!","gallery",3306);

$sth = $dbh->query("SELECT * FROM images ORDER BY id");





echo $twig->render('gallery/index.twig',[
    'title'=> 'My first template',
    'year'=> date('Y'),
    'gallery'=> $sth->fetchAll(),
]);
}catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
  }

unset($dbh);