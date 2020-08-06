<?php

function __autoload($class)
{
    require_once "classes/$class.php";
}

$q = intval($_GET['q']);

?>
<!DOCTYPE html>
<html lang="en">

                                                <?php 
                                                
                                                if ($q == 0){
                                                  $ch = new TaskCrud();
                                                  $rows = $ch->viewTaskList(); 
                                                }else{
                                                  $whereClause = "tbltask.TaskCategory = '".$q."'";
                                                  echo $whereClause;
                                                  $ch = new TaskCrud();
                                                  $rows = $ch->viewTaskListBy($whereClause);  
                                                }
                                                
                                                foreach ($rows as $row2)
                                                {
                                                ?>
                                            
                                                
                                                <tr>
                                                <td>
                                                    <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                                    <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td><?php echo $row2['Activity'] . ": " . $row2['Description']; ?></td>
                                                
                                                <td>
                                                    <?php 
                                                    $rows3 = $ch->viewPerson($row2['Task_ID']);
                                                    foreach($rows3 as $row3)
                                                    {
                                                    ?>
                                                    <img alt="image" src="assets/img/avatar/<?php echo $row3['PersonResponsible']; ?>.jpg" class="rounded-circle" width="35" data-toggle="tooltip" title="<?php echo $row3['FullName']; ?>">
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                
                                                <td>

                                                    <div class="badge badge-warning"> <?php echo $row2['status_desc']; ?></div>                 
                                                    
                                                </td>
                                                    
                                                    <td>
                                                   
                                                    <div class="badge badge-light"><?php echo $row['customer_name'] . ' - ' . $row2['category_name']; ?></div> 
                                                  
                                                    </td>
                                                    
                                                     <td>
                                                        <div class="badge badge-light"> <?php echo $row2['DateAdded']; ?></div> 
                                                       
                                                    </td>
                                                
                                                    <td><a href="view-task.php?id=<?php echo $row2['Task_ID']; ?>" class="btn btn-secondary">Details</a></td>
                                                </tr>
                                                <?php 
                                                }
                                                ?>

<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->
</html>