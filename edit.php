<?php include 'db.php'; ?>
<?php
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  $stmt = $conn->prepare("UPDATE users SET name=?, email=?, phone=? WHERE id=?");
  $stmt->bind_param("sssi", $name, $email, $phone, $id);
  $stmt->execute();
  $stmt->close();

  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit User</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }
    form {
      max-width: 400px;
      margin: auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    input[type="text"], input[type="email"], input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    input[type="submit"] {
      background-color: #007bff;
      color: white;
      border: none;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <form method="POST">
    <h2>Edit User</h2>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?= $user['name'] ?>" required>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?= $user['email'] ?>" required>
    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" value="<?= $user['phone'] ?>" required>
    <input type="submit" value="Update">
  </form>
</body>
</html>
