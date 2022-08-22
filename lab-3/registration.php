<?php  
 $message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["name"]))  
      {  
           $error = "<label class='text-danger'>Enter Name</label>";  
      }
      else if(empty($_POST["email"]))  
      {  
           $error = "<label class='text-danger'>Enter an e-mail</label>";  
      }  
      else if(empty($_POST["username"]))  
      {  
           $error = "<label class='text-danger'>Enter a username</label>";  
      }  
      else if(empty($_POST["password"]))  
      {  
           $error = "<label class='text-danger'>Enter a password</label>";  
      }
      else if(empty($_POST["confirm_password"]))  
      {  
           $error = "<label class='text-danger'>Confirm password field cannot be empty</label>";  
      } 
      else  
      {  
           if(file_exists('data.json'))  
           {  
                $current_data = file_get_contents('./data/data.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'name'     =>     $_POST['name'],  
                     'e-mail'   =>     $_POST["email"],  
                     'username' =>     $_POST["un"],  
                     'gender'   =>     $_POST["gender"],  
                     'dob'      =>     $_POST["dob"]  
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('./data/data.json', $final_data))  
                {  
                     $message = "<label class='text-success'>File Appended Success fully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
      }  
 }  
 ?>
<!DOCTYPE html>
<html>

<head>
    <title>User Registration</title>
</head>

<body>
    <br />
    <div class="container" style="width:500px;">
        <h3 align="">Register User</h3><br />
        <form method="post">
            <?php   
                if(isset($error))  
                {  
                    echo $error;  
                }  
              ?>
            <br />


            <label>Name</label>
            <input type="text" name="name" class="form-control" /><br />
            <label>E-mail</label>
            <input type="text" name="email" class="form-control" /><br />
            <label>User Name</label>
            <input type="text" name="username" class="form-control" /><br />
            <label>Password</label>
            <input type="password" name="password" class="form-control" /><br />
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control" /><br />



            <legend>Date of Birth:</legend>
            <input type="date" name="dob"> <br><br>

            <input type="submit" name="submit" value="Submit" class="btn btn-info" /><br />
            <?php  
                  if(isset($message))  
                  {  
                      echo $message;  
                  }  
              ?>
        </form>
    </div>
    <br />
</body>

</html>