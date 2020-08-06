<?php

/**
 * 
 */
class DB 
{
    protected function connect()
	{
		//connection
		try {
            //'0608SQL-typo3'
    		$conn = new PDO("mysql:host=localhost:3306;dbname=dbtask;charset=UTF8", 'root', '09201996', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    // set the PDO error mode to exception
    		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		//echo "Connected successfully";




    		return $conn;


    		}
		catch(PDOException $e)
    		{
    		echo "Connection failed: " . $e->getMessage();
    		}

	}

    



}



