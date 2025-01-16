<?php
require 'includes/header.php';
require 'includes/dbcon.php';

// Check if the ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $stmt = $conn->prepare("SELECT * FROM info WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$record) {
            $_SESSION['message'] = "Record not found!";
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

<div class="container mt-5">
    <h1 class="text-center mb-4">View Record Details</h1>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-info text-center">
                    <h2>Details</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td><?= htmlspecialchars($record['id']) ?></td>
                            </tr>
                            <tr>
                                <th>First Name</th>
                                <td><?= htmlspecialchars($record['first_name']) ?></td>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <td><?= htmlspecialchars($record['last_name']) ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?= htmlspecialchars($record['email']) ?></td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td><?= htmlspecialchars($record['gender']) ?></td>
                            </tr>
                            <tr>
                                <th>Program</th>
                                <td><?= htmlspecialchars($record['program']) ?></td>
                            </tr>
                            <tr>
                                <th>Residential Status</th>
                                <td><?= htmlspecialchars($record['residential_status']) ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center mt-4">
                        <a href="index.php" class="btn btn-primary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'includes/footer.php'; ?>
