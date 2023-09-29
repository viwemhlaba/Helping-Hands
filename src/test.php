<?php
include('db_test.php');
$query = "SELECT * FROM city;";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">City Name</th>
            <th scope="col">City Abbreviation</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $data) : ?>
            <tr>
                <td><?= $data['city_ID'] ?></td>
                <td><?= $data['city_name'] ?></td>
                <td><?= $data['city_abr'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>