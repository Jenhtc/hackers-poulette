<?php
$msg = "";

if (!preg_match("/^[a-zA-Z-]*$/", isset($_POST["first_name"]))){
  $msg = "Wrong input";
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="form.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">   
   
    <link rel="shortcut icon" type="image/png" sizes="96x96" href="favicon-96x96.png">

    <title>Forms</title>
</head>

<body>
<!-- Page Content goes here -->
<div class="container">  
<div class="logo">
<img src="hackers-poulette-logoc.png" alt=""></div>       
<h1>Contact us</h1>
<div class="row">
    <form class="col s12" method="POST" action="form.php">
      
        <div class="input-field col s6">
        <i class="material-icons prefix">face</i>
          <?php if(!preg_match("/^[a-zA-Z-]*$/", isset($_POST["first_name"]))){
            $invalid = "invalid";
          } else {
            $invalid = "";
          }
          ?>
          <input id="first_name" name="first_name" type="text" class="validate <?php if(isset($invalid)){echo($invalid);} ?>" alt="Enter your first name" value="<?php if (isset($_POST["first_name"])){echo ($_POST["first_name"]);} ?>" required>
          <span><?php if(isset($msg)){echo ($msg);} ?></span>
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" name="last_name" type="text" class="validate" alt="Enter your last name" required>
          <label for="last_name">Last Name</label>
        </div>
      
        <div class="input-field col s12">
        <i class="material-icons prefix">email</i>
          <input id="email" name="email" type="email" class="validate" alt="Enter your email adress" >
          <label for="email">Email</label>
        </div>

<!--     Radio button for gender -->    
    <p>
    <div class="row">
    <div class="col s5" id="gender-bloc">
    <h6><i class="material-icons prefix"id="gender">wc</i>Gender</h6>
      <label>
        <input name="gender" type="radio" value="female" alt="Choose your gender" checked />
        <span>Female</span>
      </label>
    </p>
    <p>
      <label>
        <input name="gender" type="radio" value="male"/>
        <span>Male</span>
      </label>
    </p>
    </div>
  </div>

 <!-- Country -->
 <div class="row">
    <div class="col s12">
        <div class="input-field col s12">
          <i class="material-icons prefix">public</i>
          <input name="country" type="text" id="autocomplete-input" class="autocomplete validate" alt="Choose your country" required>
          <label for="autocomplete-input">Choose your country</label>
        </div>
    </div>
  </div>

 <!-- Subjects selection field --> 

    <div class="input-field col s12">
    <i class="material-icons prefix">assignment_turned_in</i>
    <select name="subject">
      <option value="" disabled>Choose your option</option>
      <option value="Administratif">Administratif</option>
      <option value="2">Subject 2</option>
      <option value="3" selected>Others</option>
    </select>
    <label>Choose your subject</label>
  </div>


<!--     Text area       -->    

        <div class="input-field col s12"> 
        <i class="material-icons prefix">mail_outline</i>
          <textarea id="textarea1" name="message" class="materialize-textarea"></textarea>
          <label for="textarea1">Your message</label>
  </div>
        
      <button class="btn waves-effect waves-light" type="submit" name="submit">Submit
    <i class="material-icons right">send</i>
  </button>
    </form>
  </div>  
  </div>
</body>
</html>




     