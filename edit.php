<?php
require 'includes/header.php';
require 'includes/dbcon.php';

// Check if the ID is set and fetch the record
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
}

// Handle form submission for editing the record
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $program = $_POST['program'];
    $residential_status = $_POST['residential_status'];

    try {
        $stmt = $conn->prepare(
            "UPDATE info SET 
            first_name = :first_name, 
            last_name = :last_name, 
            email = :email, 
            gender = :gender, 
            program = :program, 
            residential_status = :residential_status 
            WHERE id = :id"
        );

        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':program', $program);
        $stmt->bindParam(':residential_status', $residential_status);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Record updated successfully!";
            header('Location: index.php');
            exit(0);
        } else {
            echo "<script>alert('Failed to update record.')</script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Edit Record</h1>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-warning text-center">
                    <h2>Edit Details</h2>
                </div>
                <div class="card-body">
                    <form action="edit.php?id=<?= htmlspecialchars($record['id']) ?>" method="post">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($record['id']) ?>">
                        
                        <!-- First Name -->
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" value="<?= htmlspecialchars($record['first_name']) ?>" required>
                        </div>

                        <!-- Last Name -->
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" value="<?= htmlspecialchars($record['last_name']) ?>" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($record['email']) ?>" required>
                        </div>

                        <!-- Gender -->
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select name="gender" id="gender" class="form-control" required>
                                <option value="Male" <?= $record['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                                <option value="Female" <?= $record['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                                <option value="Other" <?= $record['gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
                            </select>
                        </div>

                        <!-- Program -->
                        <div class="mb-3">
                            <label for="program" class="form-label">Program</label>
                            <select name="program" id="program" class="form-control" required>
                                <option value="" disabled>Select Program</option>
                                <option value="BSc Computer Science and Engineering" <?= $record['program'] == 'BSc Computer Science and Engineering' ? 'selected' : '' ?>>BSc Computer Science and Engineering</option>
                                <option value="BSc Mathematics" <?= $record['program'] == 'BSc Mathematics' ? 'selected' : '' ?>>BSc Mathematics</option>
                                <!-- Add other options as needed -->
                            </select>
                        </div>

                        <!-- Residential Status -->
                        <div class="mb-3">
                            <label for="residential_status" class="form-label">Residential Status</label>
                            <select name="residential_status" id="residential_status" class="form-control" required>
                                <option value="Resident" <?= $record['residential_status'] == 'Resident' ? 'selected' : '' ?>>Resident</option>
                                <option value="Non-Resident" <?= $record['residential_status'] == 'Non-Resident' ? 'selected' : '' ?>>Non-Resident</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-center">
                            <button type="submit" name="update" class="btn btn-success w-50">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'includes/footer.php'; ?>
