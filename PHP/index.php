<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/index.css">
    <title>Index</title>
</head>
<body>
    <div class="image-container">
        <img src="../IMAGE/logo.png">
    </div>
    <a class="add" href="./zarazeni.php">
        <input type="submit" value="Add" name="add" >
    </a>
    <div class="select-container">
        <select class="drzava-select">
            <option>--- Select country ---</option>
            <?php
            $query="SELECT * FROM countries;";
            include "connection.php";
            $query_result=$connection->query($query);
            while ($row=$query_result->fetch_array()){
                echo "<option class='drzava-item'>".$row['country_name']."</option>";
            }
            ?>
        </select>
    </div>
    <div class="table-container">
        <table>
            <thead>
            <th>First and last name</th>
            <th>Birth year</th>
            <th>Country</th>
            <th>Infected</th>
            <th></th>
            </thead>
            <tbody>
            <?php
            include "connection.php";
            $query="select p.id, CONCAT(CONCAT(p.first_name,' '),p.last_name) as \"First and last name\", p.birth_year as \"Birth year\",
            c.country_name as \"Country\", p.infected as \"Infected\" from countries c 
            join patients p on p.country_id=c.id order by p.id desc limit 5;";
            $query_result=$connection->query($query);
            while ($row=$query_result->fetch_array()){
                echo "<tr class='data-row'>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['First and last name']."</td>";
                echo "<td>".$row['Birth year']."</td>";
                echo "<td>".$row['Country']."</td>";
                if($row['Infected']) echo "<td>Yes</td>"; else echo "<td>No</td>";
                echo "<td class='del'>DELETE</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>

        <div class="count-container">
            <div class="count-row">
                <div class="infected label"></div>
                <div class="value"></div>
            </div>
            <div class="count-row">
                <div class="label"></div>
                <div class="value"></div>
            </div>
        </div>
    </div>

    <script src="../JS/table_delete_ajax.js"></script>
    <script src="../JS/table_ajax.js"></script>
</body>
</html>