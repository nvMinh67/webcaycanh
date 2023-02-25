<?php $this->layout(config('view.layout')) ?>

<!-- Load nội dung trang home/dashboard.php vào vị trí section('page') của layouts/default.php -->
<?php $this->start('page') ?>

<div class="form-group quantity mt-200">
<?php $result; ?>


                      <label for="city">City</label>
                     
                      <select class="form-control select_quantity" name="city" id ="city">
                  
                      <?php foreach ($items as $item) : ?>
                        <option value="<?= $item->id; ?>"><?= $item->name; ?></option>
                        
                        
                        
                        <?php endforeach; ?>
                        <?php $result = $item->name; ?>
                        
                         
                   



                      </select>
                      <label for="quantity">District</label>
                     
                      <select class="form-control select_quantity" name="quantity" id = "district">
                      <option ><option>
                      </select>

                      </select>
                      <label for="quantity">Ward</label>
                     
                      <select class="form-control select_quantity" name="quantity" id = "ward">
                      <option ><option>
                      </select>
                     
                    
                  

                      



                     
                  

                  </div>
                  <script>
    $(document).ready(function(){
    $('#city').change(function(){
        
        
        var city_id = $(this).val();
        console.log(city_id);
       
                $.ajax({
                    url:'/getdistrict',
                    type:'GET',
                    data:{
                        city_id:city_id
                    },
                    dataType:'json',
                    success:function(data){
                        console.log(data);
                        $('#district').empty();
                        $.each(data.data, function(key, value) {
                                let selectoption = '';
                                selectoption += "<option value='"+ value.id +"'>" + value.name+ "</option>";
                                $('#district').append(selectoption);
                        }); 
                    }
                    
                });
    })
    $('#district').change(function(){
        var district_id = $(this).val();
        console.log(district_id);

        $.ajax({
                    url:'/getward',
                    type:'GET',
                    data:{
                        district_id:district_id
                    },
                    dataType:'json',
                    success:function(data){
                        console.log(data);
                        $('#ward').empty();
                        $.each(data.data, function(key, value) {
                                let selectoption = '';
                                selectoption += "<option value='"+ value.id +"'>" + value.name+ "</option>";
                                $('#ward').append(selectoption);
                        }); 
                    }
                    
                });

    })
    



})
 </script>
               
            
 <?php $this->stop(); ?>
