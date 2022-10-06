<?php
namespace app\views;



?>

<img src="<?php echo $newUser->getData('_large'); ?>" alt="photo of user" style="width:400px;height:400px;">
    <h1>Name: <?php echo $newUser->getData('_first'), ' ', $newUser->getData('_last'); ?></h1>
    <p>ID: <?php echo $newUser->getData('_name'), ' ', $newUser->getData('_value'); ?></p>
    <p>Gender: <?php echo $newUser->getData('_gender'); ?></p>
    <p>Address: <?php echo $newUser->getData('_name'). ', '.$newUser->getData('_number').' '. $newUser->getData('_city'). ' '. $newUser->getData('_country'). ' PC '. 
    $newUser->getData('_postcode'); ?></p>
    <p>Phone number: <?php echo $newUser->getData('_phone'); ?></p>
    <p>Email: <?php echo $newUser->getData('_email'); ?></p>