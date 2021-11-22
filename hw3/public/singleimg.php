<?php
//echo 'hello';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once dirname(__DIR__) . '/vendor/autoload.php';
$img_id=$_GET["img_id"] ?? null;


if($img_id && is_numeric($img_id)){
    try {
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,];
        $dbh = new PDO('mysql:dbname=gallery;host=172.23.160.1', 'php_gallery', 'MySecurePassword!', $opt);
      } catch (PDOException $e) {
        echo "Error: Could not connect. " . $e->getMessage();
      }
    //$db = mysqli_connect("172.23.160.1", "php_gallery","MySecurePassword!","gallery",3306);    
    $sth = $dbh->query("SELECT * FROM images WHERE id=$img_id ORDER BY id");

    try {
    $loader = new FilesystemLoader(dirname(__DIR__).'/templates');
    $twig = new Environment($loader,
    //  [
    //     'cache' => dirname(__DIR__).'/cache',
    // ]
    );
    echo $twig->render('gallery/singleimg.twig',[
        'title'=> 'My first template',
        'year'=> date('Y'),
        'image'=> $sth->fetch(),
    ]);
    }catch (Exception $e) {
        die ('ERROR: ' . $e->getMessage());
    }
    unset($dbh);
}