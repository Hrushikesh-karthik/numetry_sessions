<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Student Registration Form</title>
    <style>
        .box h1 {
            text-align: center;
            color: white;
            font-weight: bold;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        
        #emailPot {
            display: none;
        }

        .box {
            width: 500px;
            padding: 40px;
            position: absolute;
            margin-top: 300px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: linear-gradient(45deg, #49a09d, #5f2c82);
        }
        .box label {
            font-size: 20px;
            color: white;
            font-weight: bold;
        }
        .box input,
        .box textarea,
        .box select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 2px solid #151414;
            outline: none;
        }
        .box .submit {
            width: 60%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: none;
            outline: none;
            background: #16e312;
            color: white;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
            display: block;
            margin: 0 auto;
        }
        .error-message {
            color: rgb(243, 3, 3);
            font-weight: bold;
            font-size: 21px;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="box">
        <h1>Student Registration Form</h1>
        <form id="myForm" onsubmit="return validateForm()" action="submits.php" method="POST">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name">
            <div id="nameError" class="error-message"></div><br>
            
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email">
            <div id="emailError" class="error-message"></div><br>
            
            <label for="phone">Phone:</label><br>
            <input type="tel" id="phone" name="phone">
            <div id="phoneError" class="error-message"></div><br>
            
            <label for="branch">Branch:</label><br>
            <select name="branch" id="branch">
                <option value="">Select your branch</option>
                <option value="CSE">CSE</option>
                <option value="ECE">ECE</option>
                <option value="EEE">EEE</option>
                <option value="MECH">MECH</option>
                <option value="CIVIL">CIVIL</option>
            </select>
            <div id="branchError" class="error-message"></div><br>
            
            <label for="dob">DOB:</label><br>
            <input type="date" id="dob" name="dob">
            <div id="dobError" class="error-message"></div><br>
            
            <label for="address">Address:</label><br>
            <textarea name="address" id="address" rows="4"></textarea>
            <div id="addressError" class="error-message"></div><br>
            <input type="text" name="emailPot" id="emailPot" style="display:none;">
            <input type="submit" value="Submit" class="submit">
        </form>
    </div>
    <script>
    function validateForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var address = document.getElementById("address").value;
    var dob = document.getElementById("dob").value;
    var branch = document.getElementById("branch").value;
    var isValid = true;

    // Reset error messages
    document.getElementById("nameError").innerHTML = "";
    document.getElementById("emailError").innerHTML = "";
    document.getElementById("phoneError").innerHTML = "";
    document.getElementById("addressError").innerHTML = "";
    document.getElementById("dobError").innerHTML = "";
    document.getElementById("branchError").innerHTML = "";

    // Validation checks
    if (name === "") {
        document.getElementById("nameError").innerHTML = "Name is required";
        isValid = false;
    }
    if (email === "") {
        document.getElementById("emailError").innerHTML = "Email is required";
        isValid = false;
    } else if (!/\S+@\S+\.\S+/.test(email)) {
        document.getElementById("emailError").innerHTML = "Invalid email format";
        isValid = false;
    }
    if (phone === "") {
        document.getElementById("phoneError").innerHTML = "Phone is required";
        isValid = false;
    } else if (!/^\d{10}$/.test(phone)) {
        document.getElementById("phoneError").innerHTML = "Phone number must be 10 digits";
        isValid = false;
    }
    if (branch === "") {
        document.getElementById("branchError").innerHTML = "Branch is required";
        isValid = false;
    }
    if (dob === "") {
        document.getElementById("dobError").innerHTML = "DOB is required";
        isValid = false;
    }
    if (address === "") {
        document.getElementById("addressError").innerHTML = "Address is required";
        isValid = false;
    }

    if (isValid) {
        saveToStorage();
        alert("Successfully Registered");
    }
    return isValid;
}

function saveToStorage() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var address = document.getElementById("address").value;
    var dob = document.getElementById("dob").value;
    var branch = document.getElementById("branch").value;

    // Save to local storage
    localStorage.setItem("name", name);
    localStorage.setItem("email", email);
    localStorage.setItem("phone", phone);
    localStorage.setItem("address", address);
    localStorage.setItem("dob", dob);
    localStorage.setItem("branch", branch);

    // Save to session storage
    sessionStorage.setItem("name", name);
    sessionStorage.setItem("email", email);
    sessionStorage.setItem("phone", phone);
    sessionStorage.setItem("address", address);
    sessionStorage.setItem("dob", dob);
    sessionStorage.setItem("branch", branch);
}

function loadFromStorage() {
    if (localStorage.getItem("name")) {
        document.getElementById("name").value = localStorage.getItem("name");
    }
    if (localStorage.getItem("email")) {
        document.getElementById("email").value = localStorage.getItem("email");
    }
    if (localStorage.getItem("phone")) {
        document.getElementById("phone").value = localStorage.getItem("phone");
    }
    if (localStorage.getItem("address")) {
        document.getElementById("address").value = localStorage.getItem("address");
    }
    if (localStorage.getItem("dob")) {
        document.getElementById("dob").value = localStorage.getItem("dob");
    }
    if (localStorage.getItem("branch")) {
        document.getElementById("branch").value = localStorage.getItem("branch");
    }

    if (sessionStorage.getItem("name")) {
        document.getElementById("name").value = sessionStorage.getItem("name");
    }
    if (sessionStorage.getItem("email")) {
        document.getElementById("email").value = sessionStorage.getItem("email");
    }
    if (sessionStorage.getItem("phone")) {
        document.getElementById("phone").value = sessionStorage.getItem("phone");
    }
    if (sessionStorage.getItem("address")) {
        document.getElementById("address").value = sessionStorage.getItem("address");
    }
    if (sessionStorage.getItem("dob")) {
        document.getElementById("dob").value = sessionStorage.getItem("dob");
    }
    if (sessionStorage.getItem("branch")) {
        document.getElementById("branch").value = sessionStorage.getItem("branch");
    }
}


</script>
</body>
</html>
