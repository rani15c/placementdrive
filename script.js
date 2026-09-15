const form = document.getElementById("registrationForm");

const message = document.getElementById("message");


form.addEventListener("submit", async function(event) {

    event.preventDefault();


    const student_name =
        document.getElementById("student_name").value.trim();

    const roll_no =
        document.getElementById("roll_no").value.trim();

    const email =
        document.getElementById("email").value.trim();

    const branch =
        document.getElementById("branch").value;

    const year =
        document.getElementById("year").value;

    const company =
        document.getElementById("company").value;

    const registration_date =
        document.getElementById("registration_date").value;


    const studentData = {

        student_name: student_name,

        roll_no: roll_no,

        email: email,

        branch: branch,

        year: year,

        company: company,

        registration_date: registration_date

    };


    try {

        const response = await fetch(
            "http://localhost:5000/register",
            {
                method: "POST",

                headers: {
                    "Content-Type": "application/json"
                },

                body: JSON.stringify(studentData)
            }
        );


        const data = await response.json();


        if (response.ok) {

            message.textContent =
                "Registration successful!";

            message.className = "success";

            form.reset();

        } else {

            message.textContent =
                data.message;

            message.className = "error";

        }

    }

    catch (error) {

        console.log(error);

        message.textContent =
            "Unable to connect to server.";

        message.className = "error";

    }

});
