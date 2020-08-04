<!DOCTYPE html>
<html>
<head>
	<title>Add Students</title>
	<link rel="stylesheet" type="text/css" href="css/add.css">
</head>
<body>
	<div class="container">
		<div class="header">
			<h2>Add Thuốc</h2>
		</div>

        <a href="show.php">Trở về</a> <br/> <br/>

		<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post" id="form" class="form">
            <div class="form-control">
                <label for="username">Tên thuốc:</label>
                <input type="text" name="tenThuoc" placeholder="name" id="tenThuoc"/>
								<i class="fas fa-check-circle"></i>
								<i class="fas fa-exclamation-circle"></i>
				    			<small>Error message</small>
            </div>

            <div class="form-control">
                <label for="username">Ngày hết hạn:</label>
                <input type="date" name="ngayHetHan" placeholder="**/**/****" id="ngayHetHan"/>
								<i class="fas fa-check-circle"></i>
								<i class="fas fa-exclamation-circle"></i>
				    			<small>Error message</small>
            </div>

            <div class="form-control">
                <label for="username">Nhóm thuốc</label>
								<select id='nhomThuoc' name="nhomThuoc">
                    <option  id='id1' value="1">Chọn Nhóm</option/>
                    <option  value="1">nhóm 1</option>
                    <option  value="2">nhóm 2</option>
                    <option  value="3">nhóm 3</option>
                </select>
								<i class="fas fa-check-circle"></i>
								<i class="fas fa-exclamation-circle"></i>
				    			<small>Error message</small>
            </div>

            <div class="form-control">
                <label for="username">Số lượng</label>
                <input type="number" name="soLuong" placeholder="1" id="soLuong"/>
								<i class="fas fa-check-circle"></i>
								<i class="fas fa-exclamation-circle"></i>
				    			<small>Error message</small>
            </div>

	    		<div class="form-control">
	    			<label for="username">Note</label>
	    			<input type="text" name="ghiChu" id="ghiChu"/>
						<i class="fas fa-check-circle"></i>
						<i class="fas fa-exclamation-circle"></i>
		    			<small>Error message</small>
	    		</div>
			<button type="submit" name="Submit1">Submit</button>
		</form>
	</div>
</body>
<script src="js/index.js"></script>
</html>
<?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ql_thuoc";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if($conn -> connect_error){
  die("Connection failed:".$conn->connect_error);
  }

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["Submit1"])){
        if(isset($_POST["tenThuoc"])){
            $tenThuoc = $_POST['tenThuoc'];
        }
        if(isset($_POST["ngayHetHan"])){
            $ngayHetHan = $_POST['ngayHetHan'];
        }
        if(isset($_POST["nhomThuoc"])){
            $nhomThuoc = $_POST['nhomThuoc'];
        }
        if(isset($_POST["soLuong"])){
            $soLuong = $_POST['soLuong'];
        }
        if(isset($_POST["ghiChu"])){
            $ghiChu = $_POST['ghiChu'];
        }

        $sql = "INSERT INTO thuoc(tenThuoc, ngayHetHan, nhomThuoc, soLuong, ghiChu) VALUES('$tenThuoc', '$ngayHetHan', '$nhomThuoc', '$soLuong', '$ghiChu')";

        if($conn->query($sql) === TRUE){
					{
            header("location: show.php");
					}
            //echo "New recode created successfully";
        }else{
            echo "Error:".$sql."<br>".$conn->error;
        }

        mysqli_close($conn);
    }
  }

?>
