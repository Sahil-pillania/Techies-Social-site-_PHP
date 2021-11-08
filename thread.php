<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Welcome Techies</title>
</head>

<body>

    <?php  include 'partials/_dbconnect.php'; ?>
    <?php  include 'partials/_header.php'; ?>
    <?php
       $id = $_GET['threadid'];
       $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
       $result1 = mysqli_query($conn, $sql);
       $noResult = true;
       while($row = mysqli_fetch_assoc($result1)){
           $noResult = false;
           $id = $row['thread_id'];
           $title = $row['thread_title'];
           $desc = $row['thread_desc'];
           $user_id = $row['thread_user_id'];
            // query the users table to find the name of poster
            $sql2 = "SELECT user_email FROM `users` where sno=' $user_id '";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $posted_by = $row2['user_email'];
       }
        ?>

    <?php
         $id =  $_GET['threadid'];
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            // insert thread into comment db
            $comment = $_POST['comment'];
            $comment = str_replace("<", "&lt;", $comment);
            $comment = str_replace(">", "&gt;", $comment);
            $sno = $_POST["sno"];
           $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sno', current_timestamp()) ";
           $result = mysqli_query($conn, $sql);
           $showAlert = true;
           if($showAlert){
               echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Successful</strong> Your comment has been added.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
           }
        }
    ?>


    <div class="container my-4">
        <div class="h-100 p-5 bg-secondary text-light border rounded-3">
            <h2 class=" mb-4"><u> <?php echo $title ?></u></h2>
            <p><?php echo $desc ?></p>

            <p>Posted by: <b><?php echo $posted_by = $row2['user_email'];?></b></p>
        </div>
    </div>


<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo '<div class="container" style="min-height:400px;">
        <h1 class="py-2">Post a comment</h1><hr>
        <div class="container my-4 rounded-3">
            <form action="'.$_SERVER["REQUEST_URI"].'" method="post">
        <div class=" form-group mb-3 ">
                <label for=" desc" class="form-label">Elaborate your comment</label>
                <div class="comment">
                    <textarea class="form-control" name="comment" id="comment"></textarea>
                    <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
                </div>
        </div>
        <button style="width:160px" type="submit" class="fluid btn btn-success">Post comment</button>
        </form>
    </div>';
}
else{
         echo   '<div class="container">
                <h2>Post a comment</h2>
                <hr>
                <h5><u>You are not logged in</u></h5>
                <p> Please log in to post something.</p>
                
                </div>';
                
}
?>

    <div class="container">
        <h2>Discussions</h2>

        <?php
            $id = $_GET['threadid'];
            $sql = "SELECT * FROM `comments` WHERE thread_id=$id ";
            $result1 = mysqli_query($conn, $sql);
            $noResult = true;
            while($row = mysqli_fetch_assoc($result1)){
               
            $noResult = false;
            $content = $row['comment_content'];
            $id = $row['comment_id'];
            $comment_time = $row['comment_time'];
        // adding user name in comments section
            $comment_id = $row['comment_by'];
        $sql2 = "SELECT user_email FROM `users` where sno=' $comment_id '";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        
       
        echo '<div class="d-flex my-3">
            <div class="flex-shrink-0">
                <img src="img/1.png" width="49px"alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
            <p class="font-weight-bold my-0"><b>'. $row2['user_email']. ' <i> at</i> '. $comment_time.'</b></p>
                '. $content .'
            </div>
           </div>';
         }
         if($noResult){
            //  echo "Be the first person to ask a question...";
             echo '<div class="progress-bar container-fluid" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><b><i>Be the first person to comment...</i></b></div>';
             }
        ?>
    </div>
    </div>


    <?php  include 'partials/_footer.php'; ?>

</body>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>