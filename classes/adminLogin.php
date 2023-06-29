<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/session.php");
    Session::checkLogin();
    include_once ($filepath."/../lib/database.php");
    include_once ($filepath."/../helpers/format.php");
?>
<?php
    class adminLogin 
    {
        private $db;
        private $fm;
        
        public function __construct(){
       
        $this->db = new Database();
        $this->fm = new Format();

        }
        public function AdminLogin($adminUser,$adminPass){
            $adminUser = $this->fm->validation($adminUser);
            $adminPass = $this->fm->validation($adminPass);

            if(empty($adminUser)||empty($adminPass)){
                $alert ="Please fill the blank of adminUser and adminPass";
                return $alert;
            }
            else{
                $query = "select * from admin where username = '".$adminUser."' and password = '".$adminPass."' and level =1";
                $result = $this->db->select($query);
                if ($result) {
                    $admin = $result->fetch_assoc();     
                    Session::set('adminName',$admin['username']);
                    Session::set('adminPassword',$admin['password']);
                    Session::set('adminEmail',$admin['email']);
                    Session::set('login',true);
                    header("Location: index.php");
                }
                else{
                    $alert ="Sai username hoặc mật khẩu!";
                    return $alert;
                }
            }


        }
        
    }
    
?>