<?php
class User
{
    private $servername;
    private $username;
    private $password;
    private $dbname;

     function connect()
    {
       $this->servername="localhost";
       $this->username="root";
       $this->password="";        //no password for root
       $this->dbname="cse";
    
      //pre-defined function 
       $conn=new mysqli($this->servername,
                        $this->username,
                        $this->password,
                        $this->dbname);

       return $conn;
       if (mysqli_connect_errno())
       {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
       }
   }

   function chk_login($id,$pass)
   {
       $conncetion = $this->connect();
       $sql1="SELECT * from student WHERE std_id='$id' and std_pass='$pass'";
       $sql2="SELECT * from teacher WHERE t_id='$id' and t_pass='$pass'";
       
       //checking if the username is available in the table
       $result1   = $conncetion->query($sql1);
       $result2   = $conncetion->query($sql2);
       $count_std = $result1->num_rows;
       $count_t   = $result2->num_rows;

        if ($count_std == 1)
        {
          $_SESSION['role'] = "student";
          return $result1;
        }

        else if ($count_t == 1)
        {
          $_SESSION['role'] = "teacher";
          return $result2;
        }

        else 
        { return null;}   
   }

   //return user row info
   function account($role, $id)
   {
      $conncetion = $this->connect();
      if ($role == "student"){
        $sql        ="SELECT * from student WHERE std_id='$id'";
        $result     = $conncetion->query($sql);
        $std_data   = $result->fetch_assoc();
      }

      else if ($role == "teacher"){
        $sql        ="SELECT * from teacher WHERE t_id='$id'";
        $result     = $conncetion->query($sql);
        $std_data   = $result->fetch_assoc();
      }
      
        return $std_data;
   }

   //return teachers list
   function teachers()
   {
      $conncetion = $this->connect();
      $sql        ="SELECT * from teacher";
      $result     = $conncetion->query($sql);            
      $count_t   = $result->num_rows;            //total no of rows

      If ($count_t > 0)
      {
          While ($row=$result->fetch_assoc()){  //fetch to retrieve 
          $data[]=$row;
          }
       return $data;
      }  
   }//end function

   //return OH detail in the form 
   function oh($name)
   { 
      $conncetion = $this->connect();
      $sql        ="SELECT * FROM teacher_oh NATURAL JOIN teacher WHERE t_name='$name' AND reserved=0";
      $result     = $conncetion->query($sql);         
      $count      = $result->num_rows;            //total no of rows

      If ($count > 0)
      {
          While ($row=$result->fetch_assoc()){  //fetch to retrieve 
          $data[]=$row;
          }
       return $data;
      }  
   }//end function
    
  //to book a new office hour
   function bookOH($id, $std_id, $type, $detail, $status)
   {
      $conncetion = $this->connect();
      $sql = "INSERT INTO book_oh (id, std_id, type, detail, status)
      VALUES ($id,'$std_id', '$type', '$detail', '$status')";

      $inserted = $conncetion->query($sql);
      return $inserted;
   }

   function reserved($id, $free)
   {
      $sql        = "UPDATE teacher_oh SET reserved = $free WHERE id = $id";
      $conncetion = $this->connect();
      $res        = $conncetion->query($sql);
        return $res;
   }

   function alterBook($user, $id, $alter)
   {
      $sql        = "UPDATE book_oh SET status = '$alter' WHERE id = $id";
      $conncetion = $this->connect();
      $res        = $conncetion->query($sql);
        return $res;
   }

   function showOH($id, $status, $role)
   {
    
    //to print in student page
    if ($role == 1){
        $sql ="SELECT id, t_name, type, day, slot, detail FROM teacher_oh NATURAL JOIN teacher NATURAL JOIN book_oh WHERE std_id='$id' AND status='$status'";}
      
      //to print in teacher page
    else if ($role == 2){
      $sql        ="SELECT * FROM student NATURAL JOIN teacher NATURAL JOIN book_oh NATURAL JOIN teacher_oh WHERE status='$status' AND t_id='$id'";}

      $conncetion = $this->connect();
      $result     = $conncetion->query($sql);         
      $count      = $result->num_rows;            //total no of rows

      If ($count > 0)
      {
          While ($row=$result->fetch_assoc()){  //fetch to retrieve 
          $data[]=$row;
          }
       return $data;
      }  
   }

   //add new workshop
   function addWorkshop($title, $detail, $presenter, $date, $time, $place)
   {
      $conncetion = $this->connect();
      $sql = "INSERT INTO workshop (title, detail, presenter, date, time, place)
      VALUES ('$title', '$detail', '$presenter', '$date', '$time', '$place')";

      $inserted = $conncetion->query($sql);
      return $inserted;
   }
    
  //print the workshop
   function allWorkshop($choice, $name)
   {
      //retrieve all workshop 
      $conncetion = $this->connect();
      if ($choice == 1){
          $sql        ="SELECT * from workshop";}
      //retrieve teacher's workshop only    
      else if ($choice == 2) {
          $sql   ="SELECT * from workshop WHERE presenter='$name'";}

      $result    = $conncetion->query($sql);            
      $count_t   = $result->num_rows;            //total no of rows

      if ($count_t > 0)
      {
          While ($row=$result->fetch_assoc()){  //fetch to retrieve 
          $data[]=$row;
      }
        return $data;
      }   
   }
    
   //to register in the course 
   function registerWorkshop($w_id, $id)
   {
      $conncetion = $this->connect();
      $sql       ="SELECT * from register_work WHERE std_id='$id' and id='$w_id'";
      $result    = $conncetion->query($sql);
      $count     = $result->num_rows;
      if ($count == 1)
      {
        return false; 
      }
      
      else if ($count == 0)
      {
        $sql = "INSERT INTO register_work (id, std_id)
        VALUES ($w_id, '$id')";

        $inserted = $conncetion->query($sql);
        return $inserted;
      }
   }

   function myWorkshop($id, $removed)
   {
      $conncetion = $this->connect();
      $sql        ="SELECT * FROM register_work NATURAL JOIN workshop WHERE register_work.std_id = '$id' AND removed='$removed'";
      $result     = $conncetion->query($sql);            
      $count_t   = $result->num_rows;            //total no of rows

      If ($count_t > 0)
      {
          While ($row=$result->fetch_assoc()){  //fetch to retrieve 
          $data[]=$row;
          }
       return $data;
      }  
   }

    function manageWorkshop($name, $title)
    {
      $conncetion = $this->connect();
      $sql        ="SELECT * FROM workshop NATURAL JOIN register_work NATURAL JOIN student WHERE workshop.presenter = '$name' AND workshop.title = '$title' AND removed=0";
      $result     = $conncetion->query($sql);            
      $count_t   = $result->num_rows;            //total no of rows

      If ($count_t > 0)
      {
          While ($row=$result->fetch_assoc()){  //fetch to retrieve 
          $data[]=$row;
          }
       return $data;
      }  
    }

    function alterWorkshop($std_id, $w_id, $alter)
   {
      $sql        = "UPDATE register_work SET removed = '$alter' WHERE id = '$w_id' AND std_id='$std_id'";
      $conncetion = $this->connect();
      $res        = $conncetion->query($sql);
        return $res;
   }

   //get teacher email to send the notification 
   function getTeacherEmail($oh_id)
   { 
      $conncetion = $this->connect();
      $sql        ="SELECT t_email, t_name FROM teacher_oh NATURAL JOIN teacher WHERE id ='$oh_id'";
      $result     = $conncetion->query($sql);         
      $count      = $result->num_rows;            //total no of rows

      If ($count > 0)
      {
          While ($row=$result->fetch_assoc()){  //fetch to retrieve 
          $data[]=$row;
          }
       return $data;
      }  
   }//end function

   //get student email to send the notification 
   function getStudentEmail($oh_id)
   { 
      $conncetion = $this->connect();
      $sql        ="SELECT std_email FROM book_oh NATURAL JOIN student WHERE id='$oh_id' AND status='booked'";
      $result     = $conncetion->query($sql);         
      $count      = $result->num_rows;            //total no of rows

      If ($count > 0)
      {
          While ($row=$result->fetch_assoc()){  //fetch to retrieve 
          $data[]=$row;
          }
       return $data;
      }  
   }//end function

   //get oh details for email notfi.
   function getOh($oh_id)
   { 
      $conncetion = $this->connect();
      $sql        ="SELECT * FROM teacher_oh WHERE id ='$oh_id'";
      $result     = $conncetion->query($sql);         
      $count      = $result->num_rows;            //total no of rows

      If ($count > 0)
      {
          While ($row=$result->fetch_assoc()){  //fetch to retrieve 
          $data[]=$row;
          }
       return $data;
      }  
   }//end function


}//end of the class
?>