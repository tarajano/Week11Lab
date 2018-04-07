<?php
    // Adapted from: https://www.formget.com/form-validation-using-php/
    // Initialize variables to null.
    $customerNameError = $emailAddressError = $phoneNumberError = $referralError = $isError = "";
    $customerName = $emailAddress = $phoneNumber= $referral = "";
    $storeSubscriberFeedback = "";

    // On submitting form below function will execute.
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnSubmit'])){
        if (empty($_POST["customerName"])) {
            $customerNameError = "Name is required";
        } else {
            $customerName = test_input($_POST["customerName"]);
            // check name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$customerName)) {
                $customerNameError = "Enter a valid name";
            }
        }
        if (empty($_POST["emailAddress"])) {
            $emailAddressError = "Email is required";
        } else {
            $emailAddress = test_input($_POST["emailAddress"]);
            // emailPattern tested at: https://regex101.com/
            $emailPattern = "/^[\w\d\._]+@[\w\d-]+\.[\w]{2,3}$/";
            if (!preg_match($emailPattern,$emailAddress)) {
                $emailAddressError = "Enter a valid Email";
            }
        }
        if (empty($_POST["phoneNumber"])) {
            $phoneNumberError = "Phone is required";
        } else {
            $phoneNumber = test_input($_POST["phoneNumber"]);
            // check if phone syntax is valid or not
            if (!preg_match("/^\d{3}-?\d{3}-?\d{4}$/",$phoneNumber)) {
                $phoneNumberError = "Enter a valid Phone";
            }
        }
        if (empty($_POST["referral"])) {
            $referralError = "Referral is required";
        } else {
            $referral = test_input($_POST["referral"]);
        }

        // now storing
        $isError = $customerNameError.$emailAddressError.$phoneNumberError.$referralError;
        if ( 0 == strcmp( $isError,"")) {
            $storeSubscriberFeedback = storeSubscriber($customerName, $phoneNumber, $emailAddress, $referral);
        }

    }

    function storeSubscriber($customerName, $phoneNumber, $emailAddress, $referral){
        $servername = "localhost";
        $username = "wp_eatery";
        $password = "password";
        $db = "wp_eatery";
        $storeSubscriberResponse = "storeSubscriberResponseEmpty";

        $conn = new mysqli($servername, $username, $password, $db);
        if ($conn->connect_error)
            return "Connection failed: " . $conn->error;

        if (!emailExists($conn, $emailAddress))
            return persistSubscriber($conn, $customerName, $phoneNumber, $emailAddress, $referral);
        else
            return "Ups! That Email is already subscribed.";
    }

    function persistSubscriber($conn, $customerName, $phoneNumber, $emailAddress, $referral){
        $query = sprintf("insert into mailingList (customerName, phoneNumber, emailAddress, referrer) values ('%s','%s','%s','%s')",
                                $customerName, $phoneNumber, $emailAddress, $referral);
        if ($conn->query($query) === TRUE)
            return "Registration successful.";
        else
            return "Registration failed. " . $conn->error;
    }

    function emailExists($conn, $email){
        $result = $conn->query(sprintf("select _id from mailingList where emailAddress='%s'",$email));
        if ($result->num_rows > 0)
            return true;
        return false;
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>