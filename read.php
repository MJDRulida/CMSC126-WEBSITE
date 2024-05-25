<?php
// Establishing connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "siquijordb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT room_id, room_type, room_capacity, room_available, room_amenities, room_rate FROM rooms";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Rooms</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=NTR&display=swap');
        body {
            font-family: 'NTR';
            background-color: #f4eeed;
            color: #000;
            display: flex;
            justify-content: center;
            padding-top: 20px;
            margin: 0;
        }
        .container {
            width: 80%;
            max-width: 800px;
            padding: 20px;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
            color: #000;
            font-family: 'NTR';
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .new-btn {
            margin-top: 20px;
        }
        .new-btn button {
            padding: 10px 20px;
            border-radius: 10px;
            border: none;
            font-family: 'NTR';
            background-color: #737B4C;
            color: #fff;
            font-size: 20px;
            cursor: pointer;
        }
        .new-btn button:hover {
            background-color: #283100;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Rooms</h1>
        <table>
            <tr>
                <th>Room ID</th>
                <th>Room Type</th>
                <th>Room Capacity</th>
                <th>Room Available</th>
                <th>Room Amenities</th>
                <th>Room Rate</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['room_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['room_type']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['room_capacity']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['room_available']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['room_amenities']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['room_rate']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No rooms found</td></tr>";
            }
            $conn->close();
            ?>
        </table>
        <div class="new-btn">
            <a href="create.html">
                <button type="button">Create New Room</button>
            </a>
        </div>
    </div>
</body>
</html>
