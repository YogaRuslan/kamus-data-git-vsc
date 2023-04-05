<?php
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

    <title>Applications View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Applications View Details 
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
                                
                                    <div class="mb-3">
                                        <label>NAME</label>
                                        <p class="form-control">
                                            <?=$apps['AppsName'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>DESCRIPTION</label>
                                        <p class="form-control">
                                            <?=$apps['AppsDesc'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>DATE CREATED</label>
                                        <p class="form-control">
                                            <?=$apps['AppsDateCreated'];?>
                                        </p>
                                    </div>

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