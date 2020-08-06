<?php

class TaskCrud extends DB
{

    //View all task...
    public function viewTaskList()
    {
        $sql = "SELECT * FROM `tbltask` INNER JOIN tbltaskcat ON tbltask.TaskCategory = tbltaskcat.taskcat_id INNER JOIN tblcustomers ON tblcustomers.customer_ID = tbltaskcat.customer_ID WHERE isActive = 1";
        
        $result2 = $this->connect()->query($sql);

		if($result2->rowCount() > 0)
		{
			//
			while ($row2 = $result2->fetch())
			{
				$data[] = $row2;
			}
			return $data;
		}
    }
    
    public function viewProperty($id)
    {
        
        $sql = "SELECT * FROM tbltaskgiven INNER JOIN tblusers ON tbltaskgiven.user_id = tblusers.User_ID WHERE task_id = " .$id;
        
        $result = $this->connect()->query($sql);

		if($result->rowCount() > 0)
		{
			//
			while ($row = $result->fetch())
			{
				$data[] = $row;
			}
			return $data;
		}
    }
    
    public function viewPerson($id)
    {
        
        $sql = "SELECT * FROM tbltaskuser INNER JOIN tblusers ON tbltaskuser.PersonResponsible = tblusers.User_ID WHERE task_id = 
        " .$id;
        
        $result = $this->connect()->query($sql);

		if($result->rowCount() > 0)
		{
			//
			while ($row3 = $result->fetch())
			{
				$data[] = $row3;
			}
			return $data;
		}
    }
    
    public function viewEmp($catID)
    {
        $sql = "SELECT * FROM tblusers WHERE Cat_ID =" .$catID;
        
        $result = $this->connect()->query($sql);

		if($result->rowCount() > 0)
		{
			//
			while ($row = $result->fetch())
			{
				$data[] = $row;
			}
			return $data;
		}
        
    }
    
    public function viewTaskCat()
    {
        $sql = "SELECT * FROM `tbltaskcat` INNER JOIN tblcustomers ON tblcustomers.customer_ID = tbltaskcat.customer_ID";
        
        $result = $this->connect()->query($sql);

		if($result->rowCount() > 0)
		{
			//
			while ($row = $result->fetch())
			{
				$data[] = $row;
			}
			return $data;
		}
    }
    
    public function viewCustomer()
    {
        $sql = "SELECT * FROM tblcustomers";
        
        $result = $this->connect()->query($sql);

		if($result->rowCount() > 0)
		{
			//
			while ($row = $result->fetch())
			{
				$data[] = $row;
			}
			return $data;
		}
    }
    
    public function viewMaxID()
    {
        $sql = "SELECT MAX(Task_ID) As Task_ID FROM `tbltask`";
        
        $result = $this->connect()->query($sql);

		if($result->rowCount() > 0)
		{
			//
			while ($row = $result->fetch())
			{
				$data[] = $row;
			}
			return $data;
		}
    }
    
    ////////////////////ADD METHOD///////////////////////
	public function insert($fields,$table_name)
	{
	$implodeColumns = implode(', ',array_keys($fields));
	$implodePlaceholder = implode(", :", array_keys($fields));
	//$sql = "INSERT INTO tb_companies ($implodeColumns) VALUES (:".$implodePlaceholder.")";

	$sql = "";
	$sql.="INSERT INTO ".$table_name;
	$sql.=" (".$implodeColumns.") ";
	$sql.="VALUES (:".$implodePlaceholder.")";

	$stmt = $this->connect()->prepare($sql);

		foreach ($fields as $key => $value) {
			$stmt->bindValue(':'.$key,$value);
		}

		$stmtExec = $stmt->execute();

		if ($stmtExec) {
			return 1;
			
		}
		else
		{
			return 0;
		}


	}

}

?>