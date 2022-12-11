<?php
include 'connection.php';
?>

<table class="table table-striped text-center">
    <t>
        <th scope="col">Номер повар</th>
        <th scope="col">Имя повар</th>
        <th scope="col">Положение</th>
        <th scope="col">Зарплата</th>

        <th scope="col">Действие</th>
    </t>
    <tbody>
    <?php
    if (isset($_POST['value'])) {
        $input = $_POST['value'];
        $query = "SELECT * FROM `chefs` WHERE chef_id LIKE '%$input%' OR chef_name LIKE '%$input%' OR chef_position LIKE '%$input%'";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div>
                <tr>
                    <td><?php echo $row['chef_id'] ?></td>
                    <td><?php echo $row['chef_name'] ?></td>
                    <td><?php echo $row['chef_position'] ?></td>
                    <td><?php echo $row['chef_salary'] ?></td>
                    <td>
                        <a href="UpdateChef.php?id=<?php echo $row['chef_id'] ?>" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>

                    </td>
                </tr>
            </div>
            <?php
        }

    }
    ?>
    </tbody>
</table>


