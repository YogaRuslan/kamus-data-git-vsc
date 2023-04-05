<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_apps']))
{
    $apps_id = mysqli_real_escape_string($con, $_POST['delete_apps']);

    $query = "DELETE FROM applications WHERE id='$apps_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Applications Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Applications Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_apps']))
{
    $apps_id = mysqli_real_escape_string($con, $_POST['apps_id']);

    $name = mysqli_real_escape_string($con, $_POST['AppsName']);
    $desc = mysqli_real_escape_string($con, $_POST['AppsDesc']);
    $datecreated = mysqli_real_escape_string($con, $_POST['AppsDateCreated']);

    $query = "UPDATE applications SET AppsName='$name', AppsDesc='$desc', AppsDateAppsCreated='$datecreated' WHERE id='$apps_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Applications Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Applications Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_apps']))
{
    $name = mysqli_real_escape_string($con, $_POST['AppsName']);
    $desc = mysqli_real_escape_string($con, $_POST['AppsDesc']);
    $datecreated = mysqli_real_escape_string($con, $_POST['AppsDateCreated']);

    $query = "INSERT INTO applications (AppsName, AppsDesc, AppsDateCreated) VALUES ('$name','$desc','$datecreated')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Applications Created Successfully";
        header("Location: apps-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Applications Not Created";
        header("Location: apps-create.php");
        exit(0);
    }
}

?>