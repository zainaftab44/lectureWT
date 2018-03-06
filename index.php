<?php
$title=isset($_POST["title"])?$_POST["title"]:(isset($_GET["title"])?$_GET["title"]:"Default title"); 
include "header.php";
$_SESSION["title"]=$title;

if(isset($_POST["submit"])){
    $name=$_POST["stdname"];
    $email=$_POST["stdemail"];
    $pass=$_POST["stdpass"];
    $conn= mysqli_connect("localhost","root","","mydb");

$stmt=    $conn->prepare("insert into student ( name, email, password) values (?,?,?)");
$stmt->bind_param("sss",$name,$email,md5($pass));
echo $stmt->execute();

}
?>
<a href="page2.php" class="btn btn-default">Goto page 2</a>
    <div class="container">
        <div class="row">
            <h1 class="offset-lg-4">This is a basic page</h1>
            <h3 > <?php echo "Student Form"; ?></h3>
        </div>
        <div class="row">
            <br/><hr>
            <form action="./" method="post">
            <input class="form-control" placeholder="enter name" name="stdname" required/>
            <input class="form-control" placeholder="enter email" type="email" name="stdemail" required/>
            <input class="form-control" placeholder="enter password" type="password" name="stdpass" required/>
            <input class="btn btn-primary" type="submit" value="submit" name="submit"/>
            </form><br/><hr>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <h3 class="card-block text-center">Column 1!</h3>
                <img src="img/300.png" class="card-img-center" />
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <a href="#" class="btn btn-warning">default btn</a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 offset-1 card">
                <h3 class="card-block text-center">Column 2!</h3>
                <img src="img/300.png" class="card-img-center" />
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <a href="#" class="btn btn-primary">primary btn</a>
            </div>
            <div class="col-lg-3 offset-1">
                <h3 class="card-block text-center">Column 3!</h3>
                <img src="img/300.png" class="card-img-center" />
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <a href="#" class="btn btn-danger" style="width:100%">danger btn</a>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-12">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <th>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Date</td>
                        </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Abc</td>
                            <td>abc@gmail.com</td>
                            <td>2-2-18</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Abc</td>
                            <td>abc@gmail.com</td>
                            <td>2-2-18</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Abc</td>
                            <td>abc@gmail.com</td>
                            <td>2-2-18</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Abc</td>
                            <td>abc@gmail.com</td>
                            <td>2-2-18</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Abc</td>
                            <td>abc@gmail.com</td>
                            <td>2-2-18</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Abc</td>
                            <td>abc@gmail.com</td>
                            <td>2-2-18</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>footer</td>
                            <td>Abc</td>
                            <td>abc@gmail.com</td>
                            <td>2-2-18</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row">
        <form method="get" action="/Project/" style="height:500px; width:auto">
        <fieldset>
        <legend>change title form </legend>
        <input class="form-control" type="text" placeholder="Enter new title" name="title"/>
        <input class="btn btn-primary" type="submit" value="update title"/>
        <input class="btn btn-warning" type="reset"/>
        </fieldset>
        </form>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>