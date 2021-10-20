<?php 
  include ('../Includes/header.php');
  include ('../Includes/config.php');
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Patient Portal</title>
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
<div class="container text-center">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    <div class="well">
                        <p><span class="badge">2</span> Message History: </p><br> <?php  
              $mid = $_GET['Message_ID'];
              $query = "SELECT * FROM message_reply WHERE Message_ID = '$mid' ORDER BY Time_Replied ASC";
              $data = mysqli_query($connection,$query);
              $total = mysqli_num_rows($data);
          if ($total != 0) 
           {
              ?> <table id="myTable" class="table table-stripped table-primary table-hover " align="center">
                            <tr>
                                <th hidden>Message_ID</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Message Content</th>
                                <th>Date Send</th>
                                <th>Time Send</th>
                                <th>Message Status</th>
                            </tr> <?php 

            while ($result=mysqli_fetch_assoc($data))
             {
                echo "<tr>
                    <td hidden>".$result['Message_ID']."</td>
                    <td class='fullName'>".$result['Sender_Email']."</td>
                    <td>".$result['Receiver_Email']."</td>
                    <td >".$result['Message_Reply']."</td>
                    <td >".$result['Date_Replied']."</td>
                    <td >".$result['Time_Replied']."</td> 
                    <td>".$result['Message_Status']."</td> 
                     </tr>";
            }   
    } ?>
                        </table>
                        <div class="row">
                            <div class="col-sm-2 text-center"></div>
                            <div class="col-sm-12">
                                <!--             <h4>Conversation with : <small><?php //echo $_GET['Sender_Email']; ?></small></h4> -->
                                <h2> Title : <?php echo $_GET['Title']; ?></h2>
                                <p><b>Content : </b> <?php echo $_GET['Message_Content']; ?></p>
                                <form method="GET" action="action.php" class="Messagereply-form">
                                    <div class="message-container">
                                        <div class="form-group mb-2" hidden>
                                            <td>Message ID</td>
                                            <td><input type="text" name="Message_ID" value="<?php echo $_GET['Message_ID'] ?>" class="form-control" autocomplete="off" readonly> </td>
                                        </div>
                                        <div class="form-group mb-2" hidden>
                                            <td>Sender</td>
                                            <td><input type="text" name="Sender_Email" value="<?php echo $_SESSION['Email'] ?>" class="form-control" autocomplete="off" readonly> </td>
                                        </div>
                                        <div class="form-group mb-2" hidden>
                                            <label class="form-label"><b>To:</b></label>
                                            <input type="text" name="Receiver_Email" style="width: 50%;" autocomplete="off" class="form-control" value="<?php echo $_GET['Sender_Email'] ?>" readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label"><b>Message :</b></label>
                                            <textarea type="text" class="form-control" required style="width: 50%; margin:auto ;" name="Message_Reply"></textarea>
                                        </div>
                                        <div class="form-group mb-2" hidden>
                                            <label class="form-label"><b>Date</b></label>
                                            <input type="Date" name="Date_Replied" class="form-control" value="<?php echo date('Y-m-d'); ?>" required autocomplete="off" readonly>
                                        </div>
                                        <div class="form-group mb-2" hidden="">
                                            <label class="form-label"><b>Time</b></label>
                                            <input type="Time" name="Time_Replied" class="form-control" value="<?php echo date('H:i'); ?>" required autocomplete="off" readonly>
                                        </div>
                                        <div class="form-group mb-2" hidden>
                                            <label class="form-label"><b>Status</b></label>
                                            <input type="text" name="Message_Status" class="form-control" required autocomplete="off" value="New" readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <button type="submit" name="btnReply" style="width: 50%;" class="btn btn-success">Reply</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 </body>
 </html>

 <?php include ('../Includes/footer.php'); ?>