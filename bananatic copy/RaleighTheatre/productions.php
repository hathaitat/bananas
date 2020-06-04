<?php
include("./includes/header.html");
	
$var = "";
			
if(!empty($_REQUEST["ClassicalMusic"]))
{
	$var = "Classical Music";
}
else if(!empty($_REQUEST['Drama']))
{
	$var = "Drama";
}
else if(!empty($_REQUEST['Musical']))
{
	$var = "Musical";
}
else if(!empty($_REQUEST['Ballet']))
{
	$var ="Ballet";
}
else if(!empty($_REQUEST['Comedy']))
{
	$var = "Comedy";
}

include("./includes/database.php");
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * from production WHERE productiontypefk= :var";
$q = $pdo->prepare($sql);
$q->bindParam(':var', $var, PDO::PARAM_STR);
$q->execute();
$rows = $q->fetchAll();
Database::disconnect();

?>
<span style="color:#d9534f ; font-size:50px ; background:#FDE63C;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"><?php echo $var; ?></span><br><br>

<div class="row">

<?php
foreach ($rows as $f){
	?>
<div class="col-sm-6 col-md-4">

<div class="thumbnail" style="background:#FDE63C"> 
		<center>
                <a href="./performances.php?id=<?php echo $f['productionid'] ?>&name=<?php echo $f['productionname']?>"><img src="<?php echo $f['productionimage'];?>" style="width:40%; height:auto; margin-bottom:5px"></a>
			<div class="caption"><h3 style="font-size:20px;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"><?php echo $f['productionname'];?></h3>		
                           <h3 style="font-size:20px; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">฿<?php echo $f['productionprice'];?></h3>
			        <p><a href="./performances.php?id=<?php echo $f['productionid'] ?>&name=<?php echo $f['productionname']?>" style="color:#D11111; font-size:18px">View Performances</a></p>
                               </div>
		</center>
         </div>
</div>
	<?php
}?> 

</div>
</div>
<br><br>
</div>
</body>
</html>