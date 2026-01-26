

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Prototype</title>
   
</head>
<body>

   
   <h1> Simple PHP Calculator</h1>

   <form action="#" method="post">

      <div class="input">
          <input type="number" require name="number_one" placeholder="Value:A">
          <br>
          <br>
          <input type="number" require  name="number_tow" placeholder="Value:B">
      </div>

      <div class="form_group">

        <label><input type="radio" name="radi" id="plus" value="+">+</label>
          
      </div>

      <div class="form_group">

         <label><input type="radio" name="radi" id="mainus" value="-">-</label>
    
      </div>

      <div class="form_group">
          <label><input type="radio" id="multiple" name="radi" value="*">*</label>
         
      </div>

      <div class="form_group">
         <label><input type="radio" name="radi" id="division" value="/">/</label>
         
      </div>
       <br>
      <input type="submit" value="send" name="send" class="btn">

   </form>

   
   
</body>
</html>


<?php   
 
 //started projects
 if(isset($_POST["send"])){
  
   function calculator(){
       

      if(!isset($_POST["radi"])){
         echo "<p class='radio_'>please choose an operation </p>";
         
         return;
       }

      elseif($_POST["number_one"]==""){
           echo "<p class='value_A'>number one is required</p>";
           return;
       }
      
       elseif($_POST["number_tow"] ==""){
          echo "<p class='value_A'>number tow is required </p>";
          return;
       }

      //  create to variable to add numbers
       $number_one=$_POST["number_one"];
       $number_tow=$_POST["number_tow"];
      
      //create switch to click user any radio to calculate
      switch($_POST["radi"]){

         case "+":
           echo "<p class='totla_number'>" . ($number_one + $number_tow) . "</p>";
         break;
          
         case "-":
              echo "<p class='totla_number'>" . $number_one - $number_tow . "</p>";
         break;

         case "*":
             echo "<p class='totla_number'>". $number_one * $number_tow ."</p>";
         break;
  
          case "/":
             
             if( $number_tow == 0){
                 echo "division by zero not allowed";
             }else{
                echo "<p class='totla_number'>". $number_one / $number_tow ."</p>";
             }
         break;

         default :
            echo "you not chose any value";
            
       };
        
   }

   //call function
   calculator();


 }
 

?>