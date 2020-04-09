<html>

<head></head>

<body>

<?php echo phpinfo(); ?>
<?php  
        // Variables to tune the retry logic.    	
        $connectionTimeoutSeconds = 30;  // Default of 15 seconds is too short over the Internet, sometimes.  
        $maxCountTriesConnectAndQuery = 3;  // You can adjust the various retry count values.  
        $secondsBetweenRetries = 4;  // Simple retry strategy.  
        $errNo = 0;  
	//	$serverName = "tcp:s18.winhost.com,1433"; 
        $serverName = "tcp:s18.winhost.com,1433";  
    //    
	$connectionOptions =   
           array("UID"=>"DB_97863_as_user", "PWD"=>"uh..uh..uh", "DATABASE"=>"DB_97863_as");  
        $conn = sqlsrv_connect( $serverName, $connectionOptions);
            if ($conn == true) 
			   {  
                echo "Connection was established";  
                echo "<br>";
				                $tsql = "SELECT Username FROM  [DB_97863_as].[dbo].[Users]";  
                $stmt = sqlsrv_query($conn, $tsql);  
                if ($stmt == false) {
                    echo "Error in query execution";  
                    echo "<br>";  
                    die(print_r(sqlsrv_errors(), true));  
                }
				echo "Milestone 1";  
                echo "<br>";
                while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {     
                    echo $row['Username'] . "<br/>" ;
                }  
                sqlsrv_free_stmt($stmt);  
                sqlsrv_close( $conn); 
                break; 
                }
             else
                 {
// print output
                 echo 'Not connected';
				 echo "<br>";
				 die( print_r( sqlsrv_errors(), true));
                 }
				
?>  


