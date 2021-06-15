<?php

function is_valid_admin_login($email, $password) {
    global $db;
    $query = 'SELECT password FROM administrators
              WHERE emailAddress = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();
    $hash = $row['password'];
    return password_verify($password, $hash);
}



function email_exists($email){
    global $db;
    $query =
        'SELECT * FROM administrators
         WHERE emailAddress = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();

    return $statement->rowCount() > 0;
}


function add_admin($email, $password) {

    if(email_exists($email)){
      return "Email already exists. User not created";

    }else{
      global $db;
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $query =
          'INSERT INTO administrators (emailAddress, password)
           VALUES (:email, :password)';
      $statement = $db->prepare($query);
      $statement->bindValue(':email', $email);
      $statement->bindValue(':password', $hash);
      $statement->execute();
      $statement->closeCursor();

      return "USER CREATED. CLICK ON LOGIN.";

    }

}

?>
