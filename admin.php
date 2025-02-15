<?php
require 'profile.php';
protect_page();

function protect_page(){
   if  ( $_SESSION['logged_in'] = false){;

        header("location: index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>reservation</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/dandelion.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/dandelion-place.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="brand">Admin</div>
     <div class="address-bar">3481 Kwale Lane | Upper Hills, CA 90210 | 072.456.7890</div>



    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">Dandelion Place</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
            <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="services.html">services</a>
                    </li>


                        <li>
                        <a href="logout.php">logout</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Admin Page
                
                    </h2>
                    <hr>
                    <p> Hi, there admin you are able to delete add and update users</p>
                   
     
  
<?php
$host = 'localhost';
$user = 'root';
$pass = 'benimana';
$db = 'hotel';
$con = new mysqli($host,$user,$pass,$db) or die("error on connectiion".$mysqli->error);




if (isset($_POST['update'])) {
$updateQuery="UPDATE members SET first_name='$_POST[first_name]',last_name='$_POST[last_name]', email='$_POST[email]' WHERE first_name='$_POST[hidden]' ";
mysql_query($updateQuery,$con);
};

if (isset($_POST['delete'])){
  $deleteQuery="DELETE FROM members first_name='$_POST[hidden]'";
  mysql_query($deleteQuery,$con);

};


if (isset($_POST['add'])){
  $addQuery="INSERT INTO members (first_name, last_name, email) 
            . VALUES ('$_POST[first_name]','$_POST[last_name]','$_POST[email]')";
  mysql_query($addQuery,$con);

};



$result = $con->query("SELECT * FROM members");

echo "<table border=1>
<tr>
   <th>firstname</th>
   <th>lastname</th>
   <th>email</th>
</tr>";

 while($members=mysqli_fetch_assoc($result)){

  echo "<form action=admin.php method=post>";
  echo "<tr>";
  echo "<td>" ."<input type=text name=first_name value=". $members['first_name'].  "</td>";
  echo "<td>" ."<input type=text name=last_name value=". $members['last_name']  .    "</td>";
  echo "<td>" ."<input type=text name=email value=". $members['email']."</td>";
  echo "<td>" ."<input type=hidden name=hidden value=". $members['first_name']  .    "</td>";
  echo "<td>" ."<input type=submit name=update value=update".                      "</td>";
  echo "<td>" ."<input type=submit name=delete value=delete"  .                     "</td>";
  echo "</tr>";
  echo "</form>";
}

echo "<form action=admin.php method=post>";
echo "<tr>";
 echo "<td><input type=text name=first_name></td>";
 echo "<td><input type=text name=last_name></td>";
 echo "<td><input type=text name=email></td>";
 echo "<td>" ."<input type=submit value=add"."</td>";
echo "</tr>";
echo "</form>";
echo "</table";

?>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/dandelion.min.js"></script>

</body>

</html>
