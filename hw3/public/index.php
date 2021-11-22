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

$gallery =[
[
    'id'=>'1',
    'src'=>'https://picsum.photos/id/1/400/200',
],
[
    'id'=>'2',
    'src'=>'https://picsum.photos/id/2/400/200',
],
[
    'id'=>'3',
    'src'=>'https://picsum.photos/id/3/400/200',
],
[
    'id'=>'4',
    'src'=>'https://picsum.photos/id/4/400/200',
],
[
    'id'=>'5',
    'src'=>'https://picsum.photos/id/5/400/200',
],

];
try {
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,];
    $dbh = new PDO('mysql:dbname=gallery;host=172.23.160.1', 'php_gallery', 'MySecurePassword!', $opt);
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