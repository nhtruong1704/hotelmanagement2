<?php
include 'connection.php';
?>

<table class="table table-striped text-center">
    <t>
        <th scope="col">Номер горничная</th>
        <th scope="col">Имя горничная</th>
        <th scope="col">Зарплата</th>
        <th scope="col">Действие</th>
    </t>
    <tbody>
    <?php
    if (isset($_POST['value'])) {
        $input = $_POST['value'];
        $query = "SELECT * FROM `housekeepings` WHERE housekeeping_id LIKE '%$input%' OR housekeeping_name LIKE '%$input%' OR housekeeping_salary LIKE '%$input%'";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div>
                <tr>
                    <td><?php echo $row['housekeeping_id'] ?></td>
                    <td><?php echo $row['housekeeping_name'] ?></td>
                    <td><?php echo $row['housekeeping_salary'] ?></td>
                    <td>
                        <a href="UpdateHousekeeping.php?id=<?php echo $row['housekeeping_id'] ?>" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>

                    </td>
                </tr>
            </div>
            <?php
        }

    }
    ?>
    </tbody>
</table>


