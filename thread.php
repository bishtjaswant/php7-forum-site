<!-- header  -->
<?php include_once './partials/_header.php'; ?>


<!-- navigationn   -->
<?php include_once './partials/_navbar.php'; ?>



<main class="container">
  <div class="jumbotron">


    <?php
    require_once './db/db.php';
    $sql = "SELECT * FROM `threads` WHERE `threads`.`thread_id`=:thread_id";
    $stmt = $pdo->prepare($sql);;
    $stmt->execute([":thread_id" => $_GET['thread_id']]);
    $noResult=true;
    if ( $stmt->rowCount()>0 ) {
      $noResult=false;
      
      $thread_row = $stmt->fetch();
      print_r($thread_row);
    }
    ?>

    <h1 class="display-4"><?= $thread_row["thread_title"]; ?> </h1>
    <p class="lead"> <?= $thread_row["thread_description"]; ?> </p>
    <p class="">Questioned by <strong>jaswant</strong></p>
  </div>
</main>


<section class="container">
  <h1 class="text-capitalize my-5 px-2">Comments</h1>

      <?php if($noResult):?>
        <div class="alert alert-danger" role="alert">
          <strong>Nobody has not write comment yet.!</strong>

        </div>
      <?php endif ?>


</section>


<?php include_once './partials/_footer.php'; ?>







<!-- login modal  -->
<?php include_once  './partials/_login-modal.php'  ?>
<!-- signup modal  -->
<?php include_once  './partials/_signup-modal.php'  ?>