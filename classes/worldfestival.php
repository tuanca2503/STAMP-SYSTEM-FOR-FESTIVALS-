<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath."/../lib/session.php");
    include_once($filepath."/../lib/database.php");
    include_once($filepath."/../helpers/format.php");
?>
<?php
    class WorldFestival 
    {
        private $db;
        private $fm;
        
        public function __construct(){
       
        $this->db = new Database();
        $this->fm = new Format();

        }
        public function addWorldFestival($data, $files){
            $festival_name = mysqli_real_escape_string($this->db->link,$data['world_festival_name']);
            $festival_description = mysqli_real_escape_string($this->db->link,$data['world_festival_description']);
            $festival_place = mysqli_real_escape_string($this->db->link,$data['world_festival_place']);
            $festival_time = mysqli_real_escape_string($this->db->link,$data['world_festival_time']);
            $longtitude = mysqli_real_escape_string($this->db->link,$data['longtitude']);
            $latitude = mysqli_real_escape_string($this->db->link,$data['latitude']);


            $target_dir = "../uploads/";
            $target_file = $target_dir.basename($_FILES["world_festival_image"]["name"]);
            $file_name = $_FILES['world_festival_image']['name'];
           
            if(empty($festival_name) ||empty($festival_description) || empty($festival_place)){
                $alert ="Please fill the blank of festival name, description or festival place";
                return $alert;
            }
            else{
                move_uploaded_file($_FILES["world_festival_image"]["tmp_name"], $target_file);
                $query = "insert into worldfestival (name, description, place, img, time,latitude,longtitude) values ('$festival_name','$festival_description','$festival_place','$file_name','$festival_time','$latitude','$longtitude')";
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
        public function WorldFestivalList(){
            $query = " select * from worldfestival    
            ";
            $result = $this->db->select($query);
            return $result;
        }
        public function getFestivalById($id){
            $id = $this->fm->validation($id);
            $query = "select * from worldfestival where id = '".$id."' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function updateFestivalById( $data, $file,$id){
            $id = $this->fm->validation($id);
            $festival_name = mysqli_real_escape_string($this->db->link,$data['world_festival_name']);
            $festival_description = mysqli_real_escape_string($this->db->link,$data['world_festival_description']);
            $festival_place = mysqli_real_escape_string($this->db->link,$data['world_festival_place']);
            $festival_time = mysqli_real_escape_string($this->db->link,$data['world_festival_time']);
            $longtitude = mysqli_real_escape_string($this->db->link,$data['longtitude']);
            $latitude = mysqli_real_escape_string($this->db->link,$data['latitude']);

            
            $target_dir = "../uploads/";
            $target_file = $target_dir.basename($_FILES["world_festival_image"]["name"]);
            $file_name = $_FILES['world_festival_image']['name'];
       
            if(empty($festival_name) ||empty($festival_description) || empty($festival_place) ||empty($file_name)||empty($longtitude)||empty($latitude)){
                $alert ="Please fill the blank of festival name, description or festival place";
                return $alert;
            }if(empty($festival_name) &&empty($festival_description) && empty($festival_place)&&empty($file_name)&&empty($longtitude)&&empty($latitude)){
                $alert ="Please fill the blank of festival name, description or festival place";
                return $alert;
            }
            else{
                move_uploaded_file($_FILES["world_festival_image"]["tmp_name"], $target_file);
                $query = "update worldfestival set name = '$festival_name', description = '$festival_description', place ='$festival_place',img ='$file_name', time ='$festival_time',latitude='$latitude',longtitude='$longtitude' where id = '$id' ";
                $result = $this->db->update($query);
                if ($result) {
                    $alert ="Update thành công";
                    return $alert;
                }
                else{
                    $alert ="Không Update được!";
                    return $alert;
                }
            }


        }
        public function deleteWorldFestival($id){
            $id = $this->fm->validation($id);
            $query = "delete from worldfestival where id = '$id' ";
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
        ///Front end
        public function WorldFestivalRandom(){
            $query = " select * from worldfestival limit 1,4 
            ";
            $result = $this->db->select($query);
            return $result;
        }
        public function WorldFestivalRandom2(){
            $query = " select * from worldfestival where id <16 and id >12
            ";
            $result = $this->db->select($query);
            return $result;
        }
        public function WorldFestivalRandom3(){
            $query = " select * from worldfestival where id <=11 and id >=8
            ";
            $result = $this->db->select($query);
            return $result;
        }
        public function getWorldFestivalById($id){
            $id = $this->fm->validation($id);
            $query = "select * from worldfestival where id = '".$id."' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function WorldFestivalPage1(){
            $query = " select * from worldfestival order by id asc limit 6
            ";
            $result = $this->db->select($query);
            return $result;
        }
        public function WorldFestivalPage2(){
            $query = " select * from worldfestival where id between 9 and 14
            ";
            $result = $this->db->select($query);
            return $result;
        }
        public function WorldFestivalPage3(){
            $query = " select * from worldfestival order by id desc limit 4
            ";
            $result = $this->db->select($query);
            return $result;
        }
        
        
    }
    
?>