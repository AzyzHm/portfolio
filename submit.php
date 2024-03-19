<?php
           // PHP Data Objects(PDO) Sample Code:
        try {
            $conn = new PDO("sqlsrv:server = tcp:azyz-server.database.windows.net,1433; Database = Contact", "Azyz", "Test0110");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            print("Error connecting to SQL Server.");
            die(print_r($e));
        }

        // SQL Server Extension Sample Code:
        $connectionInfo = array("UID" => "Azyz", "pwd" => "Test0110", "Database" => "Contact", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
        $serverName = "tcp:azyz-server.database.windows.net,1433";
        $conn = sqlsrv_connect($serverName, $connectionInfo);

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $message = $_POST['message'];

                $sql = "INSERT INTO messages (username, email, mesaage) VALUES ('$name', '$email', '$message')";

                if (sqlsrv_query($conn, $sql) === TRUE) {
                    echo '<script>alert("Message sent successfully!");</script>';
                } else {
                    echo "Error: " . $sql . "<br>" . print_r(sqlsrv_errors(), true);
                }
            }

            sqlsrv_close($conn);
        ?>