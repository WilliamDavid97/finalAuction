
<style type="text/css">
    .aa{
        border: 1px solid #f00;
    }
</style>

              
              
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Number</th>
                                        <th>Messages</th>
                                        <th>User Id</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no=1;
                                        $query="SELECT * FROM feedback";
                                        $result=mysqli_query($conn,$query);
                                        if(!$result){
                                            die("Query Failed".mysqli_error($result));
                                        }
                                        while ($row=mysqli_fetch_assoc($result)) {
                                             $feedback_id=$row['feedback_id'];
                                             $message=$row['message'];
                                             $user_id=$row['user_id'];
                                                 
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $message ?></td>
                                            <td><?php echo $user_id ?></td>
                                            <td><a href="feedback.php?delete=<?php echo $feedback_id ?>" class="btn btn-danger">delete</a></td>
                                        </tr>
                                        <?php
                                        $no++;
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
            
                
        