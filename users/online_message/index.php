<?php
session_start();
if (isset($_SESSION['unique_id'])) {
  header("location: users.php");
}
?>

<?php include_once "header.php"; ?>

<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Realtime Chat App</header>

            <form action="#" method="POST" enctype="multipart/form-data" >
                <!--<div class="error-text"></div>-->
                <div class="field input">
                    <label>First Name</label>
                    <input type="text" name="user_name" placeholder="First name" >
                </div>
                    
                <div class="field input">
                    <label>Email Address</label>
                    <input type="text" name="user_email" placeholder="Enter your email" >
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="user_password" placeholder="Enter new password" >
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label>Select Image</label>
                    <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" >
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="Continue to Chat">
                </div>
            </form>

            <div class="link">Already signed up? <a href="login.php">Login now</a></div>
        </section>
    </div>

    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>

</body>

</html>