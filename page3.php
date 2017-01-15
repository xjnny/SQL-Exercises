<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>MySql Exercises 3</title>
    </head>
    <body>
        <h1>MySql Exercises - Page 3</h1>
        <a href="index.php">Page 1</a> | <a href="page2.php">Page 2</a> | <a href="page3.php">Page 3</a> | <a href="page4.php">Page 4</a> | <a href="page5.php">Page 5</a> | <a href="page6.php">Page 6</a>
        <br/>
        <br/>
        <?php
        $db = null;
        require './dbInitAndQuery.php';
        initDB();
        $sql = 'DROP TABLE IF EXISTS todo;';
        query($sql);
        createTable();
        ?>

        <h2>Select</h2>

        <h3>Write a query to display all columns of all todos.</h3>
        <?php
        $sql = 'SELECT * FROM todo';
        displayRowInfo($sql,1);
        ?>

        <h3>Modify this query to display just the last modified date of all todos using alias name "Last Modified".</h3>
        <?php
        $sql = 'SELECT * FROM todo WHERE last_modified_on ';
        displayRowInfo($sql,1);
        ?>
         
       <h3>Write a query to display the title and priority of all todos and order them descending by priority.</h3>
        <?php
        $sql = 'SELECT title, priority FROM todo ORDER BY priority DESC';
        displayRowInfo($sql,3);
        ?>
        
        <h3>Write a query to display the sum of all priority values (use "SUM").</h3>
        <?php
        $sql = 'SELECT SUM(priority) FROM todo';
        displayRowInfo($sql,1);
        ?>
        
        <h3>Write a query to display the maximum and minimum priority values of all todos (use "MAX" and "MIN").</h3>
        <?php
        $sql = 'SELECT MIN(priority) AND MAX(priority) FROM todo';
        displayRowInfo($sql,1);
        ?>
        
        <h3>Write a query to display the average of the priority values and the count of all todos (use "AVG" and "COUNT").</h3>
        <?php
        $sql = 'SELECT AVG(priority) AND COUNT(priority) FROM todo';
        displayRowInfo($sql,1);
        ?>
        
        <h3>Write a query to display the distinct last_modified_on values of all todos (use "DISTINCT").</h3>
        <?php
        $sql = 'SELECT DISTINCT last_modified_on FROM todo';
        displayRowInfo($sql,8);
        ?>
        
        <h3>Write a query to display the number of priority types (use "COUNT" and "DISTINCT").</h3>
        <?php
        $sql = 'SELECT DISTINCT priority AND COUNT(priority) FROM todo';
        displayRowInfo($sql,8);
        ?>
        
        <h3>Write a query to select the title from the first 5 todo records (use "LIMIT").</h3>
        <?php
        $sql = 'SELECT title FROM todo LIMIT 5';
        displayRowInfo($sql,8);
        ?>

        <?php
              
        //close db
        $db = null;
        ?>
    </body>
</html>
