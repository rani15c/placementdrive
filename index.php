<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Placement Drive Registration</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<nav>
    <div class="logo">Placement Drive System</div>

    <div class="nav-links">
        <a href="index.php">Register</a>
        <a href="view.php">View Registrations</a>
    </div>
</nav>

<div class="container">

    <h1>Placement Drive Registration</h1>

    <p class="subtitle">
        Register for upcoming company placement drives
    </p>

    <form id="registrationForm">

        <!-- Student Name -->
        <label for="student_name">Student Name</label>

        <input
            type="text"
            id="student_name"
            name="student_name"
            required
            pattern="[A-Za-z ]{2,50}"
            placeholder="Enter student name"
        >


        <!-- Roll Number -->
        <label for="roll_number">Roll Number</label>

        <input
            type="text"
            id="roll_number"
            name="roll_number"
            required
            maxlength="30"
            placeholder="Enter roll number"
        >


        <!-- Email -->
        <label for="email">Email</label>

        <input
            type="email"
            id="email"
            name="email"
            required
            placeholder="Enter email address"
        >


        <!-- Branch -->
        <label for="branch">Branch</label>

        <select
            id="branch"
            name="branch"
            required
        >
            <option value="">Select Branch</option>

            <option value="Computer Science">
                Computer Science
            </option>

            <option value="AIML">
                AIML
            </option>

            <option value="Information Technology">
                Information Technology
            </option>

            <option value="Electronics">
                Electronics
            </option>

            <option value="Mechanical">
                Mechanical
            </option>
        </select>


        <!-- Year -->
        <label for="year">Year</label>

        <select
            id="year"
            name="year"
            required
        >
            <option value="">Select Year</option>

            <option value="2nd Year">
                2nd Year
            </option>

            <option value="3rd Year">
                3rd Year
            </option>

            <option value="4th Year">
                4th Year
            </option>
        </select>


        <!-- Company -->
        <label for="company">Company</label>

        <select
            id="company"
            name="company"
            required
        >
            <option value="">Select Company</option>

            <option value="TCS">
                TCS
            </option>

            <option value="Infosys">
                Infosys
            </option>

            <option value="Wipro">
                Wipro
            </option>

            <option value="Accenture">
                Accenture
            </option>

            <option value="Microsoft">
                Microsoft
            </option>
        </select>


        <!-- Registration Date -->
        <label for="registration_date">
            Registration Date
        </label>

        <input
            type="date"
            id="registration_date"
            name="registration_date"
            required
        >


        <!-- Submit -->
        <button type="submit">
            Register for Drive
        </button>

    </form>


    <!-- Message -->
    <p id="message"></p>

</div>


<script src="script.js"></script>

</body>
</html>