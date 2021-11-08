<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>About forums</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>
    

    <div class="container mb-4">
        <div class="p-4 p-md-5 my-4 text-white rounded-2 bg-dark">
            <div class="col-md-9 px-0">
                <h1 class="display-4 fst-italic">About our Techies</h1>
                <p class="lead my-3">
                    An Internet forum, or message board, is an online discussion site where people can hold
                    conversations in the form of posted messages.[1] They differ from chat rooms in that messages are
                    often longer than one line of text, and are at least temporarily archived. Also, depending on the
                    access level of a user or the forum set-up, a posted message might need to be approved by a
                    moderator before it becomes publicly visible.

                    Forums have a specific set of jargon associated with them; example: a single conversation is called
                    a "thread", or topic.

                    A discussion forum is hierarchical or tree-like in structure: a forum can contain a number of
                    subforums, each of which may have several topics. Within a forum's topic, each new discussion
                    started is called a thread and can be replied to by as many people as so wish.

                    Depending on the forum's settings, users can be anonymous or have to register with the forum and
                    then subsequently log in to post messages. On most forums, users do not have to log in to read
                    existing messages.
                  
                </p>
                <p class="lead mb-0"><a target="_blank" href="https://en.wikipedia.org/wiki/Internet_forum"
                        class="text-white fw-bold">Continue reading...</a></p>
            </div>
        </div>
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