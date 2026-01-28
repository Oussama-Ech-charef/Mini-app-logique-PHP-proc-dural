<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Calculatrice PHP Simple</title>
</head>
<body>
   <h1>Ma Calculatrice PHP</h1>

   <form  method="POST"  action="">
      <input type="number" name="n1" placeholder="Nombre 1" required>

      <select name="operation">
         <option value="+">+</option>
         <option value="-">-</option>
         <option value="*">*</option>
         <option value="/">/</option>
      </select>

      <input type="number" name="n2" placeholder="Numbre 2" required>

      <button type="submit">Calculer</button>
   </form>

   <br>


   
</body>
</html>