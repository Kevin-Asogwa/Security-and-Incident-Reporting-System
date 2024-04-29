<?php
if(!isset($_SESSION)) {
    session_start();
}
$_SESSION['user_type'] = "student";

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["registration_number"]) ){
    header("location: ../login.php");
    exit;
}
?>


<?php include 'dashboard_header.php'; ?>
<!-- Main section -->
<style>
.box {
    text-align: center;
}
</style>
<div class="main">
            <!-- Boxes section -->
            <div class="boxes">
                
                <div class="box">
                    <div class="icon"><a href="reported.php"><i class="fas fa-bullhorn"></i></div>
                    <div class="info">
                        <h3>Incidents Reported: <br>
                            <?php echo $incident_reported; ?></h3></a>                     
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><a href="incident_status.php"><i class="fas fa-info-circle "></i></div>
                    <div class="info">
                        <h3>Incidents Status</h3></a>
                        <!-- <p><?php echo $incident_status; ?></p> -->
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><a href="security_contact.php"><i class="fas fa-exclamation-triangle"></i></div>
                    <div class="info">
                        <h3>Emergency Security Contacts</h3> </a>
                        <!-- <p><?php echo $pending_reports; ?></p> -->
                    </div>
                </div>
            </div>
            <!-- Tips section -->
            <div class="tips">
                <h2>Security Tips and Important Updates</h2>
                <p>Here are some security tips and important updates that you should know:</p>
                <ul>
                    <li>Always lock your doors and windows when you leave your room or apartment.</li>
                    <li>Do not walk alone at night or in isolated areas. Use the campus shuttle service or call a friend.</li>
                    <li>Do not share your personal or financial information with strangers online or over the phone.</li>
                    <li>Report any suspicious or unusual activity or behavior to the security department immediately.</li>
                    <li>Be aware of the latest news and alerts from the university and the government regarding any security or health issues.</li>
                </ul>
            </div>
        </div>
        <?php include 'dashboard_footer.php'; ?>
    </div>
    <!-- Script to toggle the sub-profile-overview menu -->
    <script>
        var profileOverview = document.getElementById("profile-overview");
        var subProfileOverview = document.getElementById("sub-profile-overview");
        profileOverview.addEventListener("click", function() {
            subProfileOverview.classList.toggle("show");
        });
    </script>
</body>
</html>
