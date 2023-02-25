<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page'); ?>

<section>
<div class="container">
<div class="card mt-140">
            <div class="card-body">
                <div class="row upper">
                    <span><i class="fa fa-check-circle-o"></i> Shopping bag</span>
                    <span><i class="fa fa-check-circle-o"></i> Order details</span>
                    <span id="payment"><span id="three">3</span>Payment</span>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="left border">
                            <div class="row">
                                <span class="header1">Payment</span>
                                <div class="icons">
                                    <img src="https://img.icons8.com/color/48/000000/visa.png"/>
                                    <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png"/>
                                    <img src="https://img.icons8.com/color/48/000000/maestro.png"/>
                                </div>
                            </div>
                            <form method ="POST" action="<?=request()->baseUrl()?>/pay" >
                                <span>name:</span></br>
                                <input name="name"  style="padding:14px; width:80%;"></br>
                                <span>Number:</span></br>
                                <input name="number" style="padding:14px;  width:80%;"></br>
                                <span>Email:</span></br>
                                <input name="email"  style="padding:14px;  width:80%;"></br>
                                <span>Location:</span></br>
                                <input name="DIACHIGIAO" style="padding:14px;  width:80%;"></br>
                                
    

                                <button type="submit" class="btn btn-primary">accept</button>
                            </form>
                        </div>                        
                    </div>
                    <?php $cart = $_SESSION['cart'];?>
                    <div class="col-md-5 p-20">
                    <?php $sum=0;foreach($cart as $is => $pro): ?>
                        <div class="right border p-20">
                            <p>Quantity: <?php echo $pro['quantity'];?></p>
                            <div class="row item mb-20">
                                <div class="col-4 align-self-center"><img class="img-fluid" src="<?php echo $pro['image'];?>" style="width:160px;"></div>
                                <div class="col-8">
                                    <div class="row"><b><?php  echo $pro['price']?></b></div>
                                    <div class="row text-muted"><?php echo $pro['name']?></div>
                                    <div class="row"><?php $pro['quantity']?></div>
                                </div>
                            </div>
<hr>
                            <div class="row lower">
                                <div class="col text-left">Subtotal</div>
                                <div class="col text-right"><?php  echo $pro['price']*$pro['quantity']?></div>
                            </div>
                            <div class="row lower">
                                <div class="col text-left">Delivery</div>
                                <div class="col text-right">Free</div>
                            </div>
                            <?php $result = $pro['price']*$pro['quantity'];
                               $sum += $result ?>
                            <?php endforeach;?>
                            <div class="row lower">
                                <div class="col text-left"><b>Total to pay</b></div>
                                <div class="col text-right"><b><?php echo " $sum" ?></b></div>
                            </div>
                      
                        
                            <p class="text-muted text-center">Complimentary Shipping & Returns</p>
                        </div>
                    </div>
                       
                        
                </div>
            </div>
            
         <div>
        </div>
        </div>
</div>
</section>
<?php $this->stop(); ?>

<style>
    body{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgb(0, 0, 34);
    font-size: 0.8rem;
}
.w-100{
    width:80%;
}
.card{
    max-width: 1000px;
    margin: 2vh;
}
.card-top{
    padding: 0.7rem 5rem;
}
.pd-20{
    padding: -15px;
}
.card-top a{
    float: left;
    margin-top: 0.7rem;
}
#logo{
    font-family: 'Dancing Script';
    font-weight: bold;
    font-size: 1.6rem;
}
.card-body{
    padding: 0 5rem 5rem 5rem;

    background-size: cover;
    background-repeat: no-repeat;
}
@media(max-width:768px){
    .card-body{
        padding: 0 1rem 1rem 1rem;
     
        background-size: cover;
        background-repeat: no-repeat;
    }  
    .card-top{
        padding: 0.7rem 1rem;
    }
}
.row{
    margin: 0;
}
.upper{
    padding: 1rem 0;
    justify-content: space-evenly;
}
#three{
    border-radius: 1rem;
        width: 22px;
    height: 22px;
    margin-right:3px;
    border: 1px solid blue;
    text-align: center;
    display: inline-block;
}
#payment{
    margin:0;
    color: blue;
}
.icons{
    margin-left: auto;
}
form span{
    color: rgb(179, 179, 179);
}
form{
    padding: 2vh 0;
}
input{
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247);
}
input:focus::-webkit-input-placeholder
{
      color:transparent;
}
.header1{
    font-size: 1.5rem;
}
.left{
    background-color: #ffffff;
    padding: 2vh;   
}
.left img{
    width: 2rem;
}
.left .col-4{
    padding-left: 0;
}
.right .item{
    padding: 0.3rem 0;
}
.right{
background-color: #ffffff;
    padding: 2vh;
}
.col-8{
    padding: 0 1vh;
}
.lower{
    line-height: 2;
}
.btn{
    background-color: rgb(23, 4, 189);
    border-color: rgb(23, 4, 189);
    color: white;
    width: 100%;
    font-size: 0.7rem;
    margin: 4vh 0 1.5vh 0;
    padding: 1.5vh;
    border-radius: 0;
}
.btn:focus{
    box-shadow: none;
    outline: none;
    box-shadow: none;
    color: white;
    -webkit-box-shadow: none;
    -webkit-user-select: none;
    transition: none; 
}
.btn:hover{
    color: white;
}
a{
    color: black;
}
a:hover{
    color: black;
    text-decoration: none;
}
input[type=checkbox]{
    width: unset;
    margin-bottom: unset;
}
#cvv{
    background-image: linear-gradient(to left, rgba(255, 255, 255, 0.575) , rgba(255, 255, 255, 0.541)), url("https://img.icons8.com/material-outlined/24/000000/help.png");
    background-repeat: no-repeat;
    background-position-x: 95%;
    background-position-y: center;
} 
#cvv:hover{

}
</style>