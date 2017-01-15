<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>MySql Exercises 4</title>
    </head>
    <body>
        <h1>MySql Exercises - Page 4</h1>
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

        <h2>Select - Restricting and sorting</h2>
        <h2>Between</h2>
        <h3>Write a query to display the title and priority for all todos for which priority is not in the range 2 through 3 (use "NOT", "BETWEEN" and "AND").</h3>
        <?php
        $sql = 'SELECT title, priority FROM todo WHERE priority NOT BETWEEN 2 AND 3';
        displayRowInfo($sql,8);
        ?>
        
        <h2>In</h2>
        <h3>Write a query to display the title and priority for all todos for which priority is either 2 or 3 (use "IN").</h3>
        <?php
        $sql = 'SELECT title, priority FROM todo WHERE priority IN (1, 2) ';
        displayRowInfo($sql,3);
        ?>

        <h2>Like</h2>
        <h3>Write a query to display the title for all todos that contain both 'b' and 'c' (use "LIKE" and "AND").</h3>
        <?php
        $sql = 'SELECT title FROM todo WHERE title LIKE "%b%" AND title LIKE "%c%" ';
        displayRowInfo($sql,8);
        ?>
        
        <h3>Write a query to display the title for all todos where the title has exactly 9 characters. (use "LIKE" and underscores to represent numbers of characters).</h3>
        <?php
        $sql = 'SELECT title FROM todo WHERE title LIKE "_________"';
        displayRowInfo($sql,8);
        ?>
        
        <h3>Write a query to display the title for all todos where the title has 'e' as the third character. (use "LIKE" and underscores to represent numbers of characters, and you'll also need the '%').</h3>
        <?php
        $sql = 'SELECT title FROM todo WHERE title LIKE "__e%"';
        displayRowInfo($sql,8);
        ?>
        
        <h3>Write a query to display the title for the latest modified todo (use "ORDER BY" and "LIMIT").</h3>
        <?php
        $sql = 'SELECT title FROM todo ORDER BY last_modified_on DESC LIMIT 1';
        displayRowInfo($sql,8);
        ?>
             
        <?php
        
        //close db
        $db = null;
        ?>
    </body>
</html>
