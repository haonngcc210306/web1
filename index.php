<?php
require_once('header.php');

?>
<div class="b-example-divider"></div>
<h2 class="pb-2 border-bottom">New Products Of ATN Store </h2>
    <?php
require_once('connect.php');
$c = new Connect();
$dbLink = $c->connectToMySQL();

$sql = 'SELECT * FROM product ORDER BY Date DESC LIMIT 3';

$re=$dbLink->query($sql);

if($re->num_rows>0){
?>
<div class="container-fluid"></div>
<div class="row">
<?php
    while($row=$re->fetch_assoc()){
        ?>     
        <div class="col-md-4 pb-3"> 
            <div class="card">
                    <img src="image/<?=$row['img']?>"    
                    alt="Product1>"
                    style="margin: auto
                    width=300px;"
                    />
                    <div class="card-body"></div>
                    <a href="detail.php?id=<?=$row['Id']?>" class="text-decoration-none text-center"><h5 
                     class="card-title"><?=$row['ProductName']?></h5></a>
                    <h6 class="card-subtitle mb-2 text-center"><span></span><?=$row['Price']?></h6>
                    <a href="delete.php?id=<?= $row['Id'] ?>" class="btn btn-danger">Delete</a>
                    <a href="update.php?id=<?= $row['Id'] ?>" class="btn btn-success">Update</a>
                                                                                                                                                                                            
            </div>
        </div>
        <?php
   }     
}
?>                  
</div>

</body>
<?php
 require_once('search.php');
require_once('footer.php');
?>

   