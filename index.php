<?php
require 'includes/header.php';
require 'includes/dbcon.php';

// Fetch all records from the database
try {
    $stmt = $conn->prepare("SELECT * FROM info");
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch as associative array
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">CMH Hall Records <a href="create.php" class="btn btn-primary float-end">ADD</a></h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Program</th>
                    <th>Residential Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($records) > 0): ?>
                    <?php foreach ($records as $record): ?>
                        <tr>
                            <td><?= htmlspecialchars($record['id']) ?></td>
                            <td><?= htmlspecialchars($record['first_name']) ?></td>
                            <td><?= htmlspecialchars($record['last_name']) ?></td>
                            <td><?= htmlspecialchars($record['email']) ?></td>
                            <td><?= htmlspecialchars($record['gender']) ?></td>
                            <td><?= htmlspecialchars($record['program']) ?></td>
                            <td><?= htmlspecialchars($record['residential_status']) ?></td>
                            <td>
                                <a href="view.php?id=<?= $record['id'] ?>" class="btn btn-info btn-sm">View</a>
                                <a href="edit.php?id=<?= $record['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete.php?id=<?= $record['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">No records found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require 'includes/footer.php'; ?>
