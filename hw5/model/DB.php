<?php // в начале конфиг
class DB
{
	private static $_instance;

	private static $dsn = 'mysql:dbname=gallery;host=172.23.160.1';
	private static $user = 'php_gallery';
	private static $pass = 'MySecurePassword!';
    private static  $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
 
	/**
	 * Объект PDO.
	 */
	public static $dbh = null;
 
	/**
	 * Statement Handle.
	 */
	public static $sth = null;
 
	/**
	 * Выполняемый SQL запрос.
	 */
	public static $query = '';


 
	/**
	 * Подключение к БД.
	 */
	public static function getDbh()
	{	
       
		if (!self::$dbh) {
			try {
				self::$dbh = new PDO(
					self::$dsn, 
					self::$user, 
					self::$pass, 
					self::$opt
				);
				//self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			} catch (PDOException $e) {
				exit('Error connecting to database: ' . $e->getMessage());
			}
		}
 
		return self::$dbh; 
	}
	
	/**
	 * Закрытие соединения.
	 */
	public static function destroy()
	{	
		self::$dbh = null;
		return self::$dbh; 
	}
 
	/**
	 * Получение ошибки запроса.
	 */
	public static function getError()
	{
		$info = self::$sth->errorInfo();
		return (isset($info[2])) ? 'SQL: ' . $info[2] : null;
	}
 
	/**
	 * Возвращает структуру таблицы в виде ассоциативного массива.
	 */
	public static function getStructure($table)
	{
		$res = array();
		foreach (self::getAll("SHOW COLUMNS FROM {$table}") as $row) {
			$res[$row['Field']] = (is_null($row['Default'])) ? '' : $row['Default'];
		}
 
		return $res;
	}
 
	/**
	 * Добавление в таблицу, в случаи успеха вернет вставленный ID, иначе 0.
	 */
	public static function add($query, $param = array())
	{
		self::$sth = self::getDbh()->prepare($query);
		return (self::$sth->execute((array) $param)) ? self::getDbh()->lastInsertId() : 0;
	}
	
	/**
	 * Выполнение запроса.
	 */
	public static function set($query, $param = array())
	{
		self::$sth = self::getDbh()->prepare($query);
		return self::$sth->execute((array) $param);
	}
	
	/**
	 * Получение строки из таблицы.
	 */
	public static function getRow($query, $param = array())
	{
		self::$sth = self::getDbh()->prepare($query);
		self::$sth->execute((array) $param);
		return self::$sth->fetch(PDO::FETCH_ASSOC);		
	}
	
	/**
	 * Получение всех строк из таблицы.
	 */
	public static function getAll($query, $param = array())
	{
		self::$sth = self::getDbh()->prepare($query);
		self::$sth->execute((array) $param);
		return self::$sth->fetchAll(PDO::FETCH_ASSOC);	
	}
	
	/**
	 * Получение значения.
	 */
	public static function getValue($query, $param = array(), $default = null)
	{
		$result = self::getRow($query, $param);
		if (!empty($result)) {
			$result = array_shift($result);
		}
 
		return (empty($result)) ? $default : $result;	
	}
	
	/**
	 * Получение столбца таблицы.
	 */
	public static function getColumn($query, $param = array())
	{
		self::$sth = self::getDbh()->prepare($query);
		self::$sth->execute((array) $param);
		return self::$sth->fetchAll(PDO::FETCH_COLUMN);	
	}
}

/*
define('DB_DRIVER','mysql');
define('DB_HOST','localhost');
define('DB_NAME','test');
define('DB_USER','root');
define('DB_PASS','');
 
try
{
	// соединяемся с базой данных
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,];
 
	$connect_str = DB_DRIVER . ':host='. DB_HOST . ';dbname=' . DB_NAME;
	$db = new PDO($connect_str,DB_USER,DB_PASS, $opt);
 
	// вставляем несколько строк в таблицу 
	
}
catch(PDOException $e)
{
	die("Error: ".$e->getMessage());
}
*/