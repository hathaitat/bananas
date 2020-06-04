<?php
include("./includes/header.html");

if (isset($_GET['id'])){
	
	include("./includes/database.php");
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "select * from performance WHERE productionfk=".$_GET['id']."";
	$q = $pdo->prepare($sql);
	$q->execute();
	$rows = $q->fetchAll();

	$sql = "select productionimage,detail from production WHERE productionid=".$_GET['id']."";
	$q = $pdo->prepare($sql);
	$q->execute();
	$image = $q->fetch();
	Database::disconnect();

	?><br><h1 style="text-align:center;font-size:40px; font-weight:300; color:#d9534f;background:#FDE63C; width: 100%; font-family:Arial, Helvetica, sans-serif"><?php echo$_GET['name']; ?></h1><br>
	<span style=" font-size:30px; font-weight:300; color: black; padding-left:20px">Performances:</span><br><br> 
	<!-- <div class = "row"> -->
	
	<div style="text-align:center ;background:#FDE63C">
		<br>		
		<img src="<?php 	echo $image['productionimage'];?>" style="width:50%; height:auto ;align:center"><br><br><br>
		<div style="text-align:center ;color:#d9534f;font-size:15px;font-family:Arial, Helvetica, sans-serif"><p3 ><?php echo $image['detail'];?></p3></div><br><br>
	</div><br><br>
	<div class="container" >		
<div class="row">		 
	<?php
	foreach ($rows as $f){
		?><div class="col-sm-6 col-md-4">

<div class="thumbnail" style="background:#FDE63C ;font-size:20px">
			<center>
				<br>
				<img src="<?php 	echo $image['productionimage'];?>" style="width:40%; height:auto; margin-bottom:5px"><br>
				<div class="caption"><h3 style="font-size:20px;font-family:Arial, Helvetica, sans-serif"><?php echo date("l jS \of F Y", strtotime($f['performancedate']));?></h3>
				<h3 style="font-size:20px;font-family:Arial, Helvetica, sans-serif">18:00pm</h3>
				<p class="btn btn-danger ; font-family:Arial, Helvetica, sans-serif" role="button"  style="font-size:10px">
				<a href="./seatselection.php?id=<?php echo $f['id'] ?>&performanceid=<?php echo $f['performanceid']?>" style="color:#FDFEFE; font-size:18px">Select seat</a></p>
				<br>
				</center
		</div></div></div><?php 
} }?></div></div>



<br><br>
</div>
</body>
</html>