<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/session.php");
    include_once ($filepath."/../lib/database.php");
    include_once ($filepath."/../helpers/format.php");
?>
<?php
    class Religion 
    {
        private $db;
        private $fm;
        
        public function __construct(){
       
        $this->db = new Database();
        $this->fm = new Format();

        }
        public function addReligion($religion_name,$religion_description){
            $religion_name = $this->fm->validation($religion_name);
            $religion_description = $this->fm->validation($religion_description);

            if(empty($religion_name)){
                $alert ="Please fill the blank of religion name";
                return $alert;
            }
            else{
                $query = "insert into religion (name, description) values ('$religion_name','$religion_description')";
                $result = $this->db->insert($query);
                if ($result) {
                    $alert ="Thêm thành công";
                    return $alert;
                }
                else{
                    $alert ="Không thêm được!";
                    return $alert;
                }
            }


        }
        public function religionList(){
            $query = "select * from religion";
            $result = $this->db->select($query);
            return $result;
        }
        public function getReligionById($id){
            $id = $this->fm->validation($id);
            $query = "select * from religion where id = '".$id."' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function updateReligionById($id, $religion_name, $religion_description){
            $id = $this->fm->validation($id);
            $religion_name = $this->fm->validation($religion_name);
            $religion_description = $this->fm->validation($religion_description);
       
            if(empty($religion_name)){
                $alert ="Please fill the blank of religion name";
                return $alert;
            }
            else{
                $query = "update religion set name = '$religion_name', description = '$religion_description' where id = '$id' ";
                $result = $this->db->insert($query);
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
        public function deleteReligion($id){
            $id = $this->fm->validation($id);
            $query = "delete from religion where id = '$id' ";
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
    
?>