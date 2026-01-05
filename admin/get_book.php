<?php 
require_once("includes/config.php");
if(!empty($_POST["bookname"])) {
  $bookname=$_POST["bookname"];
 
    $sql ="SELECT BookName,id FROM tblbooks WHERE (BookName=:bookname)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':bookname', $bookname, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
  foreach ($results as $result) {?>
{
echo "<span style='color:red'> Book Name Blocked </span>"."<br />";
echo "<b>Book Name-</b>" .$result->BookName;
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else {
?>


<?php  
echo htmlentities($result->BookName);
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}
 else{
  
  echo "<span style='color:red'> Invaid Book Name. Please Enter Correct Book Name .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
}


?>
