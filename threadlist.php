<!-- header  -->
<?php include_once './partials/_header.php'; ?>


<!-- navigationn   -->
<?php include_once './partials/_navbar.php'; ?>



<main class="container">
  <div class="jumbotron">


    <?php
    require_once './db/db.php';
    $sql = 'SELECT `category_title`,`category_description` FROM `categories` WHERE `category_id`=:category_id';
    $stmt = $pdo->prepare($sql);;
    if (is_object($stmt)) {
      $stmt->execute([":category_id" => $_GET['category_id']]);
      $category_row = $stmt->fetch();
    }
    ?>

    <h1 class="display-4">Welcome To <?= $category_row["category_title"]; ?> forum</h1>
    <p class="lead"> <?= $category_row["category_description"]; ?> </p>
    <hr class="my-4">
    <strong>Rules</strong>
    <ul>
      <li> No Spam / Advertising / Self-promote in the forums</li>
      <li>Do not post copyright-infringing materialDo not post copyright-infringing material</li>
      <li>Do not post “offensive” posts, links or images</li>
      <li>Remain respectful of other members at all times</li>
    </ul>
  </div>
</main>


<div class="container">
 <div class="card">
   <div class="card-header">
  <h1>start discussion</h1>

   </div>
   <div class="card-body">
   <form>
    <div class="form-group">
      <label for="question">Your question</label>
      <input type="text" name="thread_title" class="form-control" id="question" placeholder="your question">
    </div>
    <input type="hidden" name="category_id" value="">
    <div class="form-group">
      <label for="desc">Describe your problums</label>
      <textarea name="thread_description" placeholder="Describe your problums" class="form-control" id="desc" cols="30" rows="3"></textarea>
    </div>
    <input type="submit" value="post question" class="btn btn-success">
  </form>
   </div>
 </div>

</div>
<section class="container">
  <h1 class="text-capitalize my-5 px-2">browse questions</h1>

  <?php

  $sql = "SELECT * FROM `threads` WHERE `threads`.`category_id`=:category_id
    ";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([":category_id" => $_GET['category_id']]);
  if ($stmt->rowCount() > 0) {
    $rows = $stmt->fetchAll();

    foreach ($rows as $row) {
  ?>
      <div class="media  my-5">
        <img src="assets/img/defaultuser.png" style="object-fit: cover;width: 55px" class="mr-3 img-fruid" alt="...">
        <div class="media-body">
          <h5 class="mt-0"><a href="thread.php?thread_id=<?= $row['thread_id']; ?>" class="text-gray"><?php echo $row['thread_title'] ?></a> </h5>
          <strong>jz user</strong>
          <p class="lead"> <?= $row['thread_description'] ?> </p>
        </div>
      </div>
    <?php
    }
  } else {
    ?>
    <div class="media  my-5">
      <img src="assets/img/defaultuser.png" style="object-fit: cover;width: 55px" class="mr-3 img-fruid" alt="...">
      <div class="media-body">

        <div class="alert alert-danger" role="alert">
          <strong>there are no questions releated to
            <?= $category_row['category_title']; ?> Be the first person to asks the questions regarding <?= $category_row['category_title']; ?> </strong>

        </div>

      </div>
    </div>
  <?php
  }


  ?>


</section>


<?php include_once './partials/_footer.php'; ?>







<!-- login modal  -->
<?php include_once  './partials/_login-modal.php'  ?>
<!-- signup modal  -->
<?php include_once  './partials/_signup-modal.php'  ?>