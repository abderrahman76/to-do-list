<?php
include_once 'connect.php';


function invalidUsername($username){
    // $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/" , $username)){
        $result=true;
    }else{
    $result = false;
}
return $result;
}
function invalidEmail($email){
    // $result;
    if(!filter_var(trim($email), FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
    $result = false;
}
return $result;
}
function pwdMatch($password,$cpassword){
    // $result;
    if( $password !== $cpassword ){
        $result = true;
    }else{
    $result = false;
}
return $result;
}
function usernameExist($conn,$username,$email){
    $sql = "SELECT * FROM accounts WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:sign_up.php?error=stmtfailed");
        exit();
    }
mysqli_stmt_bind_param($stmt,"ss",$username,$email);
mysqli_stmt_execute($stmt);
$resultdata = mysqli_stmt_get_result($stmt);

if($row = mysqli_fetch_assoc($resultdata)){
    return $row;
}else{
    $result = false;
    return $result;
}
mysqli_stmt_close($stmt);
}
function createUser($conn,$username,$date,$email,$pnumber,$password,$gender){
    $sql = "INSERT INTO accounts (username,Birth_date,email,phone_number,passwords,gender) VALUES(?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:sign_up.php?error=stmtofailed");
        exit();
    }
mysqli_stmt_bind_param($stmt,"sssiss",$username,$email,$date,$pnumber,$password,$gender);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location:sign_up.php?error=non");
exit();
}
function loginUser($conn,$username,$password){
    $uidExist = usernameExist($conn,$username,$username);
    if ($uidExist == false){
        header("location:log in.php?error=wrongusername");
        exit();
    }
    $pwdHashed = $uidExist["passwords"];
    $checkPwd =($password == $pwdHashed );
    if ($checkPwd == false){
        header("location:log in.php?error=wrongpwd");
        exit();
    }elseif ($checkPwd == true){
        session_start();
        $_SESSION["user_id"] = $uidExist["user_id"];
        $_SESSION["username"] = $uidExist["username"];
        header("location:home.php");
        exit();
    }
}
function showTask($conn){
    $sql = "SELECT * FROM task_manager;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck>0){
    while($row = mysqli_fetch_assoc($result)){
        if($row['task_state'] == 'to_do'){
            echo "<tr>
        <td data-label='Task name' class='task'> $row[task_name] </td>
        <td data-label='Poster name' class='task'> $row[poster_name] </td>
        <td data-label='Dead line' class='deadline'> $row[dead_line] </td>
        <td data-label='Task holder' class='task'> $row[task_holder] </td>
        <td data-label='Description' class='description'> $row[description_box] </td>
        <td data-label='Task state' class='state'> <h2 class='todo'>$row[task_state]</h2> </td>
        <td data-label='Action'>
        <a href='edit.php?id=$row[task_id]' ><button class='edit'><span class='span'></span><span class='fas fa-edit'></span></button></a>
        <a href='delete.php?id=$row[task_id]'><button class='delete'><span class='spin'></span><span class='fas fa-trash-alt'></span> </button></a>
        </td>
    </tr>";
        }elseif($row['task_state'] == 'doing'){
            echo "<tr>
        <td data-label='Task name' class='task'> $row[task_name] </td>
        <td data-label='Poster name' class='task'> $row[poster_name] </td>
        <td data-label='Dead line' class='deadline'> $row[dead_line] </td>
        <td data-label='Task holder' class='task'> $row[task_holder] </td>
        <td data-label='Description' class='description'> $row[description_box] </td>
        <td data-label='Task state' class='state'> <h2 class='doing'>$row[task_state]</h2> </td>
        <td data-label='Action'>
        <a href='edit.php?id=$row[task_id]' ><button class='edit'><span class='span'></span><span class='fas fa-edit'></span></button></a>
        <a href='delete.php?id=$row[task_id]'><button class='delete'><span class='spin'></span><span class='fas fa-trash-alt'></span> </button></a>
        </td>
    </tr>";
        }else{
            echo "<tr>
        <td data-label='Task name' class='task'> $row[task_name] </td>
        <td data-label='Poster name' class='task'> $row[poster_name] </td>
        <td data-label='Dead line' class='deadline'> $row[dead_line] </td>
        <td data-label='Task holder' class='task'> $row[task_holder] </td>
        <td data-label='Description' class='description'> $row[description_box] </td>
        <td data-label='Task state' class='state'> <h2 class='done'>$row[task_state]</h2></td>
        <td data-label='Action'>
        <a href='edit.php?id=$row[task_id]' ><button class='edit'><span class='span'></span><span class='fas fa-edit'></span></button></a>
        <a href='delete.php?id=$row[task_id]'><button class='delete'><span class='spin'></span><span class='fas fa-trash-alt'></span> </button></a>
        </td>
    </tr>";
        }
        
    }
    
    }
}
function editTask($conn,$id,$task_name,$dead_line,$task_holder,$description,$task_state){
    $uidExist = usernameExist($conn,$task_holder,$task_holder);
    /*if ($uidExist == false){
        header("location:edit.php?error=task_holder_dont_exist");
        exit();}*/
    $query = "UPDATE task_manager SET task_name='$task_name',dead_line='$dead_line',task_holder='$task_holder', description_box ='$description',task_state='$task_state' WHERE task_id=$id";
      $query_run = mysqli_query($conn,$query);

        if($query_run){
            header("location:project.php?msg=update successfully");
            exit();
        }else{
            header("location:project.php?msg=update failed");
            exit();

        }
}
function deleteTask($conn,$id){
    $query = "DELETE FROM task_manager WHERE task_id =$id";
      $query_run = mysqli_query($conn,$query);
      if($query_run){
        header("location:project.php?msg=deleted_successfully");
        exit();
    }else{
        header("location:project.php?msg=delete_failed");
        exit();

    }
}
function insertTask($conn,$TaskName,$postername,$deadline,$Taskholdername,$description,$state){
    $uidExist = usernameExist($conn,$Taskholdername,$Taskholdername);
    if ($uidExist == false){
        header("location:formular.php?error=task_holder_dont_exist");
        exit();}
    $sql ="INSERT INTO task_manager(task_name,poster_name,dead_line,task_holder,description_box,task_state) VALUES (?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:project.php?error=stmtofailed");
        exit();
    }
mysqli_stmt_bind_param($stmt,"ssssss",$TaskName,$postername,$deadline,$Taskholdername,$description,$state);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location:project.php");
exit();
}
