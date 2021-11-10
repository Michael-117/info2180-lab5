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
  $stmt = $conn->query($query);
}
elseif (isset($_GET['country']) && isset($_GET['context'])){
  $query = "SELECT * FROM countries WHERE name like '%".$_GET['country']."%'";
  $stmt = $conn->query($query);
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<table>
  <tr>
    <th>
      Name
    </th>
    <th>
      Continent
    </th>
    <th>
      Independence
    </th>
    <th>
      Head of State
    </th>
  </tr>
  <?php foreach ($results as $row): ?>
    <tr>
      <td><?= $row['name']; ?></td>
      <td><?= $row['continent']; ?></td>
      <td><?= $row['independence_year']; ?></td>
      <td><?= $row['head_of_state']; ?></td>
    </tr>
  <?php endforeach; ?>
</table>
</ul>

<!-- SELECT cities.name, cities.district, cities.population FROM cities INNER JOIN countries ON cities.country_code = countries.code -->