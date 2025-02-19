<?php
	class userController {
		//other methods
        public function verifyUser($username, $password){
            include('../script/user_dbh.php');
            //query to get all incidents
            $sql = "SELECT * FROM users WHERE username=? AND password=?;";
        
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt,$sql)){
                return "sqlError";
            }


            mysqli_stmt_prepare($stmt,$sql);

            mysqli_stmt_bind_param($stmt, "ss", $username, $password);

            //run query
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            $row = mysqli_fetch_assoc($result);

            if($row != NULL){ //there is such user
                return $row["type"];
            }
            else{
                return false;
            }
        } 
	} 
?>