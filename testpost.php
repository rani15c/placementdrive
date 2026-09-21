<?php

echo "<h2>POST Test</h2>";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    echo "POST DATA RECEIVED:<br><br>";

    print_r($_POST);

} else {

    echo '
    <form method="POST">

        <input
            type="text"
            name="student_name"
            placeholder="Enter name"
        >

        <button type="submit">
            Send Test
        </button>

    </form>
    ';
}

?>