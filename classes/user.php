<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath."/../lib/session.php");
    include_once($filepath."/../lib/database.php");
    include_once($filepath."/../helpers/format.php");
?>
<?php
    class User
    {
        private $db;
        private $fm;
        
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function UserLogin($username, $password)
        {
            $username = $this->fm->validation($username);
            $password = $this->fm->validation($password);

            if (empty($username)||empty($password)) {
                $alert ="Please fill the blank of username and password";
                return $alert;
            } else {
                $query = "select * from admin where username = '".$username."' and password = '".$password."'";
                $result = $this->db->select($query);
                if ($result) {
                    $user = $result->fetch_assoc();
                    Session::set('username', $user['username']);
                    Session::set('fullname', $user['fullname']);
                    Session::set('password', $user['password']);
                    Session::set('email', $user['email']);
                    Session::set('telephone', $user['telephone']);
                    Session::set('address', $user['address']);
                    Session::set('level', $user['level']);
                    Session::set('id', $user['id']);
                    Session::set('login', true);
                echo'<script>
                        window.location="index.php";
                    </script>';
                } else {
                    $alert ="<b style='color:red'>Wrong name or password! Please try again!</b>";
                    return $alert;
                }
            }
        }
        public function registerAccount($data)
        {
            $username = mysqli_real_escape_string($this->db->link, $data['username']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $fullname = mysqli_real_escape_string($this->db->link, $data['fullname']);
            $telephone = mysqli_real_escape_string($this->db->link, $data['telephone']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
            $query = "select * from admin where username = '$username' or email = '$email' or telephone = '$telephone'";
            $result = $this->db->select($query);
            if ($result) {
                $alert="<span class='text-danger'><b>Account has existed! Create new account</b></span>";
                return $alert;
            } else {
                $query = "insert into admin(username,email,address,fullname,telephone,password) values ('$username','$email','$address','$fullname','$telephone','$password')";
                $result = $this->db->insert($query);
                if ($result) {
                    echo'<script>
                        window.location="login.php";
                    </script>';
                } else {
                    $alert ="<span class='text-danger'><b></b>Account added failed!</span>";
                    return $alert;
                }
            }
        }
        public function getAccountById($id)
        {
            $id = $this->fm->validation($id);
            $query = "select * from admin where id = '$id'";
            $result=$this->db->select($query);
            return $result;
        }
        public function updateAccount($data, $id)
        {
            $id = $this->fm->validation($id);
            $username = mysqli_real_escape_string($this->db->link, $data['username']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $fullname = mysqli_real_escape_string($this->db->link, $data['fullname']);
            $telephone = mysqli_real_escape_string($this->db->link, $data['telephone']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
           
            $query = "update admin set username = '$username', email = '$email', address ='$address',fullname ='$fullname', telephone ='$telephone', password='$password' where id = '$id' ";
            $result = $this->db->update($query);
            if ($result) {
                $alert ="<span class='text-success'><b>Account succcessfully updated!</b></span>";
                return $alert;
            } else {
                $alert ="<span class='text-danger'><b>ccount updated fail!</b></span>";
                return $alert;
            }
        }
        //back end
        public function showListUser()
        {
            $query = 'select * from admin';
            $result = $this->db->select($query);
            return $result;
        }
        public function countUser()
        {
            $query = "select count(id) as id from admin";
            $result = $this->db->select($query);
            if ($result) {
                $kq = $result->fetch_assoc();
                $count = $kq['id'];
                return $count;
            }
        }
        public function getUserLevelById($id)
        {
            $id = $this->fm->validation($id);
            $query = "select * from admin where id = '".$id."' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function updateUserLevel($level,$id){
            $id = $this->fm->validation($id);
           
            if(empty($level)){
                $alert ="Please fill the blank of status";
                return $alert;
            }
            else{
                $query = "update admin set level = '$level' where id = '$id' ";
                $result = $this->db->update($query);
                if ($result) {
                    $alert ="Update thành công";
                    return $alert;
                }
                else{
                    $alert ="Không update được!";
                    return $alert;
                }
            }
        }
        public function deleteUser($id){
            $id = $this->fm->validation($id);
            $query = "delete from admin where id = '$id' ";
            $result = $this->db->delete($query);
            if ($result) {
                $alert ="Xóa thành công";
                return $alert;
            }
            else{
                $alert ="Không xóa được!";
                return $alert;
            }

        }
    }