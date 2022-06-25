<?php 
class Contact{
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $db="contact";
    public $mysqli;
    
    public function __construct() {
        return $this->mysqli=new mysqli($this->host, $this->user, $this->pass, $this->db);
    }
    
    public function contact_us($data){
        $fname=$data['name'];
        $lname=$data['surname'];
        $email=$data['email'];
        $phone=$data['phone'];
        $message=$data['message'];
        $q="insert into contact_us set first_name='$fname', last_name='$lname', email='$email', phone='$phone', message='$message'";
       $data= $this->mysqli->query($q);
       if($data==true){
           $body="One message received from e-pharmacy contact us. details are below..<br> first_name='$fname', last_name='$lname', email='$email', phone='$phone', message='$message'";
           return $this->sent_mail("kaundikizamunashe@gmail.com", "Message received from E-Pharmacy", $body);
       }
    }
    
    public function sent_mail($to,$subject,$body){
        $to = "kaundikizamunashe@gmail.com";
        $subject = "E-Pharmacy mail";
        
        $mailHeader = "From: info@e-pharmacy.com\r\nReply-To: kaundikizamunashe@gmail.com";
        $mail_send = mail($to, $subject, $body, $mailHeader);
            if($mail_send==true){
                return true;
            } else {
                return false;
            }

    }
}

?>