<?php include('connection.php');?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Upload</title>
<h1 align="center"><font color="#FF0000">Admin Panel</font></h1>
</head>

<body>
<?php  include('menu.php')?>
    <form action="" method="post" enctype="multipart/form-data" >
        <table align="center" >
            <tr>
                <td><h1>Title :
                <input type="text" name="title" placeholder="Enter your title here....."></h1></td>
            </tr>
            <tr>
                <td><h1>Content :
                <textarea name="content"  placeholder="Enter your news"></textarea></h1></td>
            </tr>
            <tr>
                <td><input type="file" name="file"></td>
            </tr>
            <tr>
                <td><input type="submit" name="subMit" value="Upload">
                <input type="reset" name="reset" value="Cancel"></td>
            </tr>
        </table>
    </form>
    <?php 
if(isset($_POST['subMit'])){
	#normal text data
    $title=$_POST['title'];
    $content=$_POST['content'];
	#file information
    $file_name=$_FILES['file']['name'];
    $file_type=$_FILES['file']['type'];
	$file_size=$_FILES['file']['size'];
	# check if file size exceed approx 2 mb
	if($file_size>2000000){
		echo "<h3 style='color:red'>File Size exceeding....!please upload a file less than 2 mb</h3>";
		}else{
			#file size is ok
			#now check the file type
			if($file_type=="image/png" or $file_type=="image/jpg" or $file_type=="image/jpeg" or $file_type=="image/JPG" or $file_type=="image/PNG" or $file_type=="image/JPEG" or $file_type=="image/gif"){
				#file type is ok
				#now create destination folder /dir
				$dir="images";
				if(!file_exists($dir)){
					#if dir with name 'images' does not exists than a folder using mkdir function
					mkdir($dir);
					}
                #custom creation of the destination folder where the file will get saved under C:/wamp/www/fileuploading/images/......
        
		$destination_path=$dir.'/'.rand(0000,9999).'_'.$file_name;
		#upload the file from sourse to destination
		$upload=move_uploaded_file($_FILES['file']['tmp_name'],$destination_path) or die($_FILES['file']['error']);
		# the above funtion is inbuilt and it will basically move the copy file(tmp) to the destination folder
		#after upload done
		#save the information db table
		#echo "$destination_path";
		$save=mysqli_query($connect,"INSERT INTO news VALUE('0','$title','$content','$destination_path')") or die(mysqli_error($connect));
		# if save return 1 the data is saved
		if($save==1){
			echo"<h3 style='color:green'>File uploaded successfully</h3>";
			}
		}else{
			#file type is incorrect
			echo"<h3 style='color:red'>File should be image(jpg/png/gif)</h3>";
			}
			}
			
}
	?> 
</body>
</html>