<!-- header  -->
<?php include_once './partials/_header.php'; ?>


<!-- navigationn   -->
<?php include_once './partials/_navbar.php'; ?>


<!-- reqired databas connections -->
<?php  require_once './db/db.php';    ?>


<!-- POST New question -->
<?php
$showAlert=false;
if($_SERVER['REQUEST_METHOD']==='POST'){
$sql = "INSERT INTO `threads`(`thread_title`, `thread_description`, `user_id`, `category_id`) VALUES (:thread_title, :thread_description, :user_id, :category_id)";

$pdo->prepare($sql)->execute([
  ':thread_title'=>$_POST['thread_title'],
  ':thread_description'=>$_POST['thread_description'],
  ':user_id'=>0,
  ':category_id'=>$_POST['category_id']
]);
$showAlert=true;
}
?>


<?php if($showAlert):?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Great!</strong> Your question  added
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif;?>

<main class="container">
  <div class="jumbotron">
    <?php
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

  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Have you any question regarding to <?= $category_row["category_title"]; ?>
  </button>
  <div class="collapse" id="collapseExample">
    <div class="card">

      <div class="card">
        <div class="card-header">
          <h1>start discussion about  <?= $category_row["category_title"]; ?> </h1>
          <p class="text-gray">your question should be relevant and specific</p>

        </div>
        <div class="card-body">
          <form method="POST" action="<?= $_SERVER['REQUEST_URI'] ?>">
            <div class="form-group">
              <label for="question"><strong>Your question</strong></label>
              <input type="text" required name="thread_title" class="form-control" id="question" placeholder="your question">
            </div>
            <input type="hidden" name="category_id" value="<?= $_GET['category_id'] ?>">
            <div class="form-group">
              <label for="desc"><strong> Describe your issue </strong> </label>
              <textarea  required name="thread_description" placeholder="Describe your issue" class="form-control" id="desc" cols="30" rows="3"></textarea>
            </div>
            <input type="submit" value="post question" class="btn btn-success">
          </form>
        </div>
      </div>


    </div>
  </div>


</div>


<section class="container">
  <h1 class="text-capitalize my-5 px-2">browse questions</h1>

  <div class="card my-2" style="max-height: 600px;overflow-y: scroll;">

    <?php

    $sql = "SELECT * FROM `threads` WHERE `threads`.`category_id`=:category_id ORDER BY `thread_id` DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":category_id" => $_GET['category_id']]);
    if ($stmt->rowCount() > 0) {
      $rows = $stmt->fetchAll();

      foreach ($rows as $row) {
    ?>
        <div class="media  px-5">
          <img src="assets/img/defaultuser.png" style="object-fit: cover;width: 55px" class="mr-3 img-fruid" alt="...">
          <div class="media-body">
            <h5  class="mt-0 pt-2">
              <a data-toggle="tooltip" data-placement="bottom" title="know more about  <?= $row['thread_title']; ?>"  href="thread.php?thread_id=<?= $row['thread_id']; ?>" class="text-gray">   <?= $row['thread_title']; ?>  </a> </h5>
            <strong>jz user</strong>
            <p class="lead"> <?= substr( $row['thread_description'], 0, 190) ?>... <a href="thread.php?thread_id=<?= $row['thread_id']; ?>" data-toggle="tooltip" data-placement="bottom" title="read full description of <?= $row['thread_title']; ?>  " >Read more </a> </p>
          </div>
        </div>
      <?php
      }
    } else {
      ?>
      <div class="media  m-5">
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


  </div>

</section>

<!-- ffooter -->
<?php include_once './partials/_footer.php'; ?>

<!-- login modal  -->
<?php include_once  './partials/_login-modal.php'  ?>
<!-- signup modal  -->
<?php include_once  './partials/_signup-modal.php'  ?>