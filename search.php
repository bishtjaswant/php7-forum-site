<!-- reqired databas connections -->
<?php require_once './db/db.php';    ?>




<!-- header  -->
<?php include_once './partials/_header.php'; ?>
<!-- navigationn   -->
<?php include_once './partials/_navbar.php'; ?>

<?php 
require_once './db/db.php';  
$keyword= $_GET['query'];
$sql="SELECT * FROM `threads` WHERE MATCH (thread_title,thread_description) AGAINST (:keyword IN NATURAL LANGUAGE MODE)";
$q=$pdo->prepare($sql);
$q->bindValue(':keyword',$keyword);
$q->execute();
$result= $q->fetchAll();
$numberOfSearchResult=$q->rowCount();
?>


<div class="container">

<?php if (isset(  $_GET['query'] ) && $_GET['query'] !=''  ):?>

    <div class="list-group mt-4" style="min-height: 75vh;">
  <h2  class="list-group-item list-group-item-action active">    Your search result for "<?= $_GET['query'] ?>"   <span class="badge badge-pill badge-info float-right"> <?= $numberOfSearchResult ?> </span>
</h2>


<?php if( count($result)>0 ):?>
    <?php foreach($result as  $q ) :?>
         <div> 
        <a href="thread.php?thread_id=<?=$q['thread_id']?>" class="display-4"><?= $q['thread_title'];?></a>
         <p class="lead"><?= $q['thread_description'];     ?></p>
         </div>
    <?php endforeach;?>
<?php else:?>
    <div class="alert alert-warning my-5 alert-dismissible fade show" role="alert">
  <strong>Query  Failed !</strong> Your search - "<?= $_GET['query']?>" - did not match any documents.

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif;?>
   
</div>

<?php else:?>
    <div class="alert alert-warning my-5 alert-dismissible fade show" role="alert">
  <strong>Query  Failed !</strong> Your search  query does not contain any documents.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div> 
<?php endif;?>



</div>



<!-- navigationn   -->
<?php include_once './partials/_footer.php'; ?>

<!-- login modal  -->
<?php include_once  './partials/_login-modal.php'  ?>
<!-- signup modal  -->
<?php include_once  './partials/_signup-modal.php'  ?>