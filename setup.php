<?php
function db_connect()
{
   $result = @mysql_pconnect("localhost", "vadim", "53279");
   if (!$result)
      return false;
   if (!@mysql_select_db("carsaloon"))
      return false;

   return $result;
}

?>