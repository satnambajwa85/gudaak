<?php
$con=mysqli_connect("localhost","root","","testing");
// Check connection
if (mysqli_connect_errno())
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
$row = 1;
echo '<pre>';
if (($handle = fopen("test2.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle)) !== FALSE) {
        $num = count($data);
		if($num==9){
			$instituteName	=	$data[0];
			$spec	=	$data[1];
			$degree	=	$data[2];
			$desc	=	$data[3];
			$admis	=	$data[4];
			$enter	=	$data[5];
			$mode	=	$data[6];
			$fee	=	$data[7];
			$seat	=	$data[8];
			$date	=	date('Y-m-d');
			$query	=	"Select * from institutes where name = '".$instituteName."'";
			$result	=	mysqli_query($con,$query);
			$num_rows = mysqli_num_rows($result);
			if($num_rows==0){
				echo "Error in ".$instituteName;
			}
			else{
				while($row = mysqli_fetch_array($result)){
					$institute= $row['id'];
				}
			}
			//echo $institute;
			$query2		=	"Select * from interests where title = '".$spec."'";
			$result2	=	mysqli_query($con,$query2);
			$num_rows2 = mysqli_num_rows($result2);
			if($num_rows2==0){
				$uert	=	'INSERT INTO interests (title, description,published,status,add_date)VALUES ("'.$spec.'","'.$desc.'",1,1,"'.$date.'")';
				mysqli_query($con,$uert);
				$instiId	=	mysqli_insert_id($con);
			}else{
				while($row2		=	mysqli_fetch_array($result2)){
					$instiId	=	$row2['id'];
				}
			}
			
			
			$query2	=	"Select * from courses where title = '".$degree."'";
			$result2	=	mysqli_query($con,$query2);
			$num_rows2 = mysqli_num_rows($result2);
			if($num_rows2==0 && isset($instiId) && isset($institute)){
				$uert	=	'INSERT INTO courses (title,description,published,status,add_date,interests_id) VALUES ("'.$degree.'","'.$desc.'",1,1,"'.$date.'",'.$instiId.')';
				mysqli_query($con,$uert);
				$coursesId	=	mysqli_insert_id($con);
				
				$uert12	=	'INSERT INTO institutes_has_courses (institutes_id,courses_id,published,status,add_date,description) VALUES ("'.$institute.'","'.$coursesId.'",1,1,"'.$date.'","'.$desc.'")';
				mysqli_query($con,$uert12);
			}
			else{
				echo 'degree: '.$degree.' of collage '.$instituteName;
			}
		}
		else{
			echo "<p> $num fields in line $row: not added due to inproper data <br /></p>\n";
        	for ($c=0; $c < $num; $c++) {
        	    echo $data[$c] . "<br />\n";
        	}
		
		}
		$row++;
	}
    fclose($handle);
}

mysqli_close($con);
die;

?>
