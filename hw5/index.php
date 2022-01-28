<?php
include_once("autoload.php");
session_start();



//site.ru/index.php?act=auth&c=User

$action = 'action_';
$action .=(isset($_GET['act'])) ? $_GET['act'] : 'index';
//echo $action;
//print_r($_GET);
switch ($_GET['c'])
{
	case 'articles':
		$controller = new C_Page();
		break;
	case 'user':
		$controller = new C_User();
		break;
	default:
		$controller = new C_Page();
}
//echo $action;
$controller->Request($action);
