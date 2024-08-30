<?php
require_once 'database/db_connect.php';
require_once 'airlines/Airlines_Grid.php';

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
