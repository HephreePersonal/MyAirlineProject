<?php
require_once 'database/db_connect.php';
require_once 'airlines/Airlines_Grid.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

// Start the HTML
require_once 'public/header.php';
?>

<h1>Welcome to HephreeAir</h1>

<div class="airlines-grid">
    <?php
    $airlinesGrid = new Airlines($conn);
    $airlinesGrid->listAirlines();
    ?>
</div>

<?php
// End the HTML
require_once 'includes/footer.php';
?>
