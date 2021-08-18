<html>
    <head>
        <title>Medigene IT</title>
            <style>
                .phpcoding{width:800px; margin:0 auto; background:#ddd; padding:20px; min-height:460px;}
                .headphp, .footphp{background:#444; color:#fff; text-align:center;}
                .maincontent{min-height:450px}
                .date{text-align:center}
            </style>
    </head>
    <body>
        <div class="phpcoding">
            <section class="headphp">
                <h1>Medigene IT<h1>
            </section>


<?php
if(isset($_POST['name'])){
    echo "name is:". $_POST['name'];
    echo "<br>";
    echo "emaile is". $_POST['emaile'];
    echo "<br>";
    echo "coder:". $_POST['coder'];
    echo "<br>";
    echo "gender:". $_POST['gender'];
}
?>
<section class="maincontent">
    <h2>PHP Form Validation Example<h2>

<form action="" method="post" name="name" id="name">
    <table style="">
        <tr>
            <td>User name:</td>
            <td><input type="text" name="name" required="1"/>*</td>
        </tr>
        <tr>
            <td>E-mail:</td>
            <td><input type="text" name="emaile"></td>
        </tr>
        <tr>
            <td>Language:</td>
            <td>
                <select name="coder">
                    <option value="php">PHP</option>
                    <option value="Laravel">LAravel</option>
                    <option value="java">Java</option>
                    <option value="Python">Python</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td>
                <input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="femail">Femail
            <td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="submit"/>
                <input type="reset" value="clear"/>
            <td>
        </tr>

    </table>
</form>

<?php
$nameErr = $emailErr = $genderErr = "";
$name = $email = $gender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Only letters";
      }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
  }
  if (empty($_POST["gender"])){
    $genderErr = "Gender is required";
  }else{
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
  ?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    name: <input type="text" name="name"/>
    <span class="error">* <?php echo $nameErr;?></span>
    <br>
    E-mail: <input type="text" name="email"/>
    <span class="error">* <?php echo $emailErr;?></span>
    <br>
    Gender:
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="femail">Femail
    <span class="error">* <?php echo $genderErr;?></span>
    <br>
    <input type="submit" value="submit"/>
</form>
<?php
echo "$name";
echo "<br>";
echo "$email";
echo "<br>";
echo "$gender";
?>

</section>

<section class="footphp">
<?php echo "Today is ". date("y/m/d h:i")?>
</div>

</body>
</html>
