<?php
require 'includes/header.php';
require 'includes/dbcon.php';
if(isset($_POST['submit'])){
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $program=$_POST['program'];
    $residential_status=$_POST['residential_status'];
    $stmt=$conn->prepare("INSERT INTO info(first_name,last_name,email,gender,program,residential_status) VALUES(:first_name,
    :last_name,:email,:gender,:program,:residential_status)");
    $stmt->bindParam(':first_name',$first_name);
    $stmt->bindParam(':last_name',$last_name);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':gender',$gender);
    $stmt->bindParam(':program',$program);
    $stmt->bindParam(':residential_status',$residential_status);
    if($stmt->execute()){
        $_SESSION['message'] ="created successfully";
        header('Location:index.php');
    }
    else{
        echo "<script>alert('unable to register')</script>";
    }
}
?>

<div class="container mt-5">
        <h1 class="text-center mb-4">CMH Hall Registration Form</h1>
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Register <a style="background-color: red;" href="index.php" class="btn btn-primary float-end">Back</a></h2>
                    </div>
                    <div class="card-body">
                        <form action="create.php" method="post">
                            <!-- First Name -->
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" required>
                            </div>
                            <!-- Last Name -->
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" required>
                            </div>
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <!-- Gender -->
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select name="gender" id="gender" class="form-control" required>
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <!-- Program -->
                            <div class="mb-3">
                                <label for="program" class="form-label">Program</label>
                                <select name="program" id="program" class="form-control" required>
                                    <option value="" disabled selected>Select Program</option>
                                    <!-- Add your program options here -->
                                     <!-- Faculty of Mining and Minerals Technology -->
                                <option value="BSc Mining Engineering">BSc Mining Engineering</option>
                                <option value="BSc Minerals Engineering">BSc Minerals Engineering</option>
                                <!-- Faculty of Engineering -->
                                <option value="BSc Mechanical Engineering">BSc Mechanical Engineering</option>
                                <option value="BSc Electrical and Electronic Engineering">BSc Electrical and Electronic Engineering</option>
                                <option value="BSc Renewable Energy Engineering">BSc Renewable Energy Engineering</option>
                                <option value="BSc Computer Science and Engineering">BSc Computer Science and Engineering</option>
                                <option value="BSc Mathematics">BSc Mathematics</option>
                                <option value="Diploma in Plant and Maintenance Engineering">Diploma in Plant and Maintenance Engineering</option>
                                <option value="Diploma in Electrical and Electronic Engineering">Diploma in Electrical and Electronic Engineering</option>
                                <!-- Faculty of Computing and Mathematical Sciences -->
                                <option value="BSc Cyber Security">BSc Cyber Security</option>
                                <option value="BSc Information Systems and Technology">BSc Information Systems and Technology</option>
                                <option value="BSc Statistical Data Science">BSc Statistical Data Science</option>
                                <!-- Faculty of Integrated Management Studies -->
                                <option value="BSc Logistics and Transport Management">BSc Logistics and Transport Management</option>
                                <option value="BSc Economics and Industrial Organization">BSc Economics and Industrial Organization</option>
                                <!-- Faculty of Geosciences and Environmental Studies -->
                                <option value="BSc Geomatic Engineering">BSc Geomatic Engineering</option>
                                <option value="BSc Geological Engineering">BSc Geological Engineering</option>
                                <option value="BSc Spatial Planning">BSc Spatial Planning</option>
                                <option value="BSc Environmental and Safety Engineering">BSc Environmental and Safety Engineering</option>
                                <option value="BSc Land Administration and Information Systems">BSc Land Administration and Information Systems</option>
                                <option value="Diploma in General Drilling">Diploma in General Drilling</option>
                                <!-- School of Petroleum Studies -->
                                <option value="BSc Petroleum Engineering">BSc Petroleum Engineering</option>
                                <option value="BSc Natural Gas Engineering">BSc Natural Gas Engineering</option>
                                <option value="BSc Petroleum Geosciences and Engineering">BSc Petroleum Geosciences and Engineering</option>
                                <option value="BSc Petroleum Refining and Petrochemical Engineering">BSc Petroleum Refining and Petrochemical Engineering</option>
                                <option value="BSc Chemical Engineering">BSc Chemical Engineering</option>
                                    <!-- More options... -->
                                </select>
                            </div>
                            <!-- Residential Status -->
                            <div class="mb-3">
                                <label for="residential_status" class="form-label">Residential Status</label>
                                <select name="residential_status" id="residential_status" class="form-control" required>
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="Resident">Resident</option>
                                    <option value="Non-Resident">Non-Resident</option>
                                </select>
                            </div>
                            <!-- Submit Button -->
                            <div class="d-flex justify-content-center">
                                <button type="submit" name="submit" class="btn btn-primary w-50">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require 'includes/footer.php'?>
