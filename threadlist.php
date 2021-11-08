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
    <?php $showAlert = false;?>
    <?php  include 'partials/_header.php'; ?>
    
    <?php
       $id = $_GET['catid'];
       $sql = "SELECT * FROM `categories` WHERE category_id=$id ";
       $result = mysqli_query($conn, $sql);
       while($row = mysqli_fetch_assoc($result)){
           $catname = $row['category_name'];
           $catdesc = $row['category_description'];
        }
        ?>
    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            // insert thread into db
            $th_title = $_POST['title'];
            $th_desc = $_POST['desc'];
            $sno = $_POST['sno'];

            $th_title = str_replace("<", "&lt;", $th_title);
            $th_title = str_replace(">", "&gt;", $th_title);

            $th_desc = str_replace("<", "&lt;", $th_desc);
            $th_desc = str_replace(">", "&gt;", $th_desc);
            
            $sql = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ( '$th_title' , '$th_desc', '$id', '$sno', current_timestamp()); ";
           $result = mysqli_query($conn, $sql);
           $showAlert = true;
           if($showAlert){
               echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Successful</strong> Your query has been submitted.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
           }
        }
        
        ?>


    <div class="container my-4">
        <div class="h-100 p-5 bg-secondary text-light border rounded-3">
            <h2 class="text-center mb-4"><u>Welcome to <?php echo $catname?></u></h2>
            <p><?php echo $catdesc ?></p>

            <span class="py-3" style="color:black;">
                <p> 1. No Spam / Advertising / Self-promote in the forums. ...</p>
                <p> 2. Do not post copyright-infringing material. ... </p>
                <p> 3. Do not post “offensive” posts, links or images. ... </p>
                <p> 4. Do not cross post questions. ... </p>
                <p> 5. Do not PM users asking for help. ... </p>
                <p> 6. Remain respectful of other members at all times </p>
            </span>
            <button class="btn btn-warning" type="button">learn about it</button>
        </div>
    </div>

    <!-- form starts here  -->

    <?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo '<div class="container my-4 rounded-3" >
        <form action="'. $_SERVER["REQUEST_URI"].'" method="post"">
            <h2>Start a discussion</h2>
            <div class="form-group mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="title">
                <div id="title" class="form-text">Keep your title crispy.</div>
            </div>
            <div class="form-group mb-3 ">
                <label for="desc" class="form-label">Elaborate your problem</label>
                <div class="desc">
                    <textarea class="form-control" name="desc" id="desc"></textarea>
                    <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
                </div>
            </div>
            <button style="width:100px" type="submit" class="btn btn-success">Post</button>
            </form>
            </div>';
}
else{
         echo   '<div class="container">
                <h2>Start a discussion</h2>
                <hr>
                <h5><u>You are not logged in</u></h5>
                <p> Please log in to start a conversation.</p>
                
                </div>';
                
}
    ?>

    <div class="container">
        <h1 class="py-2">Browse Questions</h1>
        <hr>
        <?php
       $id = $_GET['catid'];
       $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id ";
       $result = mysqli_query($conn, $sql);
       $noResult = true;
       while($row = mysqli_fetch_assoc($result)){
           $noResult = false;
           $title = $row['thread_title'];
           $desc = $row['thread_desc'];
           $id = $row['thread_id'];
           $thread_time = $row['timestamp'];
           $thread_user_id = $row['thread_user_id'];
        $sql2 = "SELECT user_email FROM `users` where sno=' $thread_user_id '";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
       
       
        echo '<div class="d-flex my-3">
            <div class="flex-shrink-0">
                <img src="img/1.png" width="49px"alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
            
                <h5><a class="text-dark" href="thread.php?threadid='.$id.'">'. $title .'</a></h5>
                '. $desc .'
            </div>'.'  <p class="font-weight-bold my-0"><b><i> Asked by:</i> '. $row2['user_email']. '<i> at</i> '. $thread_time.'</b></p>'.'
        </div>';
         }

         if($noResult){
            //  echo "Be the first person to ask a question...";
             echo '<div class="progress-bar container-fluid" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><b><i>No talks yet.Be the first person to ask a question...</i></b></div>';
         }
         
        ?>
        <hr>
    </div>





    <?php  include 'partials/_footer.php'; ?>
    <style>
    span p {
        line-height: 0.8;
    }
    </style>
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