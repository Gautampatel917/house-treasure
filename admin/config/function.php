<?php

session_start();

require 'dbconn.php';

function validate($inputData)
{
    global $conn;
    $validatedData = mysqli_real_escape_string($conn, $inputData);
    return trim($validatedData);
}


function redirect($url, $status)
{
    // echo "<script>alert('Please fill all fields')</script>";
    $_SESSION['status'] = $status;
    header('Location: ' . $url);
    exit(0);
}

function getCount($tableName)
{
    global $conn;

    $table = validate($tableName);
    $query = "SELECT * FROM $table";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    return $count;
}

function alertMessage()
{
    if (isset($_SESSION['status'])) {
        echo '<div class = "alert alert-success">
        <strong>' . $_SESSION['status'] . '</strong>
        </div>';
        unset($_SESSION['status']);
    }
}

function getAll($tableName)
{
    global $conn;

    $table = validate($tableName);

    $query = "SELECT * FROM $tableName";
    $result = mysqli_query($conn, $query);
    return $result;
}

function checkParamId($paramType)
{
    if (isset($_GET[$paramType])) {
        if ($_GET[$paramType] != null) {
            return $_GET[$paramType];
        } else {
            return 'No id found';
        }
    } else {
        return 'No id given';
    }
}

//this function are use for getting id and change the user record
function getById($tableName, $id)
{
    global $conn;

    $table = validate($tableName);
    $id = validate($id);

    $query = "SELECT * FROM $table WHERE id='$id' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $response = [
                'status' => 200,
                'message' => 'record fetched',
                'data' => $row
            ];
            return $response;
        } else {
            $response = [
                'status' => 404,
                'message' => 'No record found'
            ];
            return $response;
        }
    } else {
        $response = [
            'status' => 500,
            'message' => 'something went wrong'
        ];
        return $response;
    }
}

function logoutSession()
{
    unset($_SESSION['auth']);
    unset($_SESSION['loggedInUserRole']);
    unset($_SESSION['loggedInUser']);
}

//delete query for user delete 

function deleteQuery($tableName, $dataId)
{
    global $conn;

    $id = validate($dataId);
    $table = validate($tableName);
    $query = "DELETE FROM $table WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    return $result;
}

//------------------- Over CRUD Operation ------------------------------
