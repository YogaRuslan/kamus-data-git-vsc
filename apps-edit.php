<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Applications Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Applications Edit 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['AppsId']))
                        {
                            $apps_id = mysqli_real_escape_string($con, $_GET['AppsId']);
                            $query = "SELECT * FROM applications WHERE id='$apps_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $apps = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="apps_id" value="<?= $apps['AppsId']; ?>">

                                    <div class="mb-3">
                                        <label>NAME</label>
                                        <input type="name" name="name" value="<?=$apps['AppsName'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>DESCRIPTION</label>
                                        <input type="text" name="description" value="<?=$apps['AppsDesc'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>DATE CREATED</label>
                                        <input type="date" name="datecreated" value="<?=$apps['AppsDateCreated'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_apps" class="btn btn-primary">
                                            Update Applications
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
