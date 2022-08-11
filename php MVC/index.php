<?php
// $newcity = filter_input(INPUT_POST, "newcity", FILTER_SANITIZE_STRING);
// $countrycode = filter_input(INPUT_POST, "countrycode", FILTER_SANITIZE_STRING);
// $district = filter_input(INPUT_POST, "district", FILTER_SANITIZE_STRING);
// $newpopulation = filter_input(INPUT_POST, "population", FILTER_SANITIZE_STRING);
// $city = filter_input(INPUT_GET, "city", FILTER_SANITIZE_STRING);
//FILTER_SANITIZE_STRING格式化資料成HTML，但php8以上刪除，改成htmlspecialchars()，目前不確定是否可以轉換。

require('model/database.php');
require('city_db.php');
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

$countrycode = filter_input(INPUT_POST, "countrycode",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$district = filter_input(INPUT_POST, "district", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$population = filter_input(INPUT_POST, "population", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$action = filter_input(INPUT_POST, 'action',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if(!$action){
    $action = filter_input(INPUT_GET, 'action',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if(!$action){
        $action = 'create_read_form';
    } 
}

$city = filter_input(INPUT_POST, "city",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if(!$city){
    $city = filter_input(INPUT_GET, "city", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}
//city只要判斷一次就好，如果沒有get跟post會直接回傳error
?>


        <?php
            if(isset($delete)){
                echo "Record deleted.<br><br>";
            } else if(isset($update)){
                echo "Record update.<br><br>";
            }
        ?>

        <?php if(!$city && !$newcity) {?>
            <section>
                <h2>Select Data / Read Data</h2>
                <form action="." method="GET">
                    <label for="city">City Name:</label>
                    <input type="text" id="city" name="city" required>
                    <button>Submit</button>
                </form>
            </section>

            <section>
                <h2>Insert Data / Create Date</h2>
                <form action="." method="POST">
                    <label for="newcity">City Name:</label>
                    <input type="text" id="newcity" name="newcity" required>
                    <label for="countrycode">Country Code:</label>
                    <input type="text" id="countrycode" name="countrycode" maxlength="3" required>
                    <label for="district">District:</label>
                    <input type="text" id="district" name="district" required>
                    <label for="population">Population:</label>
                    <input type="text" id="population" name="population" required>
                    <button>Submit</button>
                </form>
            </section>
        <?php }else { ?>
            <?php require("database.php"); ?>

            <?php
                if($newcity) {
                    
                }

                if($city || $newcity){
                
            }   //↑抓取資料
            //以上大概是現有資料有的話就呈現，沒有的話就新增
            ?>
            <?php if (!empty($results)) { ?>
                <session>
                    <h2>Update Or Delete Data</h2>
                    <?php foreach ($results as $result) {
                        $id = $result['ID'];
                        $city = $result['Name'];
                        $countrycode = $result['CountryCode'];
                        $district = $result['District'];
                        $population = $result['Population'];
                    ?>
                    <form class="update" action="update_record.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <label for="city-<?php echo $id ?>">City Name:</label>
                        <input type="text" id="city-<?php echo $id ?>" name="city" value="<?php echo $city ?>" required>

                        <label for="countrycode-<?php echo $id ?>">Country Code:</label>
                        <input type="text" id="countrycode-<?php echo $id ?>" name="countrycode" value="<?php echo $countrycode ?>" required>
                       
                        <label for="district-<?php echo $id ?>">District:</label>
                        <input type="text" id="district-<?php echo $id ?>" name="district" value="<?php echo $district ?>" required>
                        
                        <label for="population-<?php echo $id ?>">Population:</label>
                        <input type="text" id="population-<?php echo $id ?>" name="population" value="<?php echo $population ?>" required>

                        <button>Update</button>
                    </form>
                        
                    <form class="delete" action="delete_record.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <button class="red">Delete</button>
                    </form>
                <?php }?>
                </session>
            <?php } else { ?>
                <p>Sorry, no results.</p>
            <?php } ?>
            <a href=".">Go To Request Forms</a>
            <!-- //↑同個城市名可能會出現多個，要解決重複id這個問題 -->
        <?php } ?>
    </main>
</body>
</html>