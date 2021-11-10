<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if (empty($_GET['country']) && empty($_GET['context'])){
  $stmt = $conn->query("SELECT * FROM countries");
}
elseif (isset($_GET['country']) && empty($_GET['context'])){
  $query = "SELECT * FROM countries WHERE name like '%".$_GET['country']."%'";
  echo $query;
  $stmt = $conn->query($query);
}
elseif (isset($_GET['country']) && isset($_GET['context'])){
  $query = "SELECT * FROM countries WHERE name like '%".$_GET['country']."%'";
  echo $query;
  $stmt = $conn->query($query);
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>
