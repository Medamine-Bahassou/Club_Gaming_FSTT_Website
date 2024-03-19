<?php
    $style = 'dede<div id="mohamed"> mohamed </div>'; 
?>

<div id="style" style="display: none;">
    <?php echo $style; ?>
</div>

<div id="res">

</div>


<script>
    var stylee = document.getElementById('style').innerHTML; 
    var mohamed = document.getElementById('mohamed').innerHTML; 
    document.getElementById('res').innerHTML =  mohamed; 
</script>
