<?php
    include("link.php");
class huvo
{
   public function check_login($con)
{
    if(isset($_SESSION['user_id']))
    {
        $id=$_SESSION['user_id'];
        $query="SELECT * FROM users WHERE user_id='$id' limit 1";
        $result=mysqli_query($con,$query);
        if($result && mysqli_num_rows($result)>0)
        {
            $user_data=mysqli_fetch_assoc($result);
            return $user_data; 
        }
    }
    //redirect to login
    header("Location:login.php");
    die;
}
public function random_num($length)
{
    $text="";
    if($length<5)
    {
        $length=5;
    }
    $len=rand(4,$length);
    
    for($i=0;$i<$len;$i++)
    {
        $text.=rand(0,9);
    }
    return $text;
}
private function remove_junk($str){
  $str = nl2br($str);
  $str = htmlspecialchars(strip_tags($str, ENT_QUOTES));
  return $str;
} 
}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

