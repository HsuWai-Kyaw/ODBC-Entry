<?php
require_once("server/config.php");

if(isset($_GET['id'])) {
    $user_id = $_GET['id'];
    
    $user_details = Fetch_User_Details($conn, $user_id);
    
    if($user_details) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>User Details</title>
            <link rel="stylesheet" href="css/style2.css">
        </head>
        <body>
            <div class="container">
                <h1>User Details</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Column</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($user_details as $column => $value) {
                            ?>
                            <tr>
                                <td><?php echo $column; ?></td>
                                <td><?php echo $value; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <hr><br>
                <a href="index.php" class="button">Back</a>
            </div>
            
        </body>
        </html>
        <?php
    } else {
        echo "User not found.";
    }
} else {
    echo "User ID not provided.";
}

function Fetch_User_Details($conn, $user_id) {
    $user_details = array();
    
    $sql = "SELECT * FROM users WHERE id = '$user_id'";
    $result = odbc_exec($conn, $sql);
    
    if($result) {
        if(odbc_fetch_row($result)) {
            $num_fields = odbc_num_fields($result);
            for($i = 1; $i <= $num_fields; $i++) {
                $column_name = odbc_field_name($result, $i);
                $user_details[$column_name] = odbc_result($result, $i);
            }
        }
    } else {
        echo "Error fetching user details: " . odbc_errormsg($conn);
    }
    
    return $user_details;
}
?>
