<?php

include("../Assets/Connection/Connection.php");
session_start();

?>

<!DOCTYPE html>
    <html lang="en">

        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta http-equiv="x-ua-compatible" content="ie=edge">

            <title>Chat</title>
            <link rel="icon" type="image/png" href="../Assets/friendskit/assets/img/favicon.png" />
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
            <!-- Core CSS -->
            <link rel="stylesheet" href="../Assets/friendskit/assets/css/app.css">
            <link rel="stylesheet" href="../Assets/friendskit/assets/css/core.css">

        </head>
        
        
         <body>

        <!-- Pageloader -->
        <div class="pageloader"></div>
        <div class="infraloader is-active"></div>

        <div class="chat-wrapper is-standalone">
        <div class="chat-inner">



<!-- Chat top navigation -->    



<?php


   $selQry =  "select * from tbl_doctor where doctor_id='".$_GET["id"]."'";
  
    $result=$Conn->query($selQry);
    if($row=$result->fetch_assoc())
    {

?>
<div class="chat-nav">
    <div class="nav-start">
        <div class="recipient-block">
            <div class="avatar-container">
                <img class="user-avatar" src="../Assets/FILES/doctorPhoto/<?php echo $row["doctor_photo"];?>" alt="display imahe">
            </div>
            <div class="username">
                <span><?php echo $row["doctor_name"];?></span>
            </div>
        </div>
    </div>
    <div class="nav-end">

        <a href="hompage.php" class="chat-nav-item is-icon is-hidden-mobile">
        <i data-feather="home"></i>
    </a>

    </div>
</div>

<?php
    }
?>



<!-- Chat sidebar -->
<div id="chat-sidebar" class="users-sidebar">   
    <!-- User list -->
    <div class="conversations-list has-slimscroll-xs">
        <!-- User -->
        <?php
                echo $selQry1 =  "select * from tbl_dchat cd inner join tbl_user u on u.user_id=cd.dchat_fromuid where dchat_fromdid='".$_GET["id"]."'";
                $result1=$Conn->query($selQry1);
            while ($row1=$result1->fetch_assoc()) {
        ?>
        <div class="user-item">
            <div class="avatar-container">
                <img class="user-avatar" style="width: 32px; height:32px "  src="../Assets/FILES/UserPhoto/<?php echo $row1["user_photo"];?>" alt="<?php echo $row["user_photo"];?>">
            </div>
        </div>
        <?php
            }
        ?>

    </div>
</div>

<!-- Chat body -->
<div id="chat-body" class="chat-body">
    <!-- Conversation -->
    <div id="conversation" class="chat-body-inner has-slimscroll">

    </div>
    <!-- Compose message area -->
    <div class="chat-action">
        <div class="chat-action-inner">
            <div class="control" style="text-align: center">
                <textarea class="textarea comment-textarea" id="msg" rows="2"></textarea>
                <input type="hidden" value="<?php echo $_GET["id"]; ?>" name="txt_hid"  id="txt_id" onclick="sendChat()">
                <input type="button" value="Send" name="btn_send"  id="btn_send" onclick="sendChat()"
                       style="border: none;background-color: #5082c3;border-radius: 15px 10px; color: white;
                       margin: 10px; margin-bottom: 30px ; width: 30%; height: 25px">

            </div>
        </div>
    </div>

</div>

</div>
        </div>
        <script src="../Assets/JQuery/jQuery.js"></script>

        <script>

                                    function sendChat()
                                    {

                                        var chat = document.getElementById("msg").value;
                                        var id = document.getElementById("txt_id").value;
                                        if (chat.length <= 35)
                                        {
                                            $.ajax({url: "../Assets/AjaxPages/AjaxChat.php?chat=" + chat+"&id=" +id,
                                                success: function(result) {


                                                    document.getElementById("msg").value = "";

                                                    $('#conversation').animate({scrollTop: $('#conversation')[0].scrollHeight});


                                                }});
                                        }
                                        else
                                        {
                                            alert("Character Length less Than 35 Allowed");
                                            document.getElementById("msg").value = "";

                                            $('#conversation').animate({scrollTop: $('#conversation')[0].scrollHeight});
                                        }

                                    }
                                    $(document).ready(function() {
                                        setInterval(function() {
                                            var cid = document.getElementById("txt_id").value;
                                            
											$("#conversation").load('../Assets/AjaxPages/AjaxLoad.php?cid='+cid)
                                        }, 50);
                                    });

        </script>
        <!-- Concatenated js plugins and jQuery -->
        <script src="../Assets/friendskit/assets/js/app.js"></script>
        <script src="https://js.stripe.com/v3/"></script>
        <script src="../Assets/friendskit/assets/data/tipuedrop_content.js"></script>

        <!-- Core js -->
        <script src="../Assets/friendskit/assets/js/global.js"></script>

        <!-- Navigation options js -->
        <script src="../Assets/friendskit/assets/js/navbar-v1.js"></script>
        <script src="../Assets/friendskit/assets/js/navbar-v2.js"></script>
        <script src="../Assets/friendskit/assets/js/navbar-mobile.js"></script>
        <script src="../Assets/friendskit/assets/js/navbar-options.js"></script>
        <script src="../Assets/friendskit/assets/js/sidebar-v1.js"></script>

        <!-- Core instance js -->
        <script src="../Assets/friendskit/assets/js/main.js"></script>
        <!--        <script src="../Assets/friendskit/assets/js/chat.js"></script>-->
        <script src="../Assets/friendskit/assets/js/touch.js"></script>
        <script src="../Assets/friendskit/assets/js/tour.js"></script>

        <!-- Components js -->
        <script src="../Assets/friendskit/assets/js/explorer.js"></script>
        <script src="../Assets/friendskit/assets/js/widgets.js"></script>
        <script src="../Assets/friendskit/assets/js/modal-uploader.js"></script>
        <script src="../Assets/friendskit/assets/js/popovers-users.js"></script>
        <script src="../Assets/friendskit/assets/js/popovers-pages.js"></script>
        <script src="../Assets/friendskit/assets/js/lightbox.js"></script>




    </body>

</html>