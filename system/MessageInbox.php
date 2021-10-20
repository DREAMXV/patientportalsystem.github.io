<?php 
include ('../Includes/header.php'); 
include ('../Includes/config.php'); 

    $email = $_SESSION['Email'];

    $query = "SELECT * FROM message WHERE Sender_Email ='$email' OR Receiver_Email ='$email'" ;
    $data  = mysqli_query($connection,$query);
    $total = mysqli_num_rows($data);

   if ($total != 0) 
    {
        ?>

       <table id="myTable" class="table table-stripped table-primary table-hover "  align="center">
        <tr>
            <th hidden>Message_ID</th>
            <th>From</th>
            <th>To</th>
            <th>Title</th>
            <th hidden>Message Content</th>
            <th hidden>Date Send</th>
            <th hidden>Time Send</th>
            <th>Message Status</th>
            <th>Action</th>
        </tr>


        <?php 

            while ($result=mysqli_fetch_assoc($data))
             {
                echo "<tr>
                    <td hidden>".$result['Message_ID']."</td>
                    <td class='fullName'>".$result['Sender_Email']."</td>
                    <td>".$result['Receiver_Email']."</td>
                    <td >".$result['Title']."</td>
                    <td hidden>".$result['Message_Content']."</td>
                    <td hidden>".$result['Date_Send']."</td>
                    <td hidden>".$result['Time_Send']."</td> 
                    <td>".$result['Message_Status']."</td> 

                    <td><a class='btn btn-warning'
                    href='Conversation.php? 
                    Message_ID=$result[Message_ID] &
                    Sender_Email=$result[Sender_Email] &
                    Receiver_Email=$result[Receiver_Email] &
                    Title=$result[Title] &
                    Message_Content=$result[Message_Content] &
                    Date_Send=$result[Date_Send] &
                    Time_Send=$result[Time_Send] &
                    Message_Status=$result[Message_Status]'> Reply </a> 
                     </tr>";
            }   
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Patient Portal - Message Inbox</title>
    <!-- Bootstrap Library -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- JS Bundle Library -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- icons -->
    <script src="https://kit.fontawesome.com/0f00ad16f2.js" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>  
<div class="form-group mb-3">
    <input type="text" id="myInput" placeholder="Search by Sender Email" class="form-control">
    </div>
 
</table>
</div>
<script src="../js/script.js"></script>   
</body>
</html>

<?php include ('../Includes/footer.php'); ?>