<?php session_start();
    include 'connect.php';
    error_reporting(0);
    $msg="";
    $pay="";
    $username=@$_SESSION['username'];
    $userid=$_SESSION["user_id"];
    $checkdata="select * from payment where user_id='".$userid."' and status='1' ;";
    $query=mysqli_query($connect,$checkdata);
    if(mysqli_num_rows($query)!=0){
        $pay="paid";

    }
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Musiqapp - Subscription</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include('preload/header.php');?>
<?php include('preload/leftsidebar.php');?>
<div class="main-content"><?php if($msg){ ?> <script>Swal.fire('<?php echo $msg; ?>')</script><?php } ?>
<div class="page-content">
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title mb-1">Subscription</h4>
                </div>
            </div>
        </div>
    </div> <?php if(@$_SESSION['username']){?>
     <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-6 col-sm-6">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <div>
                                                <h4 class="mt-3">Starter</h4>
                                                <p class="text-muted">Free User</p>
                                                <div class="icons-xl py-4">
                                                    <i class="uim uim-box"></i>
                                                </div>
                                                
                                                <div class="plan-features text-muted mt-3">
                                                    <p>Single User Support</p>
                                                    <p>70% Revenue</p>
                                                    <p>No Time Tracking</p>
                                                </div>

                                                <div class="mt-5">
                                                    <h3><sup><small>₹</small></sup> 0 / <span class="font-size-16">month</span></h3>
                                                    <div class="mt-5 mb-3">
                                                        <?php if(!$pay){ ?>
                                                        <a href="#" class="btn btn-primary">Current Plan</a>
                                                        <?php } else{ ?>
                                                            <a href="#" class="btn btn-primary">Downgrade Plan</a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-sm-6">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <div>
                                                <h4 class="mt-3">Professional</h4>
                                                <p class="text-muted">Premium</p>
                                                <div class="icons-xl py-4">
                                                    <i class="uim uim-object-ungroup"></i>
                                                </div>
                                                <div class="plan-features text-muted mt-3">
                                                    <p>Unlimited Song</p>
                                                    <p>Unlimited User</p>
                                                    <p>No Time Tracking</p>
                                                </div>

                                                <div class="mt-5">
                                                    <h3><sup><small>₹</small></sup> 1 / <span class="font-size-16">month</span></h3>
                                                    <div class="mt-5 mb-3">
                                                        <?php if($pay){ ?>
                                                            <a href="#" class="btn btn-primary">Current Plan</a>
                                                        <?php }else{ ?>
                                                        <a href="javascript:void(0)" class="btn  btn-primary buy_now" data-amount="1" data-id="<?php echo $_SESSION["user_id"];?>">Update Now</a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->


                        </div>
                        <!-- end container-fluid -->
                    </div>   <?php }else{ header("Location: logout");
                echo '<script type="text/javascript">window.location.href="logout";</script>';}?>
</div>
<?php include('preload/footer.php');?>   

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
$('body').on('click', '.buy_now', function(e){
var totalAmount = $(this).attr("data-amount");
var product_id =  $(this).attr("data-id");
var options = {
    "key": "rzp_live_cAUsL5mzVOi9az",
    "amount": (totalAmount*100), // 2000 paise = INR 20
    "name": "Musiq Hertz",
    "description": "Payment for Subscription",
    "image": "assets/images/logo.png",
    "handler": function (response){
        $.ajax({
        url: 'payment-proccess.php',
        type: 'post',
        dataType: 'json',
        data: {
        razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,product_id : product_id,
        }, 
        success: function (msg) {
            var msg = 'Your subscribed the premium is successfully';
            Swal.fire(msg);
        }
        });
    },
    "theme": {
    "color": "#528FF0"
    }
};
var rzp1 = new Razorpay(options);
rzp1.open();
e.preventDefault();
});
</script>