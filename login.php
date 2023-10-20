<?php
require_once('header.php');
require_once('connect.php');
if(isset($_POST['btnLogin'])){
    if(isset($_POST['username'])&&isset($_POST['password'])){
        $usr = $_POST['username'];
        $pwd = $_POST['password'];
        $c = new Connect();
        $dblink = $c->connectToPDO();
        $sql ="SELECT * FROM customer WHERE Name = ? and Pass = ?";
        $stmt = $dblink-> prepare($sql);
        $re = $stmt->exEcute(array("$usr ","$pwd"));
        $numrow = $stmt->rowCount();
        $row =$stmt->fetch(PDO::FETCH_BOTH);
        if($numrow==1){
            echo "Login Successfully";
            $_SESSION['user_name'] =$row['Name'];
            header("Location: home.php");
        } else {
            echo " Something Wrong with your info<br>";

        }
    }else{
        echo"Please enter Your Info";
    }   
}
?> 
 <div class="d-md-flex half">
    <div class="bg"></div>
</div>
<div class="container">
            <form action="#" class="form form-vertical" name="formlogin" role="form" method="post" enctype="multipart/form-data"> 
                <div class="row mb-3 ">
                    <div class="col-sm-4 mx-auto">
                        <div class="form-group">
                         <label for="username" class="col-sm-2"> CustomerName </label>
                         <input id="username" type="text" name="username" class="form-control" placeholder="username">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 mx-auto">
                        <div class="form-group">
                         <label for="password" class="col-sm-2"> Password</label>
                         <input id="password" type="password" name="password" class="form-control" placeholder="password">
                        </div>
                    </div>
                </div>
              
                <div class="row mb-3">
                    <div class="col-sm-4 mx-auto">
                        <div class="form-group">
                            <label for="remember me " class="col-sm-3">Remember me</label>
                            <input type="checkbox" name="rmbme" id="rmb" checked="checked">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 mx-auto">
                        <div class="form-group">
                        <a href="#" class="col-sm-3">Forget password?</a>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-1 mx-auto">
                        <div class="form-group">
                           <input type="submit" value="Log In" class="btn btn-info" name="btnLogin">
                        </div>
                    </div>
                </div>
            </form>
</div>
<?php
require_once('footer.php');
?>        