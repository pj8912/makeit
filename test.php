<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <link rel="stylesheet" href="notes/createnotes.css">

  <link rel="stylesheet" href="notes/modal.css">
  <script src="notes/modal.js"></script>

</head>

<body>
  <nav class="navbar navbar-light bg-light p-3">
    <div>

      <span id="span" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;
      </span>
      <a class="navbar-brand ml-2 p-1" href="#"> MarkIt</a>
    </div>
  </nav>

  <?php
  if (isset($_REQUEST['bid'])) {

    $bid = $_REQUEST['bid'];
  }

  ?>
  <?php
  if (isset($_REQUEST['bid'])) {


    function getTitle()
    {
      $bid = $_REQUEST['bid'];

      include 'includes/dbh.php';
      $sql = "SELECT * from books where b_id = {$bid} ";
      $r = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($r)) {
        $title = $row['title'];
        return $title;
      }
    }

    function note_id()
    {

      $bid = $_REQUEST['bid'];
      include 'includes/dbh.php';

      // include '../includes/dbh.php';


      $sql = "SELECT * from notes where b_id = {$bid} ";
      $r = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($r)) {
        $nid = $row['n_id'];
        return $nid;
      }
    }
  }
  ?>




  <div class="wrapper">

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <h4 style="color:black" class="p-1"><?php echo getTitle(); ?>
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
        </svg>
      </h4>
      <section class="card card-body ">
        <button data-toggle="modal" data-target="#notename" id="addnote" type="button" class="ml-2 btn btn-outline-success">
          Add New Note
          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
          </svg>
        </button>
        <!-- Modal -->
        <div class="modal fade" id="notename" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="post">
                  <div class="form-group">
                    <input type="text" name="note_name" placeholder="Add Note Name">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">create note</button>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </section>
      <hr>
      <a href="#">About</a>
      <a href="#">Services</a>
      <a href="#">Clients</a>
      <a href="#">Contact</a>
    </div>

    <!-- ---------------------------------------------------------------------------------------- -->
    <div class="box1 fullnav ">

      <a class="h6 p-1" href="#"><?php echo getTitle(); ?>
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
        </svg>
      </a>
      <hr>

      <a href="cn/cn.php?bid=<?php echo $bid; ?>" class=" text-success btn btn-outline-success ">
        Add New Note
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
        </svg>
      </a>



      <hr>
      <h6 class="text-center">Notes</h6>
      <hr>

      <div class="nav flex-column  nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

        <!--  -->
        <?php
        // include '../includes/dbh.php';
      include 'includes/dbh.php';

        // $bid = $_REQUEST['bid'];
        $sql = "SELECT * from notes where b_id = '$bid'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) < 1) {
          echo '';
        }
        // <a class="text-secondary  p-1 w-100 note_click" id="note-tab" data-toggle="pill" href="#' . $row['n_id'] . '" role="tab" aria-controls="' . $row['n_id'] . '" aria-selected="true">
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<div class="card card-body" style="display:flex;flex-direction:row" >
          

          <a href="test.php?bid=' . $row['b_id'] . '&nid=' . $row['n_id'] . '&name='.$row['note_name'].'"  class="text-secondary  p-1 w-100">
          ' . $row['note_name'] . '
         </a>
        
    <a href="delteNote.php" style="margin-left:auto;padding-left:1px">
        
        
         <svg width="1.4em" height="2em" viewBox="0 0 16 16" class="bi bi-trash ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
         <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
         <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
       </svg>
         </a>
         </div><br>';
        }
        ?>
      </div>





    </div>
    <!-- on size decrement -->

    <div class="box2 card">


      <?php
      include 'includes/dbh.php';

      if (isset($_REQUEST['bid'])) {

        $bid = $_REQUEST['bid'];

        $sql = "select * from notes where b_id = '$bid' ";
        $resut = mysqli_query($conn, $sql);
        if (mysqli_num_rows($resut) < 1) {
          echo '<div class="text-center p-4">

        <h5 class="text-center">No notes available <h5>';
          echo '
          <button id="myBtn2" type="button" class="btn btn-outline-success">
        Add New Note
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
        </svg>
      </button>


      <div id="myModal2" class="modal modalx">
        <div class="modal-content m-auto  p-3 " style="width:300px;">
          <span class="closerx" style="cursor:pointer">&times;</span>
          <p>

            <form action="insert_name.php"  method="post" class="text-center">
              <h5>Add Note Names</h5>
              <div class="form-group">
                <input type="text" class="form-control" name="note_name" placeholder=" Note Name">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Create Note</button>
                <input type="hidden" name="cnx" value="' . $bid . '">
              </div>
            </form>
          </p>
        </div>

      </div>
      </div>
  ';
        } else {
          if (isset($_REQUEST['nid']) && isset($_REQUEST['name'])) {

            $nid = $_REQUEST['nid'];
            $name= htmlentities($_REQUEST['name']);
                  $sql = "SELECT * FROM notes WHERE n_id = '$nid' and note_name = '$name' ";
            
            $result = mysqli_query($conn, $sql);

              while ($row = mysqli_fetch_assoc($result)) {
                $notes = $row['notes'];
              

            echo ' 
            <div>
          <form action="notes/uploadNotes.php" method="post" enctype="multipart/form-data">
          
          <div class="form-group"> 
        <textarea cols="80"   class="form-control" name="editor2" rows="10" >
        ' . $notes . '
        </textarea>
        
        </div>
        <div class="form-group ">
          <button style="margin-right:10px;" class="btn btn-success btn-lg" type="submit" name="s-btn">
              Save notes
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-text-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
              </svg>
           </button>
           <input type ="hidden" value="' . $nid . '" name="nid">
           <input type ="hidden" value="' . $bid . '" name="bid">

           </div>

            </form>
            <div>


        ';
      }

          }
        }
      }
      ?>


      <script>
        CKEDITOR.replace('editor2', {
          height: 500,
          /* Default CKEditor 4 styles are included as well to avoid copying default styles. */
          contentsCss: [
            'http://cdn.ckeditor.com/4.15.0/full-all/contents.css',
            'https://ckeditor.com/docs/vendors/4.15.0/ckeditor/assets/css/classic.css'
          ]
        });
      </script>



    </div>

    <!-- } -->

    <!-- ?> -->


    <!-- wrapper -->

  </div>






  <script src="createnotes.js"></script>
  <script>

  </script>
  <?php include 'includes/footer.php'; ?>