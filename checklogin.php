<?php
  require("htmlPage2.php");
  $page = new htmlPage2();
  $page->streamTop();


?>
<html>
<head>
</head>
<body>

<?php 
if (isset($_POST["submit"]))
{
echo $_POST['name'];
}

if(empty($_POST['name']))
{
echo "name is required";
}

if(empty($_POST['password']))
{
echo "password is required";
}

?>


</body>
</html>
<?php
  $page->streamBottom();
?>