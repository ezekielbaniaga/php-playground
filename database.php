<?php

    /**
     * Create the following table:
     * 
     * -- primary key type 'mediumint', 24-bit up to 
     * -- 16,777,215 developers
     * --
     * -- drop table developers;
     * 
     * create table developers(
     * 
     *     developerid mediumint unsigned auto_increment not null,
     *     lastname varchar(100) not null,
     *     firstname varchar(100) not null,
     *     middlename varchar(100),
     *     gender enum('M','F'),
     *     role enum('JAVA_DEVELOPER', 'C_DEVELOPER', 'PHP_DEVELOPER'),
     *     rolelevel enum('JUNIOR', 'SENIOR', 'LEAD'),
     *     dateofbirth date,
     * 
     *     primary key(developerid)
     * 
     *  );
     */


    $host   = "localhost";
    $port   = "3308";
    $db     = "test";
    $user   = "ezekiel";
    $pass   = "1234";
    $cnstr  = "mysql: host=$host; port=$port; dbname=$db";

    function performDBOperations() {

        global $host, $port, $db, $user, $pass, $cnstr;

        try {

            # connect to database
            $pdo = new PDO($cnstr, $user, $pass);

            # prepare statement 
            $stmt = $pdo->prepare("SELECT developerid, lastname, firstname, `role` FROM developers WHERE `role` LIKE :role");

            if (!$stmt) {
                echo "There was an error while preparing statement.";
            }

            # All developers
            echo "<h2>All Developers</h2>";
            $stmt->bindValue(":role","%", PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetchAll();
            resultPrinter($res);

            # All Java developers
            echo "<h2>All Java Developers</h2>";
            $stmt->bindValue(":role","JAVA_DEVELOPER", PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetchAll();
            resultPrinter($res);
            
            # All C Developers
            echo "<h2>All C Developers</h2>";
            $stmt->bindValue(":role","C_DEVELOPER", PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetchAll();
            resultPrinter($res);

            # All PHP Developers
            echo "<h2>All PHP Developers</h2>";
            $stmt->bindValue(":role","PHP_DEVELOPER", PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetchAll();
            resultPrinter($res);
            
            # close resources
            $pdo = null;
            $stmt = null;

        } catch (PDOException $pdx) {
            echo "Error:".$pdx->getMessage();
        }
    }
    
    function resultPrinter($res) {
        echo "<table>";
        foreach ($res as $row) {
            echo "<tr>";

                echo "<td>";
                echo $row['lastname'].", ".$row['firstname'];
                echo "</td>";

                echo "<td>";
                echo $row['role'];
                echo "</td>";

            echo "</tr>";
        }
        echo "</table>";
    }

    performDBOperations();
 ?>