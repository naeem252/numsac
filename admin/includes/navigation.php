<nav class="navbar  navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="#">
            <img src="images/ns_logo.png" width="50" class="rounded-circle" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/numsac/admin/index">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/numsac/admin/teachers.php">Teachers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/numsac/admin/students.php" tabindex="-1" aria-disabled="true">Students</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Add
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Add Teacher</a>
                        <a class="dropdown-item" href="#">Add Student</a>

                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">My site</a>


                </li>
                <?php
                if(!isset($_SESSION['username'])){
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="registration" tabindex="-1" aria-disabled="true">Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login" tabindex="-1" aria-disabled="true">Log in</a>
                    </li>
                <?php }?>
            </ul>
        </div>

        <div class="f-right text-white">
            <?php
            if(isset($_SESSION['username'])){

            ?>
                <script>
                    $(document).ready(function(){
                        function update() {
                            $.get("active_person.php", function(data) {
                                $("#count").html(data);
                                window.setTimeout(update, 1000);
                            });
                        }
                        update();
                    });
                </script>
                <sapn class="mr-3" id="count"> </sapn><span class="mr-3"><?php echo $_SESSION['username'];?></span>
                <a href="logout.php" class="btn btn-primary">Log Out</a>
            <?php }?>
        </div>
    </div>
</nav>