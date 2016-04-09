<?

$server = "localhost";
$user = "root";
$password = "123456";
$dbName = "codeigniter";

$conn = mysql_connect($server,$user,$password, $dbName)
	or die("There was a problem connecting to MySQL. Please try again later.");
	
		if (!@mysql_select_db($dbName, $conn))
		{
			die ("There was a problem connecting to the database. Please try again later.");
		}
		return $conn;
	//@mysql_query("SET NAMES utf8");
?>