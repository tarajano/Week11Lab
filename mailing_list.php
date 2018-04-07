<!DOCTYPE html>
<html>
<head>
    <title>Mailing list subscribers</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href='http://fonts.googleapis.com/css?family=Fugaz+One|Muli|Open+Sans:400,700,800' rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php
        include('fetchSubscribers.php');
        echo getMailingListTable();
    ?>
</body>
</html>