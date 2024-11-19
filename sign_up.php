<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WMSU PayNet Registration</title>
    <link rel="stylesheet" href="vendor/bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor//bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="vendor/datatable-2.1.8/datatables.min.css" >
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="header d-flex align-items-center">
        <div class="logo-name d-flex align-items-center">
            <img class="img-fluid" src="image/wmsu_logo.png" alt="CCS PayNet Logo" width="40" height="40">
            <h2 class="px-2">WMSU PayNet</h2>
        </div>
       <span> <i class="bi bi-question-circle"></i></span>
    </div>

    <div class="form-container">
        
      <span class="d-flex align-items-center"> <i class="bi bi-arrow-left" style="font-size: larger;"></i>
           <h5 class="px-3 m-auto"> Sign Up</h5>
      </span>
      <hr>
        <form class="pb-3">
            <label for="firstName">First Name</label>
            <input type="text" id="firstName" name="firstName" required>

            <label for="firstName">Middle Name</label>
            <input type="text" id="middleName" name="firstName" required>

            <label for="lastName">Surname</label>
            <input type="text" id="surName" name="lastName" required>

            <div class="d-flex ">
            <label class="px-1" for="course">Course:</label>
            <select id="course" name="course">
                <option value="BSIT">BSIT</option>
                <option value="BSCS">BSCS</option>
                <option value="BSBA">BSBA</option>
            </select>

            <label class="px-2" for="suffix">Suffix:</label>
            <select id="suffix" name="suffix">
                <option value="Jr.">Jr.</option>
                <option value="Sr.">Sr.</option>
                <option value="II">II</option>
            </select>
            </div>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>

            
            <button type="submit">Register</button>
        </form>
    </div>

    

    <script src="vendor/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jQuery-3.7.1/jquery-3.7.1.min.js"></script>
<script src="vendor/chartjs-4.4.5/chart.js"></script>
<script src="vendor/datatable-2.1.8/datatables.min.js"></script>
</body>
</html>
