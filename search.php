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

    
    
    <!-- Search results  -->
    <div class="container my-4" style="min-height:490px">
        <div class="container">
            <h2 class="text-center">Search results for:<em><b> <?php echo $_GET['search']?></b></em></h2>
            <hr>
            <?php
            $query = $_GET["search"];
                    $sql = "select * from threads where match (thread_title,thread_desc) against ('$query') ";
                    $result1 = mysqli_query($conn, $sql);
                    $noResult = true;
                    while($row = mysqli_fetch_assoc($result1)){
                        $noResult= false;
                        $id = $row['thread_id'];
                        $title = $row['thread_title'];
                        $desc = $row['thread_desc'];
                        $url = "thread.php?threadid=". $id ;
                        //display search results              
                        echo '<div class="result" style="margin:0 120px ">
                            <h4> <a href="'. $url .'" class="text-dark">'. $title .'</a></h4>
                            <p>'. $desc .'</p>
                        </div>';
                    }
                  if($noResult){
                            echo '<div class="h-100 p-5 bg-secondary text-light border rounded-3">
                                <h2 class=" mb-4"><u> No Result Found</u></h2>
                                <p>Make sure that all words spelled correctly</p>
                                 <ul>
                                   <li> Try different keywords</li>
                                   <li> Try more general keywords</li>
                                   </ul>

                            </div>';
                  }

   ?>
            
        </div>
    </div>



    <?php  include 'partials/_footer.php'; ?>
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