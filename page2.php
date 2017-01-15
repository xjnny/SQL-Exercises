<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>MySql Exercises 2</title>
    </head>
    <body>
        <h1>MySql Exercises - Page 2</h1>
        <a href="index.php">Page 1</a> | <a href="page2.php">Page 2</a> | <a href="page3.php">Page 3</a> | <a href="page4.php">Page 4</a> | <a href="page5.php">Page 5</a> | <a href="page6.php">Page 6</a>
        <br/>
        <br/>
        <?php
        $db = null;
        require './dbInitAndQuery.php';
        initDB();
        $sql = 'DROP TABLE IF EXISTS employee;';
        query($sql);
        ?>

        <!--        Create-->
        
        <h3>Write an SQL statement to create a table employee including columns employeeId, firstName, lastName, email, phoneNumber, salary, managerId and departmentId.</h3>
        <?php
        $sql = 'CREATE TABLE employee (employeeId INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT, firstName varchar(20), lastName varchar(20), email varchar(50), phoneNumber INT(10), salary INT(10), managerId INT(10), departmentId INT(10)) ';
        query($sql);
        ?>
        
        <!--        End Create-->

        <!--        Insert-->

        <h3>Write an SQL statement to insert a row into the employee table (make sure the employee's first name is "Bob").</h3>
        <?php
        $sql = 'INSERT INTO employee (employeeId, firstName, lastName, email, phoneNumber, salary, managerId, departmentId) VALUES (1, "Bob", "Eastgate", "bobby@email.com", 3424234, 342432, 456, 435)';
        query($sql);
        echo $sql;
        ?>

        <h3>Write an SQL statement to insert a row into the employee table with different values (make sure the employee's first name is "Mary" and her department id is 888).</h3>
        <?php
        $sql = 'INSERT INTO employee (employeeId, firstName, lastName, email, phoneNumber, salary, managerId, departmentId) VALUES (2, "Mary", "Dawson", "mary@email.com", 234234, 234234, 424, 888)';
        query($sql);
        echo $sql;
        ?>

        <!--        End Insert-->
        
        <h2>Update</h2>

        <h3>Write an SQL statement to change the email column of employee table to 'not available' for all employees.</h3>
        <?php
        $sql = 'UPDATE employee SET email="not available"';
        query($sql);
        ?>

        <h3>Write an SQL statement to change the phoneNumber and salary column of employees table to '555 5555' and 78000.00 for those employees whose departmentId is 435.</h3>
        <?php
        $sql = 'UPDATE employee SET phoneNumber="555 5555", salary=78000 WHERE departmentId=435';
        query($sql);
        ?>

        <h3>Write an SQL statement to change the departmentId of employee table to 456 for those employees whose first name is "Bob" and salary is over $50,000.</h3>
        <?php
        $sql = 'UPDATE employee SET departmentId=456 WHERE firstName="Bob" AND salary > 50000';
        query($sql);
        ?>

        <h2>Like</h2>

        <h3>Write an SQL statement to change managerId of an employee to 111 if the employee belongs to department 888 and first name begins with "Ma".</h3>
        <?php
        $sql = 'UPDATE employee SET managerID=111 WHERE departmentId=888 AND firstName LIKE "ma%" ';
        query($sql);
        ?>

        <h2>NOT/Like</h2>

        <h3>Write an SQL statement to change lastName of an employee to "Potter" if the employee's first name contains "ar".</h3>
        <?php
        $sql = 'UPDATE employee SET lastName="Potter" WHERE firstname LIKE "%ar%"';
        query($sql);
        ?>

        <?php
        
        //close db
        $db = null;
        ?>
    </body>
</html>
