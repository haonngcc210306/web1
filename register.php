<?php
require_once("connect.php");
require_once("header.php");
if(isset($_POST['btnRegister'])){
    $c = new Connect();
    $dbLink = $c->connectToPDO();
    $cname=$_POST['Name'];
    $cpass =$_POST['Pass'];
    $cphone=$_POST['Phone'];
    $cemail=$_POST['EmailCustomer'];
   

    $sql="INSERT INTO `customer`(`Name`,`Pass`,`Phone`,`EmailCustomer`) VALUES (?,?,?,?)";

    $re= $dbLink->prepare($sql);
    
    $valueArray = [ "$cname","$cpass","$cphone","$cemail"
 ];
    $stmt = $re->execute($valueArray);

    if($stmt){
        echo "Register Successful";
    } else {
        echo "Register Failed";
    }

}
?>
    <div class="container">
        <h2>Member Register</h2>
        <form id="formreg" class="formreg" name="formreg" role="form" method="POST">
            <div class="row mb-3">
                <label for="pwd" class="col-sm-2"> Customer Name </label>
                <div class="col-sm-10">
                    <input id="pwd" type="text" name="Name" class="form-control" value="">
                </div>  
            </div>
            
            <div class="row mb-3">
                <label for="pwd" class="col-sm-2">Password:</label>
                <div class="col-sm-10">
                    <input id="pwd" type="password" name="Pass" class="form-control" value="">
                </div>  
            </div>

            <div class="row mb-3">
                <label for="phone" class="col-sm-2">Phone:</label>
                <div class="col-sm-10">
                    <input id="Phone" type="text" name="Phone" class="form-control" value="">
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-2">Email:</label>
                <div class="col-sm-10">
                    <input id="email" type="text" name="EmailCustomer" class="form-control" value="">
                </div>
            </div>
            <div class="row mb-3">
                <!--<div class="col-sm-10 ms-auto">-->
                <div class="d-grid col-2 mx-auto">
                    <input type="submit" name="btnRegister" value="Register" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>

<?php
require_once("footer.php");
?>