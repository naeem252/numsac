<?php
$query = "SELECT * FROM students";
$result = mysqli_query($connection, $query);

?>
<div class="container">
    <h1 class="display-4">Staduents Talbe <a href="students.php?show=add_student" class="btn btn-outline-dark ml-3">Add Student</a></h1>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Images</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Roll</th>
                    <th>Gender</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['class']; ?></td>
                        <td><img src="images/<?= $row['image']; ?>" width="100" alt="sdfs"></td>
                        <td><?= $row['address']; ?></td>
                        <td><?= $row['phone']; ?></td>
                        <td><?= $row['roll']; ?></td>
                        <td><?= $row['gender']; ?></td>
                        <td><a href="students/<?php echo $row['id'];?>">Edit</a></td>
                        <td><a href="">Delete</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>