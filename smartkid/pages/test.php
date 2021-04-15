<?php
try{
       /* $host = 'studentnet.dundeeandangus.ac.uk';
        $dbname = 'db_1403881';
        $username = '1403881';
        $password = 'Aspire5732z';*/
 
        /*for local host*/
        $host = 'localhost';
        $dbname = 'college';
        $username = 'root';
        $password = '';
 
 
        $con = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8',$username,$password);
 
        echo("");
 
    }catch(PDOException $e){
          die("Connection Failed");
    }
?>