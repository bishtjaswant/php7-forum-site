<?php
session_start();

?>





<!-- header  -->
<?php include_once './partials/_header.php'; ?>
<!-- navigationn   -->
<?php include_once './partials/_navbar.php'; ?>

<!-- carousel  -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://source.unsplash.com/2400x700/?javascript" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://source.unsplash.com/2400x700/?code" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://source.unsplash.com/2400x700/?java,python,php" class="d-block w-100" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<main class="container">
    <h2 class="text-center">iDev Categories <?php echo isset($_SESSION['loggedUserDetail']) ?  $_SESSION['loggedUserDetail']['firstname']   : '' ; ?> </h2>

    
    <div class="row">
    
    
    <?php
 require_once './db/db.php';    
    $sql='SELECT * FROM `categories` order by `category_id` desc';
       $stmt=$pdo->prepare($sql);;
       if (is_object($stmt)) {
           $stmt->execute();
           $rows= $stmt->fetchAll(); } 
?>

<?php foreach($rows as $row): ?>
    <div class="col-md-4">
            <div class="card mb-5" style="width: 18rem;">
                <img src="https://source.unsplash.com/500x400/?<?=$row['category_title'];?>" class="card-img-top" alt="<?=$row['category_title'];?>">
                <div class="card-body">
                    <h5 class="card-title"><?=$row['category_title'];?></h5>
                    <p class="card-text"><?=substr($row['category_description'], 0,100);?></p>
                    <a href="threadlist.php?category_id=<?=$row['category_id'];?>" class="btn btn-outline-info">View threads</a>
                </div>
            </div>
        </div>

<?php endforeach; ?>
        


    </div>
</main>




<!-- navigationn   -->
<?php include_once './partials/_footer.php'; ?>



<!-- login modal  -->
<?php include_once  './partials/_login-modal.php'  ?>
<!-- signup modal  -->
<?php include_once  './partials/_signup-modal.php'  ?>

