<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <!-- Link to your CSS file -->
    <link rel="stylesheet" href="admin_dashboard.css">
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <!-- Dashboard Overview -->
        <div class="dashboard-overview">
            <div>Total Reports: <?php echo $total_reports; ?></div>
            <div>Open Cases: <?php echo $open_cases; ?></div>
            <div>Resolved Cases: <?php echo $resolved_cases; ?></div>
            <div>Total Users: <?php echo $total_users; ?></div>
            <div>Total Security Officers: <?php echo $total_officers; ?></div>
        </div>
        
        <!-- Other sections for Incident Management, User Management, etc. -->
        <!-- ... -->
        
        <!-- Example section for adding a new security officer -->
        <div class="add-officer">
            <h2>Add Security Officer</h2>
            <form action="add_officer.php" method="post">
                <!-- Form fields for adding a security officer -->
                <!-- ... -->
                <input type="submit" value="Add Officer">
            </form>
        </div>
        
 