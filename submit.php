<?php
            // Replace these variables with your own database credentials
            $servername = "localhost";
            $username = "username";
            $password = "password";
            $dbname = "dbname";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $message = $_POST['message'];

                $sql = "INSERT INTO Contact (username, email, message) VALUES ('$name', '$email', '$message')";

                if ($conn->query($sql) === TRUE) {
                    echo '<script>alert("Message sent successfully!");</script>';
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }

            $conn->close();
        ?>