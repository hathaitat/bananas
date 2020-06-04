<?php
	include("./includes/header.html");
	include("./includes/database.php");
	
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM production ORDER BY productionid ";
	$q = $pdo->prepare($sql);
	$q->execute();
	$rows = $q->fetchAll();
	Database::disconnect();	
	
	?><br>
	<div class="container text-center" >
	<div class="row">
		<div class="col-sm-12" style="Arial, Helvetica, sans-serif">
	<p style="text-align:center;font-size:40px; font-weight:300; color:#d9534f;background:#FDE63C; width: 100%">Latest Productions</p> <br><br>
	</div>
</div>
</div>
	<div class="container" >		
<div class="row">
	<?php

	foreach ($rows as $f) {
	?>
	<div class="col-sm-6 col-md-4">

<div class="thumbnail" style="background:#FDE63C ;font-size:20px">
		<center>
			<br>
                <a href="./performances.php?id=<?php echo $f['productionid'] ?>&name=<?php echo $f['productionname']?>"><img src="<?php echo $f['productionimage'];?>" style="width:40%; height:auto; margin-bottom:5px"></a><br><br>
				<div class="caption" style="font-family:Arial, Helvetica, sans-serif"><h3><?php echo $f['productionname'];?></h3>		
                    <h3 style="font-size:20px; font-family:Arial, Helvetica, sans-serif">Price: ฿<?php echo $f['productionprice'];?></h3>
			        <p class="btn btn-danger ; font-family:Arial, Helvetica, sans-serif" role="button"  style="font-size:10px">
					<a href="./performances.php?id=<?php echo $f['productionid'] ?>&name=<?php echo $f['productionname']?>" style="color:#FDFEFE; font-size:18px">View Performances</a></p>
			</div>
			<br>
		</center>
		 </div>
	</div>
<?php
	}?></div></div>
	

</body>
</html>