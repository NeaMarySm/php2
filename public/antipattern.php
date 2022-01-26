<?php

//  слепая вера, недостаточное количество проверок файла, приходящего извне
function validate_img($file){
    $image_tmp = $file["tmp_name"]; // неиспользуемая переменная 

    $img_name = explode('.', $file["name"]);
    $file_type = strtolower(end($img_name));
    $types = ['jpg', 'png', 'gif', 'bmp', 'jpeg'];
    
    if(!in_array($file_type, $types))
		return 'Недопустимый тип файла.';

	return true;
}
  


function createProducts($prod_number, $link){
     $i = 1; // магическое число, почему именно 1
     while($i<=$prod_number){
         $title = 'title'.rand(1,1000);
         $price = random_int(999, 99999);
         $query = "INSERT INTO product (`title`, `price`) VALUES ('".$title."','".$price."');";
         mysqli_query($link, $query);
         $i++;
     }  
 }

 // спагетти-код, отсутствует структурированность, часть кода можно вынести в отдельные компоненты

 session_start();
 $DBlink = mysqli_connect('localhost:3308', 'root', '', 'php_lessons');
 $catalog_cart = [];
 $result = mysqli_query($DBlink, 'select * from goods where 1');
     $images = [];
     while($row = mysqli_fetch_assoc($result)){
             $goods[] = $row;
     }
     foreach($goods as $good){ 
         ?>
             <div class="goods_item">
                 <p><?php echo $good['name']?> </p> 
                 <p><?php echo $good['price']?> </p>
                 <form method="POST" action="/catalog.php">
                 <input type="hidden" name="good_id" value="<?php echo $good['id']?>">
                 <input type="submit" name="add_btn" value="add to cart">
                 </form>
             </div>
             <?php 
     }
 $good_id = (int)$_POST['good_id'];
 if(isset($_POST['add_btn'])){
     if (isset($catalog_cart[$good_id])){
         $catalog_cart[$good_id] ++;
         echo 'added'; 
     } else {
         $catalog_cart[$good_id] = 1; 
         echo 'added'; 
     }
 }

 $_SESSION['cart'] = $catalog_cart;
 var_dump($_SESSION['cart']);
 mysqli_close($DBlink); 