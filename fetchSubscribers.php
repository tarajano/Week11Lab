<?php
/**
 * Created by PhpStorm.
 * User: tarajano
 * Date: 06/04/18
 * Time: 1:58 PM
 */

function getMailingListTable(){
    $tableIni='<table id="subscribers"><thead><tr><td>Name</td><td>Phone</td><td>Email</td></tr></thead><tbody>';
    $tableEnd='</tbody></table>';
    return $tableIni . compileMailingList() . $tableEnd;
}

function compileMailingList(){
    $servername = "localhost";
    $username = "wp_eatery";
    $password = "password";
    $db = "wp_eatery";
    $subscribersTableBody='';

    $conn = new mysqli($servername, $username, $password, $db);

    if ($conn->connect_error)
        return '<tr><td colspan="3">'. $conn->error .'</td><td></td><td></td></tr>';

    $query = 'select customerName, phoneNumber, emailAddress from mailingList';
    $result = $conn->query($query);

    if ($result->num_rows > 0){
        while($row = $result->fetch_row())
            $subscribersTableBody .= sprintf('<tr><td>%s</td><td>%s</td><td>%s</td></tr>', $row[0], $row[1], $row[2]);
        return $subscribersTableBody;
    } else
        return '<tr><td colspan="3">Zero results</td><td></td><td></td></tr>';

    return '<tr><td colspan="3">Ups</td><td></td><td></td></tr>';
}

?>