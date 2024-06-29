
<?php
include('db.php');
function Serv_Type()
{
   $conn_STUDENT = $GLOBALS['db'];
   $sel="SELECT * from services_type";
  $data=$conn_STUDENT->query($sel);
  return $data;
}



function user_info()
{
   
  $USER_Name=$_SESSION['User_NAME'];
   $conn_STUDENT = $GLOBALS['db'];
   $sel="SELECT * from user_registration where User_Name='".$USER_Name."'";
  $data=$conn_STUDENT->query($sel);
 $info_User_Get=$data->fetch_object();
  return $info_User_Get;
}


function Get_item($food_type)
{
   $conn_STUDENT = $GLOBALS['db'];
	$sel="SELECT * from services_uploade where Services_Type='".$food_type."'";
	$info=$conn_STUDENT->query($sel);
	return $info;
}
function Get_Menu_count()
{
   $conn_STUDENT = $GLOBALS['db'];
  $sel="SELECT * from menu_upload ";
  $info=$conn_STUDENT->query($sel);
  return $info;
}
function get_detail($menu_Id)
{
   $conn_STUDENT = $GLOBALS['db'];
	 $sel="SELECT * from services_uploade where ID='".$menu_Id."'";
	$info=$conn_STUDENT->query($sel);
	$dta=$info->fetch_object();
	return $dta;
}
function get_order_detail($User_Id)
{
   $conn_STUDENT = $GLOBALS['db'];
	 $sel="SELECT * from order_temp where User_ID='".$User_Id."' and
    Order_Status=''";
	$info=$conn_STUDENT->query($sel);
	return $info;
}


function get_order_temp_Count()
{
   $conn_STUDENT = $GLOBALS['db'];
   $sel="SELECT * from order_temp where User_ID='".$_SESSION['User_id']."'and Order_Status='' ";
  $info=$conn_STUDENT->query($sel);
  return $info;
}

function get_order_status_Count($user_id) {
   global $db;
   $sql = "SELECT * FROM order_detail WHERE User_ID = '$user_id'";
   return $db->query($sql);
}



function menu_record() {
   global $db;
   $query = "SELECT * FROM menu";
   $result = $db->query($query);

   if ($result === false) {
       echo "Error: " . $db->error;
       return null;
   }

   return $result;
}

 ?>
