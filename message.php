<?php
// Check if a session message exists
if (isset($_SESSION['message'])): ?>
    <!-- Display the alert -->
    <div class="alert alert-<?= $_SESSION['alert-class'] ?? 'info' ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    // Clear the message after it's displayed
    unset($_SESSION['message']);
    unset($_SESSION['alert-class']);
endif;
?>
