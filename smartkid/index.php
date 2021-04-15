

<!DOCTYPE html>
<html lang="en">
<head>
  <title>SmartKid</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <link rel="stylesheet" href="style/index.css">

<script>
  function openForm() {
    document.getElementById("myForm").style.display = "block";
  }
  function hideButton() {
    document.getElementById("login").style.display = "none";
  }

  $(document).ready(function(){
    $("#letin").click(function(){
      var user=$("#username").val();
      var password=$("#password").val();

      if (user==='' || password===''){
        alert("Please fill all fields");
      } else{
        $.post("pages/getDetails.php",{user1:user,password1:password},
          function(data){
            if(data.includes('details')){
              alert(data);
            }else if(data.includes('Admin')){
              alert(data);
              window.location = "pages/admin.php";
            }else if(data.includes('Successfully')){
              $("form")[0].reset();
              alert(data);
              window.location = "pages/users.php";
            }else{
              alert('Check with system admin' + data);
            }
          });
      }
    });
  });
</script>

</head>

<body>
  <div class="container">
    <div class="logo">
      <a href="index.php"><img src="images/logo4.png" alt="logo"></a>
    </div>
    <h1>The smartest choice for your kid</h1>
    <div id="login" onclick="hideButton()">
      <button type="submit" onclick="openForm()">Log in</button>
    </div>
    <div class="form-popup" id="myForm">
      <form class="form-inline" method="POST" action="#">
        <input type="username" name="username" id="username" placeholder="Username">
        <input type="password" name="pwd" id="password" placeholder="Password">
        <button name="submit" id="letin">Let me in</button>
      </form>

    </div>
  </div>

  <div class="content">
    <div class="text-block">
      <h1>Why learning a language at an early age?</h1>
      <p>One of the main benefits of learning a second language at an early age is that children learn languages faster and easier. They have more time to learn, less to learn, fewer inhibitions, and a brain designed for language learning.</p>
      <p><b>SmartKid</b> uses the latest research for creating tailored content for young children, research which shows that learning a second language boosts problem-solving, critical-thinking, and listening skills, in addition to improving memory, concentration, and the ability to multitask. Children proficient in other languages also show signs of enhanced creativity and mental flexibility.</p>
    </div>
  </div>
    <div class="columns">
      <ul class="steps">
        <li class="header">Step 1</li>
        <li class="details"><i class="material-icons">account_circle</i><br>Log in to access your account</li>
      </ul>
    </div>
    <div class="columns">
      <ul class="steps">
        <li class="header">Step 2</li>
        <li class="details"><i class="material-icons">touch_app</i><br>Choose a chapter</li>
      </ul>
    </div>
    <div class="columns">
      <ul class="steps">
        <li class="header">Step 3</li>
        <li class="details"><i class="material-icons">thumb_up_alt</i><br>Start your lesson</li>
      </ul>
    </div>

  <div class="footer">
    <a href="#">Contact us</a>
    <a href="#">Terms of use</a>
    <p>© 2021 SmartKid. All rights reserved.</p>
  </div>

</body>
</html>
