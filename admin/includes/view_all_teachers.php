<?php
$query = "SELECT * FROM teachers";
$result = mysqli_query($connection, $query);

?>

<div class="container">
    <h1 class="display-4">Teachers Talbe</h1>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Address</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php while($row=mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td><?= $row['id'];?></td>
                        <td><?= $row['name'];?></td>
                        <td><?= $row['phone'];?></td>
                        <td><?= $row['role'];?></td>
                        <td><?= $row['address'];?></td>
                        <td><a href="teachers/<?php echo $row['id'];?>">Edit</a></td>
                        <td><a href="teachers.php?show=delete_teacher">Delete</a></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>