<?
require '../../base.php';

use Michelf\MarkdownExtra;

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<?
echo MarkdownExtra::defaultTransform(file_get_contents('./README.md'));
?>
</body>
</html>