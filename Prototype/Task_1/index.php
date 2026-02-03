<?php 
$resultat = "";
$erreur = "";

function calculate($n1, $n2, $op) {

   if ($op == "+") {
      return "Addition: " . ($n1 + $n2);

   } elseif ($op == "-") {
      return "Soustraction: " . ($n1 - $n2);

   } elseif ($op == "*") {
      return "Multiplication: " . ($n1 * $n2);

   } elseif ($op == "/") {
      if ($n2 != 0) {
         return "Division: " . ($n1 / $n2);

      } else {
         return null;
      }

   }

   return "";
}

if (isset($_POST['send'])) {

    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    $op = $_POST['operation'];

    if (is_numeric($n1) && is_numeric($n2)) {

        if ($op == "/" && $n2 == 0) {
            $erreur = "Error: Division par zéro!"; 

        } else {
            $resultat = calculate($n1, $n2, $op);
        }

    } else {
        $erreur = "Please enter valid numbers.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Simple PHP Calculator</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>

   <div class="content">
      <h2>My PHP Calculator</h2>

      <form method="POST" action="">
         <input type="text" name="n1" placeholder="Number 1" step="any">

         <select name="operation">
            <option value="+">Addition (+)</option>
            <option value="-">Soustraction (-)</option>
            <option value="*">Multiplication (*)</option>
            <option value="/">Division (/)</option>
         </select>

         <input type="text" name="n2" placeholder="Number 2" step="any">

         <button type="submit" name="send">Calculate</button>

         <br><br>

         <input class="resultat" type="text" value="<?php echo $resultat; ?>" placeholder="Result..." readonly>
         
         <p><?php echo $erreur; ?></p>
      </form>
   </div>

</body>
</html>