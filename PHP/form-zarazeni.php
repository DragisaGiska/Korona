<form action="zarazeni_insert.php" method="post" onsubmit="return validate()">
    <div class="input-item">
        <label>First name:</label>
        <input type="text" name="firstname">
    </div>
    <div class="input-item">
        <label>Last name:</label>
        <input type="text" name="lastname">
    </div>
    <div class="input-item">
        <label>Birth date:</label>
        <input type="date" name="date">
    </div>
    <div class="input-item">
        <label>Country:</label>
        <select class="drzava-select" name="drzava">
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
    <div class="input-item">
        <label>Infected:</label>
        <input type="radio" value=1 name="radio" id="yes">Yes
        <div class="space-sm"></div>
        <input type="radio" value=0 name="radio" id="no">No
        <div class="space-lg"></div>
    </div>
    <div class="input-item">
        <input type="submit" value="Add" id="add">
        <input type="button" value="Reset form" id="reset">

    </div>


</form>