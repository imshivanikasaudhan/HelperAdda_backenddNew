<?php

        $cid = $_GET['category_id'];
        echo $api_id_url = 'http://3.6.48.68/social_app/public/api/category/' . $cid; 
        // Read JSON file
        $json_data_id = file_get_contents($api_id_url);
        
        // Decode JSON data into PHP array
        $response_data_id = json_decode($json_data_id);
        
        // Cut long data into small & select only first 10 records
        $user_data_id = array_slice($response_data_id, 0, 100);
        
        // Print data if need to debug
        // print_r($user_data_id);
        
?>       
    
    <option value="">Select Sub-Category</option>
    <?php
        foreach($user_data_id as $user){
    ?>
        <option value="<?php echo $user->id;?>"><?php echo $user->category?></option>
    <?php
    } ?>
                                
                            
