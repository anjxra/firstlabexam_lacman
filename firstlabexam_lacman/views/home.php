<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: ../index.php");
  exit;
}

include "../db.php";
$result = mysqli_query($conn, "SELECT * FROM students ORDER BY id DESC");
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Student Records</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="wrap">
  <div class="box">
    <div class="topbar">
      <h1 style="margin:0;">Student Records</h1>
      <div>
        <a href="create_student.php">Add Student</a> |
        <a href="../logout.php">Logout</a>
      </div>
    </div>

    <table border="1" cellpadding="10" cellspacing="0" style="width:100%;border-collapse:collapse;">
      <tr>
        <th style="text-align:left;">ID No.</th>
        <th style="text-align:left;">Name</th>
        <th style="text-align:left;">Email</th>
        <th style="text-align:left;">Course</th>
        <th style="text-align:left;">Action</th>
      </tr>

      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td><?php echo $row['id_number']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['course']; ?></td>
          <td class="actions">
            <a href="edit_student.php?id=<?php echo $row['id']; ?>" style="text-decoration: underline;">Edit</a> 
            <a href="delete_student.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this record?')" style="text-decoration: underline;">Delete</a>
          </td>
        </tr>
      <?php } ?>
    </table>

  </div>
</div>
</body>
</html>