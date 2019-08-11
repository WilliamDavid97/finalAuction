<form action="" method="post">
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <td>Number</td>
                    <td>User Name</td>
                    <td>PhoneNo</td>
                    <td>Email</td>
                    <td>NRC</td>
                    <td>Image</td>
                    <td>Address</td>
                    <td>Date Of Birth</td>
                    <td>Gender</td>
                    <td>Role</td>
                    <th>Subscriber</th>
                    <th>Admin</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        $no=1;
                        $query="SELECT * FROM user";
                        $result=mysqli_query($conn,$query);
                        if(!$result){
                            die("Query Failed".mysqli_error($result));
                        }
                        while ($row=mysqli_fetch_assoc($result)) {
                             $user_id=$row['user_id'];
                             $user_name=$row['fullname'];
                             $phoneNo=$row['phNo'];
                             $email=$row['email'];
                             $nrc=$row['nrc'];
                             $address=$row['address']; 
                             $dob=$row['dob']; 
                             $gender=$row['gender']; 
                             $role=$row['role'];
                             $user_image=$row['user_image'];
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $user_name ?></td>
                        <td><?php echo $phoneNo ?></td>
                        <td><?php echo $email ?></td>
                        <td><?php echo $nrc ?></td>
                        <td>
                            <img src="../images/user_image/<?php echo $user_image ?>" class="img-responsive" width="100px">
                        </td>
                        <td><?php echo $address ?></td>
                        <td><?php echo $dob ?></td>
                        <td><?php echo $gender ?></td>
                        <td><?php echo $role ?></td>
                        <td><a href="user.php?subscriber=<?php echo $user_id ?>" class="btn btn-info">subscriber</a></td>
                        <td><a href="user.php?admin=<?php echo $user_id ?>" class="btn btn-info">admin</a></td>
                        <td><a href="user.php?delete=<?php echo $user_id ?>" class="btn btn-danger">delete</a></td>
                        <td><a href="user.php?source=<?php echo 'update_user'?>&update=<?php echo $user_id ?>" class="btn btn-success">edit</a></td> 
                    </tr>
                    <?php
                    $no++;
                        }
                    ?>
            </tbody>
        </table>
    </div>
</form>