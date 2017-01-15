!<DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>MySql Exercises 6</title>
    </head>
    <body>
        <h1>MySql Exercises - Page 6</h1>
        <a href="index.php">Page 1</a> | <a href="page2.php">Page 2</a> | <a href="page3.php">Page 3</a> | <a href="page4.php">Page 4</a> | <a href="page5.php">Page 5</a> | <a href="page6.php">Page 6</a>
        <br/>
        <br/>
        <?php
        $db = null;
        require './dbInitAndQuery.php';
        initDB();
        $sql = 'DROP TABLE IF EXISTS todo;';
        query($sql);
        $sql = 'DROP TABLE IF EXISTS user;';
        query($sql);
        createTable();
        ?>

        
       <h2>Subqueries</h2>
        
        <h3>Write a query to display the title for the latest modified todo (use a SELECT subquery and "MIN").</h3>
        <?php
        $sql = 'SELECT title FROM todo WHERE last_modified_on =(SELECT MIN(last_modified_on) FROM todo)';
        displayRowInfo($sql,8);
        ?>
        
        <h3>Write a query to display the title for the the todos that are greater than the average of all todos (use a SELECT subquery and "AVG").</h3>
        <?php
        $sql = 'SELECT title FROM todo WHERE id > (SELECT AVG(id)FROM todo)';
        displayRowInfo($sql,8);
        ?>
        
        <h2>Aggregate Functions (cont'd) and Group By</h2>
        <h3>Write a query to display names of todo statuses, and for each of these the number of todos that have that status (use a select statement and "COUNT" and "GROUP BY").</h3>
        <?php
        $sql = 'SELECT status, COUNT(status) FROM todo GROUP BY status ';
        displayRowInfo($sql,8);
        ?>
        
        <h3>Write a query to get the average status for each user id, excluding the first user id (use a select statement and "AVG" and "GROUP BY").</h3>
        <?php
        $sql = 'SELECT status, AVG(status) FROM todo WHERE user_id > 1 GROUP BY user_id ';
        displayRowInfo($sql,8);
        ?>
        
        <h3>Write a query to display the user ids and the sum of all todo priorities for the the todos associated to each user id (use a select statement, "SUM" and "GROUP BY").</h3>
        <?php
        $sql = 'SELECT user_id, SUM(priority) FROM todo GROUP BY user_id';
        displayRowInfo($sql,8);
        ?>
        //close db
        $db = null;
        ?>
    </body>
</html>
