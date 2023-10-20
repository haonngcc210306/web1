<?php
require_once('header.php');
require_once('connect.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }
if(isset($_SESSION['user_name'])){
    $user=$_SESSION['user_name'];
    $c = new connect();
$dblink = $c->connectToPDO();
if(isset($_GET['pid'])){ // check user add item to shopping cart
$p_id = $_GET['pid'];
$sqlSelect1 = "SELECT pid FROM cart WHERE user_id=? AND pid=?";
$re = $dblink->prepare($sqlSelect1);
$re->execute(array("$user","$p_id"));
// check if the item has been added
if($re->rowCount()== 0){ // the item could not found in user cart
$query = "INSERT INTO cart(user_id,pid,pcount,date) VALUES(?,?,1,CURDATE())";
}else{ // added by user
    $query = "UPDATE cart SET pcount = pcount + 1 where user_id=? and pid=?";

}
$stmt = $dblink->prepare($query);
$stmt->execute(array("$user","$p_id"));
}
if(isset($_GET['del_id'])){ // when user want to delete an item to shopping cart
$cart_del = $_GET['del_id'];
$query = "DELETE FROM cart WHERE cart_id=?";
$stmt = $dblink->prepare($query);
$stmt->execute(array($cart_del));

}
// show a list of shopping cary
$sqlSelect ="SELECT * FROM cart c, product p Where c.pid = p.pid and user_id=?";
$stmt1 = $dblink->prepare($sqlSelect);
$stmt1->execute((array($user)));
$rows = $stmt1->fetchAll(PDO::FETCH_BOTH);
    }
    else{
        header('Location: login.php');
    }

// $c = new connect();
// $dblink = $c->connectToPDO();


// if(isset($_GET['pid'])){ // check user add item to shopping cart
// $p_id = $_GET['pid'];
// $sqlSelect1 = "SELECT pid WHERE user_id=? AND pid=?";
// $re = $dblink->prepare($sqlSelect1);
// $re->execute(array("$user_id","$p_id"));

// // check if the item has been added
// if($re->rowCount()== 0){ // the item could not found in user cart
// $query = "INSERT INTO cart(user_id,pid,pcount,date) VALUES(?,?,1,CURDATE())";
// }else{ // added by user
//     $query = "UPDATE cart SET pcount = pcount + 1 where user_id=? and pid=?";

// }
// $stmt = $dblink->prepare($query);
// $stmt->execute(array("user_id","sp_id"));

// }
// if(isset($_GET['del_id'])){ // when user want to delete an item to shopping cart
// $cart_del = $_GET['del_id'];
// $query = "DELETE FROM cart WHERE cart_id=?";
// $stmt = $dblink->prepare($query);
// $stmt->execute(array($cart_del));

// }
// // show a list of shopping cary
// $sqlSelect ="SELECT * FROM cart c, product p Where c.pid = p.pid and user_id=?";
// $stmt1 = $dblink->prepare($sqlSelect);
// $stmt1->execute((array($user_id)));
// $row = $stmt->fetchAll(PDO::FETCH_BOTH);

// }else{
//     header("Location : login.php");
// }

?>
<div class="container">
    <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
    <h6 class="mb-0 text-muted"><?=$stmt1->rowCount()?> items(s)</h6>
    <table class="table">
    <tr> 
        <th>Productname</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Action</th>
    </tr>
    <?php
        foreach($rows as $row){      
    ?>    
    <tr>
        <td><?=$row['pname']?></td>
        <td> <input id="form1" min="0" name="quantity" value="<?=$row['pcount']?>" type="number" class="form-control form-control-sm" /></td>
        <td><h6 class="mb-0"><span>&#8363</span> <?=$row['pcount']?> * <?=$row['pprice']?> </h6> </td>
        <td><a href="cart.php?del_id=<?=$row['cart_id']?>" class="text-muted text-decoration-none">x</a></td>
    </tr>
    <?php
        }
    ?>
    </table>
    <hr class="my-4">

    <div class="pt-5">
        <h6 class="mb-0"><a href="home.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>  
    </div>
  
</div>
<?php
require_once('footer.php');
?>