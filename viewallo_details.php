<html>
<head>

<style>
*{margin:0%;}

body{background:#425298;}
h1{text-align:center;color:#fff;background:#400040;border-radius:4px;border:2px solid #fff;margin-top:50px;}


table{width:90%;height:auto;margin-left:30px;border-radius:10px;margin-top:5px;background:#fff;}
table,th,tr,td{border-collapse:collapse;border:1px solid #400040;padding:5px;}
table td{text-align:center;font-size:20px;color:#400040;}
table th{font-size:23px;color:#400040;}
img{width:50px;height:50px;}
</style>
</head>
<body>
<?php include("menubaradmin.php")?>

	<h1>View All Order Details</h1>
    <table>
<tr>
<th>Serial No</th>
	<th>order_id</th>
	<th>pet_id</th>
	<th>quantity</th>
	<th>user_id</th>
    <th>order_placed</th>
	

</tr>
	
	
<?php
			include("db.php");
            
			
			
				$query=$con->prepare("CALL `getorder_placed`();");
			
				$query->execute();
               
                $i=1;
			while( $orderD=$query->fetch()):
			
			echo"<tr><td>".$i++."</td>
			
			
				<td>'".$orderD['order_id']."'</td>
			<td>'".$orderD['pet_id']."'</td>
			<td>'".$orderD['qty']."'</td>
			<td>'".$orderD['user_id']."'</td>
			<td>'".$orderD['order_date']."'</td>
			
			
			
			</tr>";
        endwhile;
		 




?>
</table>
</body>
</html>