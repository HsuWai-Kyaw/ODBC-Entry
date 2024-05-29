<?php

$server = "DESKTOP-CCE15IE";
$database = "CRF";
$username = "kaung"; 
$password = "12345678";
$conn = odbc_connect("Driver={SQL Server};Server=$server;Database=$database;", $username, $password);

if (!$conn) {
    die("Connection failed: " . odbc_errormsg());
}

function Select_Table($table_name , $conn){

    $query = "EXEC SelectFromTable 'Users'";
    $result = odbc_exec($conn, $query);

    if (!$result) {
        return false;
    }else{
        if (odbc_fetch_row($result)) {
             return($result);
        }
    }
    odbc_close($conn);
}

function Insert_User($conn, $parentFirstName, $parentLastName, $StreetAddress, $StreetAddress2, $city, $region, $postalCode, $postalSelect, $phone, $participantFirstName, $participantLastName, $dob, $activity, $classCode, $startDate, $amountPaid, $reasonForCreditRequest, $explanation, $totalCreditRequested) {

    if ($conn) {
        $parentFirstName = odbc_escape_string($parentFirstName);
        $parentLastName = odbc_escape_string($parentLastName);
        $StreetAddress = odbc_escape_string($StreetAddress);
        $StreetAddress2 = odbc_escape_string($StreetAddress2);
        $city = odbc_escape_string($city);
        $region = odbc_escape_string($region);
        $postalCode = odbc_escape_string($postalCode);
        $postalSelect = odbc_escape_string($postalSelect);
        $phone = odbc_escape_string($phone);
        $participantFirstName = odbc_escape_string($participantFirstName);
        $participantLastName = odbc_escape_string($participantLastName);
        $dob = odbc_escape_string($dob);
        $activity = odbc_escape_string($activity);
        $classCode = odbc_escape_string($classCode);
        $startDate = odbc_escape_string($startDate);
        $amountPaid = odbc_escape_string($amountPaid);
        $reasonForCreditRequest = odbc_escape_string($reasonForCreditRequest);
        $explanation = odbc_escape_string($explanation);
        $totalCreditRequested = odbc_escape_string($totalCreditRequested);

        $sql = "EXEC InsertUser '$parentFirstName', '$parentLastName', '$StreetAddress', '$StreetAddress2', '$city', '$region', '$postalCode', '$postalSelect', '$phone', '$participantFirstName', '$participantLastName', '$dob', '$activity', '$classCode', '$startDate', $amountPaid, '$reasonForCreditRequest', '$explanation', $totalCreditRequested";

        $result = odbc_exec($conn, $sql);

        if ($result) {
            header("Location: index.php");
            exit();
            
        }else{
           
            echo "Error executing procedure: " . odbc_errormsg($conn);
        }

        odbc_free_result($result);

        odbc_close($conn);
    } else {
        echo "Connection failed: " . odbc_errormsg();
    }
}

function odbc_escape_string($str) {
    return str_replace("'", "''", $str);
}

function Fetch_Users($conn) {
    $users = array();
    
    $query = "SELECT * FROM Users";
    $result = odbc_exec($conn, $query);
    
    if (!$result) {
        die("Query failed: " . odbc_errormsg($conn));
    }
    
    while ($row = odbc_fetch_array($result)) {
        $users[] = $row;
    }
    
    odbc_free_result($result);
    
    return $users;
}


?>
