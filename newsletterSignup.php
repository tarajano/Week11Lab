<?php
    // Adapted from: https://www.formget.com/form-validation-using-php/
    // Initialize variables to null.
    $customerNameError = $emailAddressError = $phoneNumberError = $referralError = "";

    // On submitting form below function will execute.
    if(isset($_POST['submit'])){
        if (empty($_POST["customerName"])) {
            $customerNameError = "Name is required";
        } else {
            $customerName = test_input($_POST["customerName"]);
            // check name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$customerName)) {
                $customerNameError = "Only letters and white space allowed";
            }
        }
        if (empty($_POST["emailAddress"])) {
            $emailAddressError = "Email is required";
        } else {
            $emailAddress = test_input($_POST["emailAddress"]);
            // check if e-mail address syntax is valid or not
            if (!preg_match("/([w-]+@[w-]+.[w-]+)/",$emailAddress)) {
                $emailAddressError = "Invalid Email address format";
            }
        }
        if (empty($_POST["phoneNumber"])) {
            $phoneNumberError = "Phone is required";
        } else {
            $phoneNumber = test_input($_POST["phoneNumber"]);
            // check if phone syntax is valid or not
            if (!preg_match("\"/^[0-9]{3}-?[0-9]{3}-?[0-9]{4}$/\"",$phoneNumber)) {
                $phoneNumberError = "Invalid phone format";
            }
        }
        if (empty($_POST["referral"])) {
            $referralError = "Referral is required";
        } else {
            $referral = test_input($_POST["referral"]);
        }
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>