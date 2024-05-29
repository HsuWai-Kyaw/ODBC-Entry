<?php
require_once("server/config.php");

$users = Fetch_Users($conn); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    <div class="container">
    <a href="creditreq.php" class="button">Add +</a>
<hr><br>
        <h1>User List</h1>
        <table>
            <thead>
                <tr>
                    <th>Parent Name</th>
                    <th>Participant Name</th>
                    <th>Date of Birth</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['parent_first_name'] . ' ' . $user['parent_last_name']; ?></td>
                        <td><?php echo $user['participant_first_name'] . ' ' . $user['participant_last_name']; ?></td>
                        <td><?php echo $user['dob']; ?></td>
                        <td><a href='detail.php?id=<?php echo $user['id']; ?>'>Details</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
