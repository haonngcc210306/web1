<?php
require_once('header.php');
require_once('connect.php');
?>
<div class="container px-4 py-5">
    <?php
    if(isset($_GET['Id'])):
        $pid = $_GET['Id'];
        require_once 'connect.php';
        $conn = new Connect();
        $db_link = $conn->connectToPDO();
        $sql = "select * from product where Id = ?";
        $stmt = $db_link->prepare($sql);
        $stmt->execute(array($pid));
        $re = $stmt->fetch(PDO::FETCH_BOTH);
    ?>
       <h2><?=$re['ProductName']?></h2>
       <ul style="list-style-type:none ;" class="list-group">
        Price: <li class="list-group-item"><?=$re['Price']?></li>
        Quantity: <li class="list-group-item"><?=$re['Quantity']?></li>
        Date: <li class="list-group-item"><?=$re['Date']?></li>
        EmployeeId: <li class="list-group-item"><?=$re['employID']?></li>
        suplierId: <li class="list-group-item"><?=$re['supplierID']?></li>
       </ul>
       <form action="cart.php" method="GET">
         <div class="col-lg-9">
            <input type="hidden" name="pid" value="<?=$pid?>">
            <input type="submit" class="btn btn-primary shop-button" name="btnAdd" value="Add to cart"/></div>\
            
       </form>
    <?php
         else:
            ?>
            <h2>Nothing to show</h2>
            <?php
        endif;
        ?>
</div>
<?php
require_once('footer.php');
?>