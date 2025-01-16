<?php
require 'includes/header.php';
require 'includes/dbcon.php';

// Check if the ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        // Prepare the delete query
        $stmt = $conn->prepare("DELETE FROM info WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Execute the query
        if ($stmt->execute()) {
            $_SESSION['message'] = "Record deleted successfully!";
            header('Location: index.php');
            exit(0);
        } else {
            $_SESSION['message'] = "Failed to delete the record!";
            header('Location: index.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    $_SESSION['message'] = "Invalid request!";
    header('Location: index.php');
    exit(0);
}
?>
