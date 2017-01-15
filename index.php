<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>MySql Exercises</title>
    </head>
    <body>
        <h1>MySql Exercises - Page 1</h1>
        <a href="index.php">Page 1</a> | <a href="page2.php">Page 2</a> | <a href="page3.php">Page 3</a> | <a href="page4.php">Page 4</a> | <a href="page5.php">Page 5</a> | <a href="page6.php">Page 6</a>
        <br/>
        <br/>
        <?php
        $db = null;
        require './dbInitAndQuery.php';
        initDB();
        $sql = 'DROP TABLE IF EXISTS country;';
        query($sql);
        ?>
        <h2>Create/Drop table</h2>
        <h3>Write an SQL statement to create a table "nation" including columns countryId, countryName and regionId. 
            Set a constraint NOT NULL for the columns.</h3>
        <?php
        $sql = 'CREATE TABLE nation(countryId INT(10) NOT NULL, countryName VARCHAR(30) NOT NULL, regionId INT(10) NOT NULL);';
        query($sql);
        ?>
        
        <h3>Write an SQL statement to drop the nation table. </h3>
        <?php
        $sql = 'DROP TABLE nation';
        query($sql);
        ?>
        
        <h3>Write an SQL statement to create a table "nation" as before but this time make countryId a primary key.</h3>
        <?php
        $sql = 'CREATE TABLE nation(countryId INT(10) PRIMARY KEY NOT NULL, countryName VARCHAR(30) NOT NULL, regionId INT(10) NOT NULL)';
        query($sql);
        ?>
        <h3>Drop the table again.</h3>
        <?php
        $sql = 'DROP TABLE nation';
        query($sql);
        ?>
        
        <h3>Write an SQL statement to create a table "nation" as before but this time give countryId a default value of 'New Zealand'. </h3>
        <?php
        $sql = 'CREATE TABLE nation(countryId INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT, countryName VARCHAR(30) DEFAULT \'New Zealand\', regionId INT(10) NOT NULL)';
        query($sql);
        ?>
        
        <h2>Alter</h2>
        <h3>Write an SQL statement to rename the table nation to country.</h3>
        <?php
        $sql = 'ALTER TABLE nation RENAME TO country';
        query($sql);
        ?>
        <h3>Write an SQL statement to add a column called "locale" to the country table with a type of varchar(5) (use "ADD").</h3>
        <?php
        $sql = 'ALTER TABLE country ADD locale varchar(5)';
        query($sql);
        ?>
        <h3>Write an SQL statement change the data type of the column "locale" to varchar(10) (use "MODIFY").</h3>
        <?php
        $sql = 'ALTER TABLE country MODIFY locale varchar(10)';
        query($sql);
        ?>
        
        <h3>Write an SQL statement to drop the "locale" column (use "DROP").</h3>
        <?php
        $sql = 'ALTER TABLE country DROP locale';
        query($sql);
        ?>
        
        <h3>Add an index on the countryName column (use "ADD INDEX").</h3>
        <?php
        $sql = 'ALTER TABLE country ADD INDEX (countryName)';
        query($sql);
        ?>
        
        <h2>Insert</h2>
        
        <h3>Write an SQL statement to insert the values null (the primary key is null because it auto-increments),
            'India',1001 into the country table.</h3>
        <?php
        $sql = 'INSERT INTO country VALUES (null, \'India\', 1001)';
        query($sql);
        ?>

        <h3>Write a sql statement to insert 3 rows by a single insert statement (you 
            can have multiple values in brackets separated by a comma).</h3>
        <?php
        $sql = 'INSERT INTO country (countryId, countryName, regionId) VALUES (null, \'Australia\', 789747892)';
        query($sql);
        ?>

        <h3>Write an SQL statement to insert the regionId value 123 into the country table 
            (you will need to write the column name in brackets after the table name).</h3>
        <?php
        $sql = 'INSERT INTO country (regionId) VALUES (123)';
        query($sql);
        ?>
        
        <h2>Delete</h2>

        <h3>Write an SQL statement to delete the country by the name "Australia". </h3>
        <?php
        $sql = 'DELETE FROM country WHERE countryName="Australia"';
        $statement = query($sql);

        /* Return number of rows that were deleted */
        $count = $statement->rowCount();
        echo 'Returned number of rows that were deleted: ' . $count;
        ?>
        
        <h3>Write an SQL statement to delete all rows from the country table. </h3>
        <?php
        $sql = 'DELETE FROM country';
        $statement = query($sql);

//        /* Return number of rows that were deleted */
        $count = $statement->rowCount();
        echo 'Returned number of rows that were deleted: ' . $count;
        ?>

        <?php
        //close db
        $db = null;
        ?>
    </body>
</html>
