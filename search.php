<?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "ql_thuoc";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if($conn -> connect_error){
      die("Connection failed:".$conn->connect_error);
      }


?>

<!DOCTYPE html>
<html>
<head>
	<title>Show Students</title>
  <link rel="stylesheet" type="text/css" href="show.css">

</head>
<body>

  <div class="container">
      <div class="header">
        <h2>Show Students</h2>
      </div>

      <form  action="search.php" method="POST" class="form">
          <div class="form-control">
            <input class="au-input au-input--xl" type="text" name="key" placeholder="Search for datas &amp; reports..." />
            <button class="submit" name = "search" type="submit">Search</button>
          </div>
      </form>

      <table class="table">
        <thead>
            <tr>
              <th>maThuoc</th>
              <th>Tên Thuốc</th>
              <th>Ngày hết hạn</th>
              <th>nhóm thuốc</th>
              <th>số lượng</th>
              <th>Note</th>
              <th>Edit/Delete</th>
            </tr>
        </thead>

        <tbody>
            <?php
            if(isset($_POST['search'])){
              $key = trim($_POST['key']);
              $sql = "SELECT * FROM thuoc WHERE nhomThuoc = '$key'";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) : ?>
                <tr>
                  <td><?php echo $row['maThuoc']; ?></td>
                  <td><?php echo $row['tenThuoc']; ?></td>
                  <td><?php echo $row['ngayHetHan']; ?></td>
                  <td><?php echo $row['nhomThuoc']; ?></td>
                  <td><?php echo $row['soLuong']; ?></td>
                  <td><?php echo $row['ghiChu']; ?></td>
                    <td>
                      <form method="post" action="delete.php">
                        <input onclick="window.location = 'edit.php?id=<?php echo $row['maThuoc']; ?>'" type="button" value="Sửa"/>
                        <input type="hidden" name="id" value="<?php echo $row['maThuoc']; ?>"/>
                        <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa"/>
                      </form>
                    </td>
                </tr>
            <?php endwhile;} ?>
        </tbody>
      </table>
      <button type="submit" onclick="window.location.href='./add.php'">Add</button>
    </div>
</body>
</html>
