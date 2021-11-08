<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
    label {
        font-weight: 700;
        font-size: 18px;
    }
    .container{
        display: flex;
        flex-direction: column;
        width: 60%;
    }
    body{
        background: url(img/contacts/contacts.jpg);
        background-size: cover;
        background-repeat: no-repeat;
    }
    </style>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>
    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            // insert thread into comment db
            $name = $_POST['name'];
            $email = $_POST['email'];
            $desc = $_POST['suggestion'];
            $sql = "INSERT INTO `contactus` (`name`, `email`, `suggestion`, `time`,) VALUES ('$name', '$email', '$desc', current_timestamp()); ";
            $result = mysqli_query($conn, $sql);
            $showAlert = true;
           if($showAlert){
               echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Successful</strong> Your suggestion has been submitted.Thanks for your valuable suggestion.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
           }
        }
    ?>
    <div class="container my-5 bg-success" style="border-radius:10px;">
        <form action="/techies/contact.php" method="POST">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label"></label>
                <div class="mb-3">
                    <label for="floatingTextarea"> Your Suggestions</label>
                    <textarea class="form-control" placeholder="" id="suggestion" name="suggestion"></textarea>

                </div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleck1">
                <label class="form-check-label" for="exampleCheck1">Accept terms and conditions</label>
            </div>
            <button type="submit" class="btn btn-warning my-2 ">Submit</button>
        </form>
    </div>

    <?php include 'partials/_footer.php'; ?>

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