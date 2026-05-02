   <!DOCTYPE html>

<html>

<head>

    <title>Add a user</title>

    <link rel="stylesheet" href="./style.css">

</head>

<body>

    <div class="container">

        <h1>Add a User</h1>

        

        <?php

        include_once('config.php');

        

        if(isset($_POST['submit'])) {

            $name = $_POST['name'];

            $surname = $_POST['surname'];

            $email = $_POST['email'];

            

            try {

                $sql = "INSERT INTO users (name, surname, email) VALUES (:name, :surname, :email)";

                $sqlQuery = $connect->prepare($sql);

                

                $sqlQuery->bindParam(":name", $name);

                $sqlQuery->bindParam(":surname", $surname);

                $sqlQuery->bindParam(":email", $email);

                

                $sqlQuery->execute();

                

                echo "<div class='success-message'>Data saved successfully!</div>";

            } catch (PDOException $e) {

                echo "<div class='error-message'>Error: " . $e->getMessage() . "</div>";

            }

        }

        ?>

        

        <a href="index.php" class="dashboard-link">← Dashboard</a>

        

        <form action="dashboard.php" method="POST">
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="surname" placeholder="Surname" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit" name="submit">Add User</button>
        </form>

        <?php
        $display_sql = "SELECT * FROM users ORDER BY id DESC";
        $users_result = $connect->prepare($display_sql);
        $users_result->execute();
        $users = $users_result->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($users)) {
            echo "<h2>Current Users</h2>";
            echo "<table border='1' cellpadding='10'>";
            echo "<tr><th>ID</th><th>Name</th><th>Surname</th><th>Email</th><th>Action</th></tr>";
            
            foreach($users as $user) {
                echo "<tr>";
                echo "<td>" . $user['id'] . "</td>";
                echo "<td>" . $user['name'] . "</td>";
                echo "<td>" . $user['surname'] . "</td>";
                echo "<td>" . $user['email'] . "</td>";
                echo "<td><a href='update.php?id=" . $user['id'] . "'>Edit</a> | <a href='delete.php?id=" . $user['id'] . "' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No users found in database.</p>";
        }
        ?>

    </div>

</body>

</html>