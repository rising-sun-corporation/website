<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Gjord av Oscar Freij TE18D HT2018 -->
    <!-- Tid: ~41 timmar -->
    <meta charset="utf-8">
    <title>SSIS:LDAP --> Togethernet:SQL</title>
  </head>
  <body>
    <h2>Databas uppdateraren V2.0</h2>
    <form id="SUPDUP" method="post">
      <p>//l-dap access//</p>
      <input type="text" name="user" value="" placeholder="Username">
      <input type="password" name="pass" value="" placeholder="Password">
      <br>
      <br>
      <button type="submit" name="button">Logga in och uppdatera</button>
    </form>
    <?php
      if(!isset($_POST['user'])) exit;
      $user =  $_POST['user'];
      $pass =  $_POST['pass'];


    // Create and check connection "ldap"//
  		$connLDAP = ldap_connect("ldaps://ad.ssis.nu") or die("Fel med ldap koppling\n<br />");

  		$bind = ldap_bind($connLDAP,$user."@ad.ssis.nu",$pass) or die("LDAP: Anslutning misslyckades!");

      $s = ldap_search($connLDAP, "OU=Elever,DC=ad,DC=ssis,DC=nu", "(|(cn=*))", array("cn", "givenName", "sn", "memberOf")) or die("SEARCH FEL");
      $info = ldap_get_entries($connLDAP, $s) or die("GET FEL");

    //var_dump($info);
      $info = array($info);
      $item_number = -1;
      foreach ($info as $obj_key =>$item)
        foreach ($item as $key => $value) {
          $item_number++;
          if ($item_number >= 1) {
            $value_email = $value['cn'][0] . '@stockholmscience.se';
            $value_lastname = $value['sn'][0];
            $value_firstname = $value['givenname'][0];
            $value_memberof = $value['memberof'];
            $value_class = "Not Found";

            foreach ($value_memberof as $key => $value) {
              global $value_class;
              $value_class_proces = strpos($value, "Klass");
              if ($value_class_proces === false) {
              } else {
                $pos_1 = strpos($value, "=");
                $pos_2 = strpos($value, ",");
                $value_class = substr($value, $pos_1+1, ($pos_2-1)-$pos_1);
              }
            }

          }
          print_r("Klass: $value_class<br>Förnamn: $value_firstname<br>Efternamn: $value_lastname<br>Email: $value_email<br><br>");
        }
      ?>
  </body>
</html>

<!--

// vvvv "" OLD CODE BACKUP"" vvvv
if (!mysqli_query($li, "INSERT INTO details (class, firstname, lastname, email)
VALUES ('$value_class','$value_firstname','$value_lastname','$value_email')
ON DUPLICATE KEY UPDATE class=VALUES(class),firstname=VALUES(firstname),lastname=VALUES(lastname);")) {
  echo ("Error: " . mysqli_error($li));
}
// ^^^^ "" OLD CODE BACKUP "" ^^^^
