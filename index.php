<html>
<?php
ini_set( "default_charset", "UTF-8" );
ini_set("display_errors",1);


define("SCHEMA", '');

require_once 'Annotations.php';
require_once 'model/Entity/User.php';
require_once 'model/Entity/Perfil.php';
require_once 'model/DAO/IGenerateDB.php';
require_once 'model/DAO/impl/GenerateDBPostgreSQL.php';


$generator = New GenerateDBPostgreSQL(); 


echo "<pre>".$generator->generate(new User())."</pre>";
echo "<pre>".$generator->generate(new Perfil())."</pre>";

?>

</html>