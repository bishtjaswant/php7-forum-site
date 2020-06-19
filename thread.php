<!-- reqired databas connections -->
<?php require_once './db/db.php';    ?>


<!-- header  -->
<?php include_once './partials/_header.php'; ?>


<!-- navigationn   -->
<?php include_once './partials/_navbar.php'; ?>




<!-- update user's comment -->
<?php


if ( isset(   $_POST['new_comment']  )  ) {
$sql = "UPDATE `comments` SET `comment_title`=:comment_title WHERE `comments`.`comment_id`=:comment_id ";
$pdo->prepare($sql)->execute([
  ':comment_title' => @$_POST['new_comment'],
  ':comment_id' => @$_POST['comment_id']
]);

}
?>

<!-- POST New commnts-->
<?php
$showAlert = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $sql = "INSERT INTO `comments` ( `comment_title`, `comment_thread_id`, `comment_user_id`)
 VALUES (:comment_title, :comment_thread_id, :comment_user_id  ) ";

  $pdo->prepare($sql)->execute([
    ':comment_title' => $_POST['comment_title'],
    ':comment_thread_id' => $_GET['thread_id'],
    ':comment_user_id' => @$_SESSION['loggedUserDetail']['user_id']??0,
  ]);
  $showAlert = true;
}
?>



<!-- shhow alert message when comment will  be possted to db -->
<?php if ($showAlert) : ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>DONE!</strong> Comment posted
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>

<main class="container">
  <div class="jumbotron">
    <?php
    //  select tread where thread id met
    $sql = "SELECT * FROM `threads` WHERE `threads`.`thread_id`=:thread_id";
    $stmt = $pdo->prepare($sql);;
    $stmt->execute([":thread_id" => $_GET['thread_id']]);
    $noResult = true;
    if ($stmt->rowCount() > 0) {
      $thread_row = $stmt->fetch();
    }
    ?>


<?php 

 // print user name  WHOSE PPOSTING QUESTION
 $user_sql="SELECT firstname FROM users WHERE id =:thread_user_id";
 $stmt2 = $pdo->prepare($user_sql);
 $stmt2->execute([":thread_user_id" => $thread_row['user_id']]);
 $user =  $stmt2->fetch();
?>
    <h1 class="display-4"><?= $thread_row["thread_title"]; ?> </h1>
    <p class="lead"> <?= $thread_row["thread_description"]; ?> </p>
    <p class="">Questioned by <strong><?= $user['firstname'] ?></strong></p>
    <p class="">On dated <strong><?= date('D, d M Y H:i:s', strtotime ($thread_row['thread_timestamp'] ) ); ?></strong></p>
  </div>
</main>


<section class="container">

<?php if( !isset($_SESSION['loggedUserDetail']) || $_SESSION['loggedUserDetail']['loggedIn'] ===0)  :?>

  <h1 class="py-2"> Post a comment</h1>
  <p class="lead text-secondary" >
    you are not able to post a comments
  </p>

  <?php else: ?>

  <div class="card">
    <div class="card-header">
      <div class="card-title">
        <h1 class="py-2"> Post a comment</h1>
      </div>
    </div>
    <div class="card-body">
      <form method="POST" action="<?= $_SERVER['REQUEST_URI'] ?>">
        <div class="form-group">
          <label for="desc"><strong> Write a comment </strong> </label>
          <textarea required name="comment_title" placeholder="write a comment" class="form-control" id="desc" cols="30" rows="3"></textarea>
        </div>
        <input type="submit" value="post comment" class="btn btn-outline-primary">
      </form>
    </div>
  </div> 

<?php endif?>



  <h1 class="text-capitalize my-5 px-2">Comments</h1>



  <?php
  //  select all user's comments
  $noResult = true;
  $sql = "SELECT `comment_id`, `comment_title`, `comment_thread_id`, `comment_user_id`, `comment_timestamp` FROM `comments` WHERE `comments`.`comment_thread_id`=:thread_id ORDER BY `comment_id` DESC";
  $stmt = $pdo->prepare($sql);;
  $stmt->execute([":thread_id" => $_GET['thread_id']]);
  if ($stmt->rowCount() > 0) {
    $noResult = false;
    $comments = $stmt->fetchAll();
  }
  ?>



  <?php if ($noResult) : ?>
    <div class="alert alert-danger" role="alert">
      <strong>Nobody has writes comment yet.!</strong>
    </div>
  <?php else : ?>


    <?php foreach ($comments as $comment) : ?>


      <?php 
        
        
    // print all the comment users
    $commentator_sql="SELECT  `id`,  `firstname` FROM `users`  WHERE `id`=:commentator_id";
    $commentator_stmt = $pdo->prepare($commentator_sql);;
    $commentator_stmt->execute([":commentator_id" => $comment['comment_user_id']]);
    $commentator_row = $commentator_stmt->fetch();
    ?>

      <ul class="list-unstyled">
        <li class="media">
          <img src="assets/img/defaultuser.png" style="width: 64px;height: 64px;object-fit: cover;" class="mr-3 img-fruid" alt="...">
          <div class="media-body">
            <p class="font-weight-bold  py-0 my-0"><?=$commentator_row['firstname'];?></p>
          
          
            <!-- use can modify only own comment -->
            <?php  if ( @$_SESSION['loggedUserDetail']['user_id'] === $comment['comment_user_id'] ):?>
            <p style="display: inline-block;" id="comment_again" data-toggle="tooltip" data-placement="top" title="want to edit commets" data-commentid="<?= $comment['comment_id']; ?>" > <?= $comment['comment_title']; ?> </p>
            <?php else: ?>
              <p style="display: inline-block;"  > <?= $comment['comment_title']; ?> </p>
         <?php   endif;?>
            <p class="font-weight-bold  py-0 my-0">        
            Commented at <?= date('D, d M Y H:i:s', strtotime ($comment['comment_timestamp'] ) ); ?> </p>
          </div>
        </li>
      </ul>
    <?php endforeach; ?>

  <?php endif; ?>

</section>


<?php include_once './partials/_footer.php'; ?>







<!-- login modal  -->
<?php include_once  './partials/_login-modal.php'  ?>
<!-- signup modal  -->
<?php include_once  './partials/_signup-modal.php'  ?>