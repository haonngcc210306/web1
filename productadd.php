<?php
require_once('header.php');
require_once('connect.php');

if(isset($_POST['btnAdd'])){
    $c = new connect();
    $dbLink = $c->connectToPDO();

    
    $pstore = $_POST['storeID'];
    $pname =$_POST['productname'];
    $pprice=$_POST['price'];
    $pquan=$_POST['quantity'];
    $pdate='2023-04-14';
    $pemployee=$_POST['employeeid'];
    $psup=$_POST['suplierID'];

    $img = str_replace('','-',$_FILES['Pro_image']['name']);
    $imgdir ='./image/';
    $flag = move_uploaded_file(
        $_FILES['Pro_image']['tmp_name'],
        $imgdir.$img
 );// chon thu muc update //

 if ($flag){
    $sql="INSERT INTO `product`( `Store_id`, `ProductName`, `Price`, `Quantity`, `Date`, `employID`, `supplierID`, `img`) VALUE(?,?,?,?,?,?,?,?)";
    $re= $dbLink->prepare($sql);
    $v =[$pstore,$pname,$pprice,$pquan,$pdate,$pemployee,$psup,$img];
   
    $stmt = $re->execute($v);
    if($stmt){
        echo "congrats";
    }else{
    echo "Copy Failed";
    }
  }
}
?>

    <div class="container">
        <h2>PRODUCT MANAGEMENT</h2>
        <form  class="form form-vertical" action="#" method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="pstore" class="col-12">Store ID</label>
                <div class="col-12">
                    <input id="pstore" type="text" name="storeID" class="form-control" placeholder="Product ID" value="">
                </div>

            </div>
            <div class="row mb-3">
                <label for="pname" class="col-12">Product Name</label>
                <div class="col-12">
                    <input id="pname" type="text" name="productname" class="form-control" placeholder="Product Name" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label for="ppri" class="col-12">Price Product</label>
                <div class="col-12">
                    <input id="pprice" type="text" name="price" class="form-control" placeholder="Price" value="">
                </div>
            </div>

           
            <div class="row mb-3">
                <label for="pquantity" class="col-12">Quantity</label>
                <div class="col-12">
                    <input id="pquan" type="text" name="quantity" class="form-control" placeholder="Quantity"value="">
                </div>
            </div>

            <div class="row mb-3">
                <label for="pdate" class="col-12">Product Date</label>
                <div class="col-12">
                    <input id="pdate" type="date" name="date" class="form-control" placeholder="Product date" value="">
                </div>
            </div>

            
            <div class="row mb-3">
                <label for="pname" class="col-12">Employee ID</label>
                <div class="col-12">
                    <input id="employeeid" type="text" name="employeeid" class="form-control" placeholder="" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label for="pname" class="col-12">Suplier ID</label>
                <div class="col-12">
                    <input id="suplierID" type="text" name="suplierID" class="form-control" placeholder="" value="">
                </div>
            </div>


            
                <!-----///----> 
                <div class="col-12">
                    <div class="form-group">
                        <label for="image-vertical">Image</label>
                        <input type="file" name="Pro_image" id="Pro_image" class="form-control" placeholder="Image" value="">
                    </div>
                </div>                
            </div>

            <!------button---------->
            <div class="row mb-3">
                <div class="col-2 ms-auto row">
                    <div class="col-6 d-grid mx-auto">
                        <button type="submit" name="btnAdd" class="btn btn-warning">Submit</button>
                    </div>
                    <div class="col-6 d-grid mx-auto">
                        <button type="reset" name="btnReset" class="btn btn-danger">Reset</button>
                    </div>
                </div>
            </div>
<?php
require_once('footer.php');
?>