<?php
session_start();
include_once "php/config.php";
if (!isset($_SESSION['unique_id'])) {
  header("location: login.php");
}
?>
<?php include_once "header.php"; ?>

<head>

    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
 -->


    <!-- <style>
     .chat_message_area {
        position: relative;
        width: 100%;
        height: auto;
        background-color: #FFF;
        border: 1px solid #CCC;
        border-radius: 3px;
    }

    #group_chat_message {
        width: 100%;
        height: auto;
        min-height: 80px;
        overflow: auto;
        padding: 6px 24px 6px 12px;
    } 

     .image_upload {
        position: sticky;
        top: 90px;
        left: 910px;
    }

    .image_upload>form>input {
        display: none;
    }

    .image_upload img {
        width: 24px;
        cursor: pointer;
    }
    </style> -->


</head>

<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <?php
        $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
        $sql = mysqli_query($conn, "SELECT * FROM dt_user WHERE unique_id = {$user_id}");
        if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
          
        } else {
          header("location: users.php");
        }
        ?>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="../files/user_imgs/<?php echo $row['user_profile_img']; ?>" alt="">
                <div class="details">
                    <span><?php echo $row['user_name']?></span>
                    <p><?php echo $row['status']; ?></p>
                </div>
                <!-- <div class="image_upload">
                    <form id="uploadImage" method="post" action="upload.php">
                        <label for="uploadFile"><img src="upload.png" /></label>
                        <input type="file" name="uploadFile" id="uploadFile" accept=".jpg, .png" />
                    </form>
                </div> -->


            </header>
            <div class="chat-box">

            </div>


            <form action="#" class="typing-area" >
                <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Type a message here..."
                    autocomplete="off" contenteditable >
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>

            <!-- <script>
        
              
                $('.input-field').emojioneArea({
                    pickerPosition: "top",
                    toneStyle: "bullet"
                });
            


            $('#uploadFile').on('change', function() {
                $('#uploadImage').ajaxSubmit({
                    target: ".input-field",
                    resetForm: true
                });
            });
            </script>







        </section> -->
    </div>

    <script src="javascript/chat.js"></script>

</body>

</html>