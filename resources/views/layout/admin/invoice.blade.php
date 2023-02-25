







<div class="detail-invoice mt-2">
        <div class="container invoice-infor">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice">
                        <div class="invoice-header">
                            <div class="invoice-title">
                                <h3>
                                    Invoice
                                </h3>

                            </div>
                            <?php $shipping =0 ;  foreach ($invoice as $in) :
                               $shipping = $in->shipment;
                            ?>
                                <?php endforeach ; ?>
                                <?php $time = $in->created_at ; ?>

                            
                            <div class="invoice-subtitle mt-20">
                                <div class="invoice-date">
                                 <div class="sub-title-invoice">
                                    Date:

                                 </div>
                                 <?php $id=0; foreach ($invoice as $in) : ?>
                                    <?php endforeach ; ?>
                                 <div class="infor-invoice">
                                    <p>
                                        <?= $time->toDateString() ; ?>
                                    </p>
                                 </div>
                               
                                
                                 <?php $id = $in->id_order ; ?>
                                 <?php
                                  $name = $in->orders->name ; ?>
                                 <?php $address = $in->orders->address ; ?>
                                 <?php $phone = $in->orders->phone ; ?>
                                 <?php $email = $in->orders->email ; ?>
                                 <?php $payment = $in->orders->order_payment ; ?>
                                                                 
                                </div>
                             
                                <div class="invoice-number">
                                     <div class="sub-title-invoice">
                                        Invoice No:
                                     </div>
                                     <div class="infor-invoice">
                                     <?= $id ?>
                                     </div>

                                </div>
                              
                            </div>
                            <div class="invoice-subtitle mt-20">
                                <div class="invoice-date">
                                 <div class="sub-title-invoice">
                                    Invoiced To:

                                 </div>
                                 <div class="infor-invoice d-block">
                                    <p>
                                    <?=$name;?>
                                    </p>
                                 </div>
                                 <div class="infor-invoice d-block">
                                  
                                    <p>
                                      <div class="sub-title-invoice">
                                        Address:
    
                                     </div>
                                    <?=$address;?>
                                    </p>
                                 </div>
                                 <div class="infor-invoice d-block">
                                    <p>
                                      <div class="sub-title-invoice">
                                       Email:
    
                                     </div>
                                    <?=$email;?>
                                    </p>
                                 </div>
                                 <div style="display: block"
                                  class="infor-invoice d-block">
                                    <p>
                                      <div class="sub-title-invoice">
                                        Phone:
    
                                     </div>
                                    <?=$phone;?>
                                    </p>
                                 </div>
                                                                 
                                </div>
                                <div class="invoice-number">
                                     <div class="sub-title-invoice">
                                        Pay To:
                                     </div>
                                     <div class="infor-invoice d-block">
                                        Shop Cay Canh
                                     </div>
                                     <div class="infor-invoice d-block">
                                       Method Pay : 
                                     </div>
                                     <div class="infor-invoice d-block">
                                       {{$payment}}
                                     </div>

                                </div>
                            </div>
                        </div>
                        <div class="invoice-body md:max-lg:flex mt-16">
                            <div class="">
                                <div class="invoiced-content max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
                                    <table style="width: 100%;">
                                        <thead class="" style="width: 100%;">
                                            <tr style="width: 100%;" class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                               
                                                <th class="px-4 py-3 p-8" style="text-align: center;">ID</th>
                                                <th class="px-4 py-3 p-8" >Name</th>
                                                <th class="px-4 py-3 p-8" style="text-align: center;">Price</th>
                                                <th class="px-4 py-3 p-8" style="text-align: center;">Quantity</th>
                                                <th class="px-4 py-3 p-8" style="text-align: center;">Amount</th>
                                                
                                            </tr>
      
                                        </thead>
                                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                

                                            <?php $result=0; $start=1; foreach ($invoice as $in) :?>
                                            
                                                <tr class="text-gray-700 dark:text-gray-400">
                                                   
                                                    <td class="px-4 py-3" style="text-align: center;"><?= $start++; ?></td>
                                                    <td class="px-4 py-3" style="display: inline-block" style="text-align: center;">
                                                      <div style="display: inline-block;" class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                        <img class="object-cover w-full h-full rounded-full"
                                                            src="{{asset($in->product->image)}}"
                                                            alt="" loading="lazy" />
                                                        <div class="absolute inset-0 rounded-full shadow-inner"
                                                            aria-hidden="true"></div>
                                                    </div>
                                                    <div style="display: inline-block;"style="text-align:center;align-content:center;"><?= $in->product->name;?></div> 
                                                  </td>
                                                    <td style="text-align: center;" class="px-4 py-3"><?= number_format($in->product->price-($in->product->price*$in->product->level)) ; ?></td>
                                                    <?php $sum = 0; 
                                                    $sum +=  $in->total_amount *($in->product->price-($in->product->price*$in->product->level))?>
                                                    <td style="text-align: center;" class="px-4 py-3" style="text-align: center;"><?= number_format($in->total_amount) ; ?></td>
                                                    <td style="text-align: center;" class="px-4 py-3"><?= $sum ?></td>
                                                </tr>
                                                <?php $result += $sum ?>
                                                <?php endforeach ;?>
                                           
                                           
                                        </tbody>
                                    </table>
                               
                                 
                                </div>
                            
                            </div>

    
                        </div>
                        <div class="invoice-footer-table mt-2">
                                     
                            <div class="table-footer">
                                <div class="invoice-footer-total" style="display: inline-block;">

                                    <div class="invoice-sub-total" style="display: inline-block;">
                                        <h3>
                                         Sub-Total:	
                                            
                                        </h3>
                                    </div>
                                    <div class="invoice-subtitle-number" style="display: inline-block;">
                                        <h4 style="font-weight: 500;
                                        font-size: 1.4rem;">
                                            <?= number_format($result)?> VND
                                            
                                        </h4>
                                    </div>
                                </div>
                                <div class="invoice-footer-total">
                                    <div class="invoice-sub-total" style="display: inline-block;">
                                        <h3>
                                            Shipping:
                                            
                                        </h3>
                                    </div>
                                    <div class="invoice-subtitle-number" style="display: inline-block;">
                                        <h4 style="font-weight: 500;
                                        font-size: 1.4rem;">
                                            <?= number_format($shipping)?> VND
                                            
                                        </h4>
                                    </div>
                                </div>
                                <div class="invoice-footer-total">

                                    <div class="invoice-sub-total" style="display: inline-block;">
                                        <h3>
                                         Total:
                                        </h3>
                                    </div>
                                    <div class="invoice-subtitle-number" style="display: inline-block;">
                                        <h4 style="font-weight: 500;
                                        font-size: 1.4rem;">
                                            <?= number_format($result+$shipping)?> VND
                                            
                                        </h4>
                                    </div>
                                </div>


                                         
                                
                                   

                          

                            </div>

                        </div>
                        <div class="invoice-footer">
    
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <style>
        .detail-invoice{
  background-color:  #eee;
        }


  

.detail-invoice .invoice-infor{
  background-color: #fff;
  padding: 60px;

  
}
.detail-invoice .invoice-infor .invoice{
  position: relative;

}
.detail-invoice .invoice-infor .invoice-title{
  font-family: sans-serif;
  color: rgb(0, 0, 0);
  font-size: 2.6rem;
  font-weight: 500;
}
.detail-invoice .invoice-infor .invoice-title h3{
  font-size: 5rem;
  font-family: sans-serif;
  font-weight: 500;
  text-transform: capitalize;
  text-align: end;
}
.detail-invoice .invoice-infor .invoice-title::after{
  content: "";
  background-color: #ccc;
  width: 100%;
  height: 1px;
  display: block;

}
.detail-invoice .invoice-infor .invoice-date{
  text-align: start;
  display: inline-block;
}
.detail-invoice .invoice-infor .invoice-date .sub-title-invoice{
  display: inline-block;
  display: inline-block;
  font-size: 1.8rem;
  font-weight: 800;
}
.detail-invoice .invoice-infor .invoice-date .infor-invoice{
  font-size: 1.6rem;
  display: inline-block;
}
.detail-invoice .invoice-infor .invoice-number{
  display: inline-block;
  text-align:end;
}
.detail-invoice .invoice-infor .invoice-number .sub-title-invoice{
  display: inline-block;
  font-size: 1.8rem;
  font-weight: 800;

}
.detail-invoice .invoice-infor .invoice-number .infor-invoice{
  display: inline-block;
  font-size: 1.6rem;
}
.detail-invoice .invoice-infor .invoice-subtitle{
  display: flex;
  justify-content: space-between;
}
.detail-invoice .invoice-infor .invoice::before{
  content: "";
  background-color: #ccc;
  width: 100%;
  height: 1px;
  display: block;
  margin-top: 0px;
  position: absolute;
  top: 124px;

}
.detail-invoice .invoice-infor .invoice .invoice-header .invoice-subtitle .infor-invoice p{
  font-size: 1.6rem;
}
  .invoice-sub-total h3{
  font-size: 1.8rem;
  font-weight: 800;
  display: inline-block;
}
  .invoice-sub-total{
  display: inline-block;
}
   .invoice-subtitle-number {

  display: inline-block;
}
  .table-footer{

}
  .invoice-footer-table{
  display: flex;
 justify-content: end;
 text-align: end;
 margin-top: 20px;
 
}
   .invoice-footer-table .invoice-footer-total{
  margin-top: 10px;
}
.invoice-footer-table .invoice-footer-total .invoice-sub-total {
margin-right: 80px;  
}
    </style>


