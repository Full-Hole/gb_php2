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

echo $twig->render('gallery/index.twig',[
    'title'=> 'My first template',
    'year'=> date('Y'),
    'gallery'=> $gallery,
]);
}catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
  }

