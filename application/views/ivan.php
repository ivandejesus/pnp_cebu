<select>
    <?php
    foreach($array as $ar){
    ?>
    
    <option value="<?= $ar ?>" <?= ($ar==$value) ? 'selected' : '';?>> <?= $ar ?> </option>
    
    <?php } ?>
</select>


<select>
    <option value="number 1">number 1</option>
    <option value="number 2" <?php if($ar == "") ?>number 2</option>
    <option value="number 3">number 3</option>
</select>

