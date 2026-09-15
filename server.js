const express = require("express");
const mysql = require("mysql2");
const cors = require("cors");
const path = require("path");

const app = express();

app.use(cors());
app.use(express.json());

app.use(express.static(path.join(__dirname)));

// MySQL connection
const db = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "placement_drive"
});

// Connect to database
db.connect((err) => {

    if (err) {
        console.log("Database connection failed:", err.message);
    } else {
        console.log("MySQL connected successfully!");
    }

});

// Register student
app.post("/register", (req, res) => {

    const {
        student_name,
        roll_no,
        email,
        branch,
        year,
        company,
        registration_date
    } = req.body;

    if (
        !student_name ||
        !roll_no ||
        !email ||
        !branch ||
        !year ||
        !company ||
        !registration_date
    ) {
        return res.status(400).json({
            message: "All fields are required"
        });
    }

    const sql = `
        INSERT INTO registrations
        (student_name, roll_no, email, branch, year, company, registration_date)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    `;

    const values = [
        student_name,
        roll_no,
        email,
        branch,
        year,
        company,
        registration_date
    ];

    db.query(sql, values, (err, result) => {

        if (err) {

            console.log(err);

            return res.status(500).json({
                message: "Registration failed"
            });

        }

        res.json({
            message: "Student registered successfully!",
            id: result.insertId
        });

    });

});

// Get all registrations
app.get("/registrations", (req, res) => {

    const sql = `
        SELECT * FROM registrations
        ORDER BY id DESC
    `;

    db.query(sql, (err, results) => {

        if (err) {

            return res.status(500).json({
                message: "Unable to fetch registrations"
            });

        }

        res.json(results);

    });

});

// Filter by company
app.get("/registrations/company/:company", (req, res) => {

    const company = req.params.company;

    const sql = `
        SELECT * FROM registrations
        WHERE company = ?
        ORDER BY id DESC
    `;

    db.query(sql, [company], (err, results) => {

        if (err) {

            return res.status(500).json({
                message: "Unable to filter registrations"
            });

        }

        res.json(results);

    });

});

// Start server
const PORT = 5000;

app.listen(PORT, () => {

    console.log(`Server running at http://localhost:${PORT}`);

});
