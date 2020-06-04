
<?php 
	include("./includes/header.html");
	include("./includes/database.php");
	
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM production ORDER BY productionid DESC LIMIT 2";
	$q = $pdo->prepare($sql);
	$q->execute();
	$rows = $q->fetchAll();
	Database::disconnect();
?>
<div id="carouselExampleIndicators" class="carousel slide  " data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
				  <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>

				</ol>
				<br><br>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="./images/1975.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="./images/daniel.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="./images/foals.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="./images/wonder.jpg" class="d-block w-100" alt="...">
				  </div>
				  <div class="carousel-item">
                    <img src="./images/parkinson.jpg" class="d-block w-100" alt="...">
				  </div>
				  
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div><br>
	<!-- New Performances  -->
	<div class="col-lg-12" style="margin-left:-10px ; text-align:center;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
	<h1 style="color:#d9534f ; font-size:50px ; background:#FDE63C;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Latest Productions</h1><br>
	<div class="container" >		
	<div class="row">
	<?php
	foreach ($rows as $f) {
	?>
		<div class="col-sm-6">
			<div class="thumbnail" style="background:#FDE63C">
			<center>
				<br>
                <a href="./performances.php?id=<?php echo $f['productionid'] ?>&name=<?php echo $f['productionname']?>"><img src="<?php echo $f['productionimage'];?>" style="width:40%; height:auto; margin-bottom:5px"></a><br><br>
				<div class="caption" >
					<h3 style="font-size:20px;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;""><?php echo $f['productionname'];?></h3>		
					<h3 style="font-size:20px; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Price: ฿<?php echo $f['productionprice'];?></h3><br>
					<p class="btn btn-danger ; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"" role="button"  style="font-size:10px">
						<a href="./performances.php?id=<?php echo $f['productionid'] ?>&name=<?php echo $f['productionname']?>" style="color:#FDFEFE  ; font-size:18px">View Performances</a>
					</p>
				</div>
				<br>
			</center>
         	</div>
		</div>
		<?php
	}
?>
	</div>
</div><br><br>
	<a class="btn btn-danger" href="latestproductions.php" role="button"  style="font-size:18px; margin-left:15px">VIEW MORE  &raquo;</a>
	<br><br><br>
</div>
            
</body>
</html>