const form = document.getElementById("registrationForm");
const message = document.getElementById("message");

form.addEventListener("submit", async function(event) {

    event.preventDefault();

    const formData = new FormData(form);

    try {

        const response = await fetch("register.php", {
            method: "POST",
            body: formData
        });

        const data = await response.json();

        if (data.success) {

            message.textContent = "Registration successful!";
            message.className = "success";

            form.reset();

        } else {

            message.textContent = data.message || "Registration failed";
            message.className = "error";
        }

    } catch (error) {

        console.error(error);

        message.textContent = "Unable to connect to server.";
        message.className = "error";
    }

});