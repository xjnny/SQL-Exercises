<?php
/**
 * Init database
 * @global PDO $db
 * @throws Exception
 */
function initDB() {
    global $db;
    //hard coded values only for these exercises, will should use config
    $dsn = "mysql:host=localhost;dbname=sqlexercisesdb;charset=utf8";
    $username = "root";
    $password = "root";

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (Exception $ex) {
        throw new Exception('DB connection error: ' . $ex->getMessage());
    }
}

function query($sql) {
    global $db;
    echo $sql . '<br/>';
    $statement = $db->prepare($sql);

    if ($statement->execute()) {
        echo 'Transaction successful<br>';
    } else {
        displayError($statement);
    }
    return $statement;
}

function getRows($sql) {
    global $db;
    $result = array();

    $statement = $db->prepare($sql);
    if ($statement->execute()) {
        $rows = $statement->fetchAll();
        foreach ($rows as $row) {
            $result[] = $row;
        }
    } else {
        displayError($statement);
    }
    return $result;
}

function displayError($statement) {
    echo '<p style="color:red">';
    print_r($statement->errorInfo());
    echo '</p>';
}

function displayRowInfo($sql, $max) {
    $rows = getRows($sql);
    echo $sql."<br/>";
    echo "Row count: " . sizeof($rows) . "<br/><br/>Row fields and values:<br/>";
    $count = 1;
    foreach ($rows as $row) {
        if ($count > $max) {
            if ($count)
                echo "[...]";
            break;
        }
        foreach ($row as $key => $value) {
            echo $key . ' => ' . $value . "<br/>";
        }
        $count++;
        echo"<br/>";
    }
}

function createTable() {
        $sql = "CREATE TABLE `todo` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `priority` INT(1) NOT NULL DEFAULT 2,
    `created_on` DATETIME NOT NULL,
    `due_on` DATETIME NOT NULL,
    `last_modified_on` DATETIME NOT NULL,
    `title` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
    `description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    `comment` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
    `status` ENUM('PENDING', 'DONE', 'VOIDED') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'PENDING',
    `deleted` BOOLEAN NOT NULL DEFAULT 0,
    `user_id` INT NOT NULL
) ENGINE = MYISAM DEFAULT CHARSET=utf8;

ALTER TABLE `todo` ADD INDEX (`priority`);
ALTER TABLE `todo` ADD INDEX (`due_on`);
ALTER TABLE `todo` ADD INDEX (`status`);
ALTER TABLE `todo` ADD INDEX (`deleted`);

-- data
INSERT INTO `todo` (`id`, `priority`, `created_on`, `last_modified_on`, `due_on`, `title`, `description`, `comment`, `status`, `deleted`,`user_id`)
    VALUES (NULL, 2, '2011-10-20 11:00:00', '2015-10-20 00:00:00', '2011-10-20 11:00:00', 'Clean the house', 'Clean the whole house, ideally including garden.', NULL, 'PENDING', 0,2);
INSERT INTO `todo` (`id`, `priority`, `created_on`, `last_modified_on`, `due_on`, `title`, `description`, `comment`, `status`, `deleted`,`user_id`)
    VALUES (NULL, 2, '2011-09-02 18:24:00', '2011-10-05 15:00:00', '2011-10-07 08:26:49', 'Cut the lawn', 'Cut the lawn around the house.', NULL, 'PENDING', 0,1);
INSERT INTO `todo` (`id`, `priority`, `created_on`, `last_modified_on`, `due_on`, `title`, `description`, `comment`, `status`, `deleted`,`user_id`)
    VALUES (NULL, 3, '2011-09-15 09:30:00', '2012-01-01 00:00:00', '2011-10-19 10:25:00', 'Buy a car', 'Choose the best car to buy and simply buy it.', 'New BMW bought.', 'DONE', 0,3);
INSERT INTO `todo` (`id`, `priority`, `created_on`, `last_modified_on`, `due_on`, `title`, `description`, `comment`, `status`, `deleted`,`user_id`)
    VALUES (NULL, 3, '2011-09-27 17:33:00', '2011-11-01 00:00:00', '2011-10-11 13:48:00', 'Open a new bank account', NULL, 'Not needed.', 'VOIDED', 0,3);
INSERT INTO `todo` (`id`, `priority`, `created_on`, `last_modified_on`, `due_on`, `title`, `description`, `comment`, `status`, `deleted`,`user_id`)
    VALUES (NULL, 1, '2010-08-12 08:17:00', '2010-09-01 00:00:00', '2011-10-07 08:06:40', 'Finish all the exams', NULL, NULL, 'DONE', 0,5);
INSERT INTO `todo` (`id`, `priority`, `created_on`, `last_modified_on`, `due_on`, `title`, `description`, `comment`, `status`, `deleted`,`user_id`)
    VALUES (NULL, 2, '2011-10-02 10:38:36', '2011-10-04 12:00:00', '2011-10-03 13:26:48', 'Send a letter to my sister', 'Send a letter to my sister with important information about what needs to be done.', 'Letter not needed, I called her.', 'VOIDED', 0,2);
INSERT INTO `todo` (`id`, `priority`, `created_on`, `last_modified_on`, `due_on`, `title`, `description`, `comment`, `status`, `deleted`,`user_id`)
    VALUES (NULL, 1, '2010-04-07 17:28:52', '2010-07-01 00:00:00', '2010-05-12 11:47:00', 'Book air tickets', 'Book air tickets to Canary Islands, for 3 people.\r\n', '', 'PENDING', 0,5);
INSERT INTO `todo` (`id`, `priority`, `created_on`, `last_modified_on`, `due_on`, `title`, `description`, `comment`, `status`, `deleted`,`user_id`)
    VALUES (NULL, 2, '2011-10-07 10:44:47', '2011-11-01 00:00:00', '2011-10-24 10:46:14', 'Pay electricity bills', 'Pay electricity bills for the house.', 'Paid.', 'DONE', 0,1);";
        query($sql);
        
        $sql = "CREATE TABLE `user` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `f_name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
    `l_name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
    `gender` CHAR(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
    `email` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
    `status` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'PENDING'
) ENGINE = MYISAM DEFAULT CHARSET=utf8;

ALTER TABLE `user` ADD INDEX (`email`);

-- data

INSERT INTO user (id, f_name, l_name, gender, email, status)
    VALUES (NULL, 'Bob', 'Brown', 'm', 'bob@gmail.com', 'ACTIVE');
    INSERT INTO user (id, f_name, l_name, gender, email, status)
    VALUES (NULL, 'Mary', 'Smith', 'f', 'mary@gmail.com', 'VOIDED');
    INSERT INTO user (id, f_name, l_name, gender, email, status)
    VALUES (NULL, 'Daniel', 'Walton', 'm', 'dan@gmail.com', 'PENDING');
    INSERT INTO user (id, f_name, l_name, gender, email, status)
    VALUES (NULL, 'Mark', 'Taylor', 'm', 'mark@gmail.com', 'ACTIVE');
    INSERT INTO user (id, f_name, l_name, gender, email, status)
    VALUES (NULL, 'Sarah', 'Hamilton', 'f', 'sarah@gmail.com', 'PENDING');";      
        query($sql);
    }