<?php
include "header.php";
if(isset($_GET["delete"])&& isset($_GET["id"])){
    $query="delete from student where id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i",$_GET["id"]);
    $stmt->execute();
    $stmt->close();
}
?>

    <div class="container">
        <div class="row">
            <h2> All students </h2>
            <table class="table table-bordered table-stripped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                         $query="Select id,name,email from student";
                         $stmt = $conn->prepare($query);
                         if($stmt->execute()){
                            $stmt->bind_result($id,$name,$email);
                            while($stmt->fetch()){
                                echo "<tr>
                                        <td>$id</td>
                                        <td><input type='hidden' value='$id'>";
                                        ?>
                                        <input class='form-control' id="name_<?php echo $id;?>" type='text' value='<?php echo $name;?>' onKeyDown='
                                        var btn=document.getElementById("upd_btn_<?php echo $id?>")
                                        var name=document.getElementById("name_<?php echo $id;?>").value
                                        btn.href="?id=<?php echo $id;?>&update=true&name="+name;' />
                                        <?php 
                                echo "</td>
                                        <td>$email</td>
                                        <td><a class='btn btn-warning' id='upd_btn_$id' href='?id=$id&update=true&name='> Update </a>
                                        <a class='btn btn-danger' href='?id=$id&delete=true'> Delete </a></td>
                                      </tr>";                                        
                            }
                         }else{
                             echo '<h3> error occurred</h3>';
                         }
                         $stmt->close();
                    ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <form method="get" action="./page2.php">
                <fieldset>
                    <legend>Find user</legend>
                    <input class="form-control" type="email" 
                    required placeholder="Enter email" name="email"/>
                    <input class="btn btn-primary" name="submit" type="submit" value="Search"/>
                </fieldset>
            </form>
            <?php if(isset($_GET["submit"]) && isset($_GET['email'])){
                
                ?>
                <table class="table table-bordered table-stripped table-hover">
                   <?php 
                    $query="Select id,name,email,password from student where email=?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("s",$_GET["email"]);
                    $stmt->execute();
                    $stmt->bind_result($id,$name,$email,$password);
                    if($stmt->fetch()){
                     
                   ?> <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                              echo "<tr>
                                        <td>$id</td>
                                        <td>$name</td>
                                        <td>$email</td>
                                        <td>$password</td>
                                    </tr>";                                        
                            }else{
                                echo "No user found";
                            }
                            
                        ?>
                    </tbody>
                </table>
            <?php    
            }?>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>