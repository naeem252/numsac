<?php include "includes/header.php";?>
<?php include "includes/navigation.php";?>


<div class="container">
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Teachers Info</h3>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>Present Teachers:</li>
                        <li>Absence Teachers:</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <p class="float-left">total Teachers:</p>
                    <a href="teachers.php" class="btn btn-outline-primary text-decoration-none float-right">More Details</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Students Info</h3>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>Present Students:</li>
                        <li>Absence Students:</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <p class="float-left">total Students:</p>
                    <a href="teachers.php" class="btn btn-outline-primary text-decoration-none float-right">More Details</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center text-transform-uppercase text-danger">
                    <h4 class="text-uppercase">notice board</h4>
                </div>
                <div class="card-body">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid aspernatur, earum exercitationem facere minima nisi porro provident quisquam tenetur!
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php
    $query="SELECT * FROM active";
    $send=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($send)){
        echo $row['user_name'];
    }
    ?>

</div>

<?php include "includes/footer.php";?>