<?php


function is_logged()
{
    if (isset($_SESSION['is_logged']) && $_SESSION['is_logged'] == 1 && isset($_SESSION['admin'])) {
        return true;
    }
    return false;
}

function validateMemberInput ($input)
{
    $errors = array();

    if (!isset($input['username']) || strlen(trim($input['username'])) < 3 || strlen(trim($input['username'])) > 250 ){
        $errors['username'] = 'Incorect username';
    }
    return $errors;
}

function createNewMember ($table, $insertData)
{
    global $connection;

    mysqli_query($connection, "
        INSERT INTO {$table}
        SET
        fname = '{$insertData[fname]}',
        sname = '{$insertData[sname]}',
        username = '{$insertData['username']}',
        password = '{$insertData['password']}',
        email = '{$insertData['email']}';
        ");
}
