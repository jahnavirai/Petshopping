<?php
if(isset($_GET['id']))
	{
		
			include("db.php");
			$petid=$_GET['id'];
			$query=$con->prepare("select *from petdetails where pet_id='$petid'");
			
			$query->execute();
			$row=$query->fetch();
	}
?>
<html>
<head>
<style>
#mainact{width:1000px;height:auto;background:#fffff;margin-left:160px;box-shadow:5px 5px 5px #400040;border:2px solid #400040;}

#mainact h1{text-align:center;color:#fff;background:#400040;border-radius:4px;border:2px solid #fff;}
#mainact table{margin-left:200px;}
#mainact table tr td{font-size:25px;padding:5px;font-weight:bold;}
#mainact table tr td input{font-size:20px;padding:5px;width:300px;height:40px;border-radius:4px;border:2px solid aquamarine;margin-left:50px;}

</style>


</head>
<body>
<form method="post" enctype="multipart/form-data">
<div id="mainact">
	<h1>Update Pet Details</h1>
	<table>
	<tr>
	<td>Enter Pet Name  :</td>
	<td><input type="text" name="petname" placeholder="Enter the pet breed" value="<?php echo "".$row['Breed']."";?>"></td>
	</tr>
	<tr>
	<td>Enter Pet Type  :</td>
	<td><input type="text" name="pettype" placeholder="Enter the pet category" value="<?php echo "".$row['category_id']."";?>"></td>
	</tr>
	<tr>
	<td>Enter Pet color  :</td>
	<td><input type="text" name="petcolor" placeholder="Enter the pet description" value="<?php echo "".$row['pet_description']."";?>"></td>
	</tr>
	<tr>
	<td>Enter Pet Rate  :</td>
	<td><input type="text" name="petrate" placeholder="Enter the pet Rate" value="<?php echo "".$row['pet_rate']."";?>"></td>
	</tr>
	<tr>
	
	<td>Enter Pet image1  :</td>
	<td><input type="file" name="petimg1">
	
	<img src="petphotos/<?php echo"".$row['pet_img1']."";?>" style="width:60px;height:60px;"></td>
	</tr>
	
	<tr>
	<td>Enter Pet Foods  :</td>
	<td><input type="text" name="petfoods" placeholder="Enter the pet foods" value="<?php echo "".$row['pet_foods']."";?>"></td>
	</tr>
	
	</table>
		<input type="submit" name="click" value="update details" style="margin-top:20px;margin-bottom:20px;font-size:20px;margin-left:500px;text-align:center;padding:5px;border-radius:4px;border:1px solid #400040;background:#fff;">
</div>

</form>
</body>
</html>
<?php

		if(isset($_POST['click']))
		{
		
		$petname=$_POST['petname'];
		$pettype=$_POST['pettype'];
		$petcolor=$_POST['petcolor'];
		
		$petrate=$_POST['petrate'];
		// $petfeature1=$_POST['petfeature1'];
		// $petfeature2=$_POST['petfeature2'];
		// $petkeyword=$_POST['petkeyword'];
		// $petfoods=$_POST['petfoods'];
		
		if($_FILES['petimg1']['tmp_name']=="")
			{
				
			}
			else
			{
				$petimage1=$_FILES['petimg1']['name'];
			$pet_img1_temp=$_FILES['petimg1']['tmp_name'];												
			move_uploaded_file($pet_img1_temp,"petphotos/$petimage1");	
		
				$up_img2=$con->prepare("update petdetails set pet_img1='$petimage1' where pet_id='$petid'");
			
				$up_img2->execute();
			
			}
			
			
			$petfoods=$_POST['petfoods'];
			
			$query=$con->prepare("update petdetails set Breed='$petname',category_id='$pettype',pet_description='$petcolor',pet_Rate='$petrate',pet_foods='$petfoods' where pet_id='$petid'");
			
			if($query->execute())
			{
				echo"<script>alert('update pet details')</script>";
				 echo"<script>window.open('viewallpetdetails.php','_self')</script>";
			
			}
			else
			{
				echo"<script>alert('not update pet details')</script>";
			
			}
			
			
			
			
		

		

		}
?>