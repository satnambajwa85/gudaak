<?php
$con=mysqli_connect("localhost","root","","gudaak");
// Check connection
if (mysqli_connect_errno())
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
$row = 1;
echo '<pre>';

if (($handle = fopen("test.csv", "r")) !== FALSE) {
//$theData = fgets($handle);
    while (($data = fgetcsv($handle)) !== FALSE) {
        $num = count($data);
		
		if($num==9){
			$name	=	$data[0];
			$desc	=	$data[1];
			$addr	=	$data[2];
			$sa		=	explode(',',$data[3]);
			$city	=	$sa[0];
			$state	=	$sa[1];
			$phone	=	$data[4];
			$email	=	$data[5];
			$web	=	$data[6];
			$why	=	$data[7];
			$date	=	date('Y-m-d');
			$query	=	"Select * from cities where title = '".$city."'";
			$result	=	mysqli_query($con,$query);
			$num_rows = mysqli_num_rows($result);
			if($num_rows==0){
				$query1	=	"Select * from states where title = '".$state."'";
				$result1	=	mysqli_query($con,$query1);
				$num_rows1 = mysqli_num_rows($result1);
				if($num_rows1==0){
					$resl	=	mysqli_query($con,"INSERT INTO states (title, description,status,published,add_date,countries_id) VALUES ('".$state."','added from CSV file by script',1,1,'".$date."',1)");
					$stateId	=	mysqli_insert_id($con);
				}
				else{
					while($row1 = mysqli_fetch_array($result1)){
						$stateId= $row1['id'];
					}
				}
				$res2	=	mysqli_query($con,"INSERT INTO cities (title, description,status,published,add_date,states_id) VALUES ('".$city."','added from CSV file by script',1,1,'".$date."',$stateId)");
				$cityId	=	mysqli_insert_id($con);
			}
			else{
				while($row = mysqli_fetch_array($result)){
					$cityId= $row['id'];
				}				
			}			
			
			$query2	=	"Select * from institutes where name = '".$name."'";
			$result2	=	mysqli_query($con,$query2);
			$num_rows2 = mysqli_num_rows($result2);
			if($num_rows2==0){			
				$uert	=	 'INSERT INTO institutes (name, description,overview,address1,phone_number,email,website,why,cities_id,users_count,status,add_date)VALUES ("'.$name.'","'.substr($desc,250).'","'.$desc.'","'.$addr.'","'.$phone.'","'.$email.'","'.$web.'","'.$why.'","'.$cityId.'",0,1,"'.$date.'")';
				mysqli_query($con,$uert);
				$insti	=	mysqli_insert_id($con);
			}else{
				while($row2 = mysqli_fetch_array($result2)){
					$instiId= $row2['id'];
				}
				echo $name." is already added into table ID:".$instiId.'<br><br>';
			}
			
		
		
		}
		else{
			echo "<p> $num fields in line $row: not added due to inproper data <br /></p> row: $row\n";
        	for ($c=0; $c < $num; $c++) {
        	    echo ($data[$c])?$data[$c]:'ss' . "<br />\n";
        	}
		}
		$row++;
    }
    fclose($handle);
}

mysqli_close($con);
die;

?>
