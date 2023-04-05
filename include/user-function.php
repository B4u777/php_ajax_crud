<?php
	// Include config.php file
	require_once('db/user-db.php');
    $user_db=new DatabaseConnection();

	// Insert Record	
	if (isset($_POST['action']) && $_POST['action'] == "insert") {
        $img = $user_db->upload_file(); 
        $insert_data = array(  
            'user_name'     =>      $_POST['name'],  
            'user_email'     =>     $_POST['email'],  
            'user_pwd'          =>     $_POST['pwd'],
            'user_language'          =>     $_POST['language'],
            'user_image'          =>     $img,
        );  
        $sql = $user_db->insert($insert_data);
        if($sql)
        {
            $data = array(
                'status'=>'success',
            );
            echo json_encode($data);
        }else{
            $data = array(
                'status'=>'false',
            );
            echo json_encode($data);
        }
	}

	// View record
	if (isset($_POST['action']) && $_POST['action'] == "view") {
        $output = $user_db->fetchdata();
        echo json_encode($output);
    }

	// Edit Record	
    if ( isset($_POST['editId'])) {
        $editId = $_POST['editId'];
        $row = $user_db->getRecordById($editId);
        echo json_encode($row);
	}
    // Update Record	
    if (isset($_POST['action']) && $_POST['action'] == "update") {
        
        if(!empty($_FILES['image']['name'])){
            $img = $user_db->upload_file();  
        }else{
            $img=$_POST['user_avatar'];
        }
        $update_data = array(  
            'user_name'     =>      $_POST['name'],  
            'user_email'     =>     $_POST['email'],  
            'user_pwd'          =>     $_POST['pwd'],
            'user_language'          =>     $_POST['language'],
            'user_image'          =>     $img,
        );  
        $where_condition = array(  
            'user_id'     =>     $_POST["id"]  
        );  
        $row = $user_db->updateById($update_data,$where_condition);
        if($row)
       {
            $data = array(
               'status'=>'success',
            );
           echo json_encode($data);
       }else{
            $data = array(
               'status'=>'false',
            );
           echo json_encode($data);
       }
	} 
    // Delete record
    if (isset($_POST['deleteId'])) {
		$editId = $_POST['deleteId'];
		$row = $user_db->delete($editId);
        if($row==true){
            $data = array(
               'status'=>'success',
            );
            echo json_encode($data);
        }else{
            $data = array(
               'status'=>'failed',
            );
            echo json_encode($data);
        } 	
    }
?>