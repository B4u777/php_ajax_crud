<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_DATABASE','demo');

class DatabaseConnection
{
    public function __construct()
    {

        global $conn;
        $this->conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

        if (!$this->conn)
        {
            die("<h1>Database Connection Failed</h1>". mysqli_connect_error());
        }
        
    }
    public function upload_file(){
        
        if(isset($_FILES["image"])){
            $extension = explode('.' , $_FILES['image']['name']);
            $new_name = rand() . '.' . $extension[1];
            $destination = '../assets/uploads/' . $new_name;
            move_uploaded_file($_FILES['image']['tmp_name'], $destination);
            return $new_name;
        }
    }
    // insert data Function

    public function insert($user_data){
        $query = "";
        $query .= "INSERT INTO user_data (";

        foreach ($user_data as $key => $value) {
           $query_columns[] = "$key";
           $values[] = "'$value'";
        }
        $query_columns=implode(',', $query_columns);
        $query .= " $query_columns ) VALUES (";
        $query .= implode(',', $values). ')';
        $ret=mysqli_query($this->conn,$query);
        return $ret;
    }
    //fetch data Function
    public function fetchdata()
    {
        $output= array();
        $sql1="";
        $sql = "SELECT * FROM user_data ";
        $totalQuery = mysqli_query($this->conn,$sql);
        $total_all_rows = mysqli_num_rows($totalQuery);
        $columns = array(
            0 => 'user_id',
            1 => 'user_name',
            2 => 'user_email',
            3 => 'user_image',
            4 => 'user_language'

        );
        if(isset($_POST['search']['value']))
        {
            $search_value = $_POST['search']['value'];
            $sql .= " WHERE user_email like '%".$search_value."%'";
            $sql .= " OR user_name like '%".$search_value."%'";
            $sql .= " OR user_language like '%".$search_value."%'";

            
        }
       
        $sql1 .= $sql;
        $sql1 .=  " ORDER BY ". $columns[$_POST['order'][0]['column']]."   ".$_POST['order'][0]['dir']."  LIMIT ".$_POST['start']." ,".$_POST['length']." ";
        
       if($_POST['length'] != -1)
        {
            $start = $_POST['start'];
            $length = $_POST['length'];
            $sql .= " LIMIT  ".$start.", ".$length;
        }	
        $query = mysqli_query($this->conn,$sql);
        $count_rows = mysqli_num_rows($query);

        $query1 = mysqli_query($this->conn,$sql1);


        $data = array();
        $no=1;
        while($row = mysqli_fetch_assoc($query1))
        {
            $sub_array = array();
            $sub_array[]=$no;
            $sub_array[]='<img src="../assets/uploads/'.$row['user_image'].'"
            height="50px" width="50px" style="border-radius:100%;" alt="image">';
            $sub_array[] = $row['user_name'];
            $sub_array[] = $row['user_email'];
            $sub_array[] = $row['user_language'];
            $sub_array[] = '<a href="javascript:void();" data-toggle="modal" data-target="#myModal" data-id="'.$row['user_id'].'"  class="btn btn-info btn-sm editbtn" >Edit</a>  <a href="javascript:void();" data-id="'.$row['user_id'].'"  class="btn btn-danger btn-sm deleteBtn" >Delete</a>';
            $no++;
            $data[] = $sub_array;

        }

        $output = array(
            'draw'=> intval($_POST['draw']),
            'recordsTotal' =>$count_rows ,
            'recordsFiltered'=>   $total_all_rows,
            'data'=>$data,
        );
        return $output;
    }

    //fetch record by id Function
    public function getRecordById($userid)
    {
        $oneresult=mysqli_query($this->conn,"select * from user_data where user_id=$userid");
        $count_rows = mysqli_num_rows($oneresult);
        if($count_rows>0){
            $row=mysqli_fetch_assoc($oneresult);
            return $row;
        }else{
            return false;

        }

    }

    //update data by id Function
    public function updateById($fields, $where_condition)
    {

        $query = '';  
        $condition = '';  
        foreach($fields as $key => $value)  
        {  
            $query .= $key . "='".$value."', ";  
        }  
        $query = substr($query, 0, -2); 
        foreach($where_condition as $key => $value)  
        {  
            $condition .= $key . "='".$value."' AND ";  
        }  
        $condition = substr($condition, 0, -5); 
        $updaterecord=mysqli_query($this->conn,"update  user_data set ".$query." where ".$condition." ");
        return $updaterecord;
    }

    //Delete data by id function
    public function delete($rid)
    {
        $deleterecord=mysqli_query($this->conn,"delete from user_data where user_id=$rid");
        return $deleterecord;
    }
}
    
?>
