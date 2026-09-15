const table =
    document.getElementById("registrationTable");

const companyFilter =
    document.getElementById("companyFilter");

const filterButton =
    document.getElementById("filterButton");

const resetButton =
    document.getElementById("resetButton");


// Load all registrations
async function loadRegistrations() {

    try {

        const response =
            await fetch(
                "http://localhost:5000/registrations"
            );

        const data =
            await response.json();

        displayRegistrations(data);

    }

    catch (error) {

        console.log(error);

        table.innerHTML = `
            <tr>
                <td colspan="8">
                    Unable to load registrations.
                </td>
            </tr>
        `;

    }

}


// Display registrations
function displayRegistrations(data) {

    table.innerHTML = "";


    if (data.length === 0) {

        table.innerHTML = `
            <tr>
                <td colspan="8">
                    No registrations found.
                </td>
            </tr>
        `;

        return;
    }


    data.forEach(student => {

        const row =
            document.createElement("tr");


        row.innerHTML = `

            <td>${escapeHTML(student.id)}</td>

            <td>${escapeHTML(student.student_name)}</td>

            <td>${escapeHTML(student.roll_no)}</td>

            <td>${escapeHTML(student.email)}</td>

            <td>${escapeHTML(student.branch)}</td>

            <td>${escapeHTML(student.year)}</td>

            <td>${escapeHTML(student.company)}</td>

            <td>${escapeHTML(student.registration_date)}</td>

        `;


        table.appendChild(row);

    });

}


// Filter registrations
async function filterRegistrations() {

    const company =
        companyFilter.value;


    if (company === "") {

        loadRegistrations();

        return;
    }


    try {

        const response =
            await fetch(
                "http://localhost:5000/registrations/company/"
                + encodeURIComponent(company)
            );


        const data =
            await response.json();


        displayRegistrations(data);

    }

    catch (error) {

        console.log(error);

    }

}


// Reset filter
resetButton.addEventListener(
    "click",
    function() {

        companyFilter.value = "";

        loadRegistrations();

    }
);


// Filter button
filterButton.addEventListener(
    "click",
    filterRegistrations
);


// Basic HTML escaping
function escapeHTML(value) {

    return String(value)
        .replaceAll("&", "&amp;")
        .replaceAll("<", "&lt;")
        .replaceAll(">", "&gt;")
        .replaceAll('"', "&quot;")
        .replaceAll("'", "&#039;");

}


// Load data when page opens
loadRegistrations();
