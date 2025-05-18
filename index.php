<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>User List</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    table, th, td {
      border: 1px solid #ccc;
    }
    th, td {
      padding: 10px;
      text-align: left;
    }
    th {
      background-color: #f8f9fa;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    a {
      text-decoration: none;
      color: #007bff;
    }
    a:hover {
      text-decoration: underline;
    }
    .add-btn {
      display: inline-block;
      margin-bottom: 10px;
      padding: 10px 15px;
      background-color: #28a745;
      color: white;
      text-decoration: none;
      border-radius: 5px;
    }
    .add-btn:hover {
      background-color: #218838;
    }
  </style>
</head>
<body>
  <h2>All Users</h2>
  <a href="add.php" class="add-btn">Add New User</a>
  <table>
    <tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Action</th></tr>
    <?php
    $result = $conn->query("SELECT * FROM users");
    while($row = $result->fetch_assoc()):
    ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= $row['name'] ?></td>
      <td><?= $row['email'] ?></td>
      <td><?= $row['phone'] ?></td>
      <td>
        <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
        <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this user?');">Delete</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
