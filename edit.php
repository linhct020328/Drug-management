<?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "ql_thuoc";

      $conn = new mysqli($servername, $username, $password, $dbname);

  $id = isset($_GET['id']) ? $_GET['id'] : '';
    if ($id){
        $data = get_by_sv($id);
    }

    if(!$data){
      header("location: show.php");
    }
    function get_by_sv($maThuoc){
      //$GLOBALS["somevar"];

      if($GLOBALS["conn"] -> connect_error){
      die("Connection failed:".$GLOBALS["conn"]->connect_error);
      }
      // Câu truy vấn lấy tất cả sinh viên
      $sql = "SELECT * FROM thuoc where maThuoc = '$maThuoc'";

      // Thực hiện câu truy vấn
      $query = mysqli_query($GLOBALS["conn"], $sql);

      // Mảng chứa kết quả
      $result = array();

      // Nếu có kết quả thì đưa vào biến $result
      if (mysqli_num_rows($query) > 0){
          $row = mysqli_fetch_assoc($query);
          $result = $row;
      }

      // Trả kết quả về
      return $result;
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

        $sql = "UPDATE thuoc SET tenThuoc = '$tenThuoc', ngayHetHan = '$ngayHetHan', nhomThuoc = '$nhomThuoc', soLuong = '$soLuong', ghiChu = '$ghiChu'  WHERE maThuoc = '$id'";

        if($GLOBALS["conn"]->query($sql) === TRUE){
            header("location: show.php");
            //echo "New recode created successfully";
        }else{
            echo "Error:".$sql."<br>".$conn->error;
        }
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Thuốc</title>
    <link rel="stylesheet" type="text/css" href="add.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Edit Thuốc</h2>
        </div>

        <a href="show.php">Trở về</a> <br/> <br/>

        <?php
        if (!empty($_POST['Submit1'])){
          $data['tenThuoc']        = isset($_POST['tenThuoc']) ? $_POST['tenThuoc'] : '';
          $data['ngayHetHan']        = isset($_POST['ngayHetHan']) ? $_POST['ngayHetHan'] : '';
          $data['nhomThuoc']        = isset($_POST['nhomThuoc']) ? $_POST['nhomThuoc'] : '';
          $data['soLuong']        = isset($_POST['soLuong']) ? $_POST['soLuong'] : '';
          $data['ghiChu']        = isset($_POST['ghiChu']) ? $_POST['ghiChu'] : '';
        }
        ?>

        <form action="edit.php?id=<?php echo $id; ?>" method = "post" id="form" class="form">
            <div class="form-control">
              <label for="username">Tên thuốc:</label>
              <input type="text" name="tenThuoc" id ="tenThuoc" value="<?php echo $data['tenThuoc']; ?>"/>
              <i class="fas fa-check-circle"></i>
      				<i class="fas fa-exclamation-circle"></i>
          			<small>Error message</small>
            </div>

            <div class="form-control">
              <label for="username">Ngày hết hạn:</label>
              <input type="date" name="ngayHetHan" id="ngayHetHan" value="<?php echo $data['ngayHetHan']; ?>"/>
              <i class="fas fa-check-circle"></i>
      				<i class="fas fa-exclamation-circle"></i>
          			<small>Error message</small>
            </div>

            <div class="form-control">
              <label for="username">Nhóm thuốc</label>
              <select id='nhomThuoc' name="nhomThuoc">
                  <option  id='id1'><?php echo $data['nhomThuoc']; ?></option>
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
              <input type="number" name="soLuong" id="soLuong" value="<?php echo $data['soLuong']; ?>"/>
              <i class="fas fa-check-circle"></i>
      				<i class="fas fa-exclamation-circle"></i>
          			<small>Error message</small>
            </div>

            <div class="form-control">
              <label for="username">Mote</label>
              <input type="text" name="ghiChu" id="ghiChu" value="<?php echo $data['ghiChu']; ?>"/>
              <i class="fas fa-check-circle"></i>
      				<i class="fas fa-exclamation-circle"></i>
          			<small>Error message</small>
            </div>

            <button type="submit" name="Submit1">Update</button>
        </form>
    </div>
</body>
<script src="index.js"></script>
</html>
