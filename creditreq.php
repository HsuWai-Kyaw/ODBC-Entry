<?php
require_once("server/config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $parentFirstName = $_POST['parent_first_name'];
    $parentLastName = $_POST['parent_last_name'];
    $streetAddress = $_POST['street_address'];
    $streetAddress2 = $_POST['street_address_2'];
    $city = $_POST['city'];
    $region = $_POST['region'];
    $postalCode = $_POST['postal_code'];
    $postalSelect = $_POST['postal_select'];
    $phone = $_POST['phone'];
    $participantFirstName = $_POST['participant_first_name'];
    $participantLastName = $_POST['participant_last_name'];
    $dob = $_POST['dob'];
    $activity = $_POST['activity'];
    $classCode = $_POST['class_code'];
    $startDate = $_POST['start_date'];
    $amountPaid = $_POST['amount_paid'];
    $reasonForCreditRequest = $_POST['reason_for_credit_request'];
    $explanation = $_POST['explanation'];
    $totalCreditRequested = $_POST['total_credit_requested'];

    Insert_User($conn, $parentFirstName, $parentLastName, $streetAddress, $streetAddress2, $city, $region, $postalCode, $postalSelect, $phone, $participantFirstName, $participantLastName, $dob, $activity, $classCode, $startDate, $amountPaid, $reasonForCreditRequest, $explanation, $totalCreditRequested);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credit Request Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Credit Request Form</h1>
        <form method="POST" action="creditreq.php">
            <div class="form-group">
                <label for="parent_first_name">Parent Name</label>
                <div class="input-group">
                    <input type="text" id="parent_first_name" name="parent_first_name" placeholder="First">
                    <input type="text" id="parent_last_name" name="parent_last_name" placeholder="Last">
                </div>
            </div>
            <div class="form-group">
                <label for="street_address">Address</label>
                <input type="text" id="street_address" name="street_address" placeholder="Street Address">
            </div>
            <div class="form-group">
                <input type="text" id="street_address_2" name="street_address_2" placeholder="Street Address Line 2">
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" id="city" name="city" placeholder="City">
                    <input type="text" id="region" name="region" placeholder="Region">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" id="postal_code" name="postal_code" placeholder="Postal / Zip Code">
                    <select name="postal_select" id="postal_select">
                        <option value="1" selected disabled>Romania</option>
                        <option value="2">Opt 1</option>
                        <option value="3">Opt 2</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" placeholder="### ### ####">
            </div>
            <div class="form-group">
                <label for="participant_first_name">First Participant's Name</label>
                <div class="input-group">
                    <input type="text" id="participant_first_name" name="participant_first_name" placeholder="First">
                    <input type="text" id="participant_last_name" name="participant_last_name" placeholder="Last">
                </div>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob">
            </div>
            <div class="form-group">
                <label for="activity">Activity</label>
                <input type="text" id="activity" name="activity">
            </div>
            <div class="form-group">
                <label for="class_code">Class Code</label>
                <input type="text" id="class_code" name="class_code">
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" id="start_date" name="start_date">
            </div>
            <div class="form-group">
                <label for="amount_paid">Amount Paid</label>
                <input type="number" step="0.01" id="amount_paid" name="amount_paid" placeholder="USD 0.00">
            </div>
            <div class="form-group">
                <label for="reason_for_credit_request">Reason for Credit Request</label>
                <input type="text" id="reason_for_credit_request" name="reason_for_credit_request">
            </div>
            <div class="form-group">
                <label for="explanation">Explanation</label>
                <textarea name="explanation" id="explanation" rows="4" cols="54"></textarea>
                <!-- <input type="text" id="explanation" name="explanation"> -->
            </div>
            <div class="form-group">
                <label for="total_credit_requested">Total Credit Requested</label>
                <input type="number" step="0.01" id="total_credit_requested" name="total_credit_requested" placeholder="USD 0.00">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Submit">
                <!-- <button type="submit" name="submit">Submit</button> -->
                <input type="reset" name="reset" value="Reset">
                <br>
                <hr>
                <a href="index.php" class="button">Back</a>
                <br>
                <hr>
                
            </div>
        </form>
    </div>
</body>
</html>
