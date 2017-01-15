<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>MySql Exercises 5</title>
    </head>
    <body>
        <h1>MySql Exercises - Page 5</h1>
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

        <h2>Joins</h2>
        <h2>Inner Join</h2>
        <h3>Write a query to display the title from the todos written by the user with an id of 1 (use "INNER JOIN" and "ON").</h3>
        <?php
        $sql = 'SELECT todo.title FROM todo INNER JOIN user ON todo.user_id=user.id';
        displayRowInfo($sql,8);
        ?>
        <h3>Write the same query without "INNER JOIN" and "ON".</h3>
        <?php
        $sql = 'SELECT todo.title FROM todo JOIN user WHERE todo.user_id=user.id';
        displayRowInfo($sql,8);
        ?>
        
        <h3>Write a query to display title of the todos from users whose last name begins with "Sm".</h3>
        <?php
        $sql = 'SELECT title FROM todo INNER JOIN user ON todo.user_id=user.id AND l_name LIKE "Sm%"';
        displayRowInfo($sql,8);
        ?>
        <h3>Write a query to display the last name of the users that have a todo pending.</h3>
        <?php
        $sql = 'SELECT l_name FROM user INNER JOIN todo ON todo.user_id=user.id AND todo.status="Pending"';
        displayRowInfo($sql,8);
        ?>
        <h3>Write a query to display the last name of the active users (users with an active status) that have a todo pending.</h3>
        <?php
        $sql = 'SELECT l_name FROM user INNER JOIN todo ON todo.user_id=user.id AND todo.status="Pending" AND user.status="Active"';
        displayRowInfo($sql,8);
        ?>
        
         <h2>Left Join</h2>
         <h3>Write a query to display the last name of a user and the title of the todo for all the todos of users, and will display the user details even if the user has no todos (use "LEFT JOIN").</h3>
        <?php
        $sql = 'SELECT user.l_name, todo.title FROM user LEFT JOIN todo ON todo.user_id=user.id';
        displayRowInfo($sql,10);
         ?>
         
         <h2>Right Join</h2>
         <h3>Display the same data as the above query produces, but do so using a right join (use "RIGHT JOIN").</h3>
        <?php
        $sql = 'SELECT user.l_name, todo.title FROM user RIGHT JOIN todo ON todo.user_id=user.id';
        displayRowInfo($sql,10);
         ?>
        <?php
        
        //close db
        $db = null;
        ?>
    </body>
</html>
