<?php


$conn = new COM('ADODB.Connection');

$db = 'C:\Users\davidmarsh\bookdata.accdb';

$conn->Open("DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=$db");

 

$conn->close;


$database="C:\Users\davidmarsh\bookdata.accdb";
try {
    $dbh = new PDO("odbc:DSN=MS Access Database;DBq=$database;");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM tablename";    
    $STH = $dbh->query($sql);    
    $STH->setFetchMode(PDO::FETCH_ASSOC); 
}
catch(PDOException $e) {  
    echo $e->getMessage()."\n";
    exit;
}

exit;
# close the connection
$dbh = null;

$bits = 8 * PHP_INT_SIZE;
echo "(Info: This script is running as $bits-bit.)\r\n\r\n";

//$connStr = 
//        'odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};' .
 //       'Dbq=C:\\Users\davidmarsh\bookdata.accdb;';
		
		$connStr = 
        'odbc32:Driver={Microsoft Access Driver (*.mdb, *.accdb)};' .
        'Dbq=bookdata.accdb;';

$dbh = new PDO($connStr);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 
        "SELECT * from web_dept";
$sth = $dbh->prepare($sql);

// query parameter value(s)

$sth->execute($params);

while ($row = $sth->fetch()) {
    echo $row['AgentName'] . "\r\n";
}