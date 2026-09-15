CREATE DATABASE placement_drive;

USE placement_drive;

CREATE TABLE registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100) NOT NULL,
    roll_no VARCHAR(30) NOT NULL,
    email VARCHAR(100) NOT NULL,
    branch VARCHAR(50) NOT NULL,
    year VARCHAR(20) NOT NULL,
    company VARCHAR(50) NOT NULL,
    registration_date DATE NOT NULL
);

INSERT INTO registrations
(student_name, roll_no, email, branch, year, company, registration_date)
VALUES
('Rahul Patil', 'CS101', 'rahul@gmail.com', 'Computer Science', '4th Year', 'TCS', '2026-09-10'),
('Priya Sharma', 'AIML102', 'priya@gmail.com', 'AIML', '4th Year', 'Infosys', '2026-09-10'),
('Amit Joshi', 'IT103', 'amit@gmail.com', 'Information Technology', '3rd Year', 'Wipro', '2026-09-11'),
('Sneha More', 'CS104', 'sneha@gmail.com', 'Computer Science', '4th Year', 'Accenture', '2026-09-11'),
('Riya Deshmukh', 'AIML105', 'riya@gmail.com', 'AIML', '4th Year', 'Microsoft', '2026-09-12');
