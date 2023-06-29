<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/session.php");
    include_once ($filepath."/../lib/database.php");
    include_once ($filepath."/../helpers/format.php");
?>
<?php
    class Festival 
    {
        private $db;
        private $fm;
        
        public function __construct(){
       
        $this->db = new Database();
        $this->fm = new Format();

        }
        public function addFestival($data, $files){
            $festival_name = mysqli_real_escape_string($this->db->link,$data['festival_name']);
            $festival_description = mysqli_real_escape_string($this->db->link,$data['festival_description']);
            $festival_place = mysqli_real_escape_string($this->db->link,$data['festival_place']);
            $festival_time = mysqli_real_escape_string($this->db->link,$data['festival_time']);
            $longtitude = mysqli_real_escape_string($this->db->link,$data['longtitude']);
            $latitude = mysqli_real_escape_string($this->db->link,$data['latitude']);
            $idreligion = mysqli_real_escape_string($this->db->link,$data['idreligion']);

            $target_dir = "../uploads/";
            $target_file = $target_dir.basename($_FILES["festival_image"]["name"]);
            $file_name = $_FILES['festival_image']['name'];
            
            if (empty($festival_name) ||empty($festival_description) || empty($festival_place)||empty($file_name)||empty($festival_time)||empty($longtitude)||empty($latitude)) {
                $alert ="Please fill the blank of festival name, description, time, longtitude, latitude or festival place";
                return $alert;
            }if (empty($festival_name) && empty($festival_description) && empty($festival_place)&&empty($file_name)&&empty($festival_time)&&empty($longtitude)&&empty($latitude)){
                $alert ="Please fill the blank of festival name, description, longtitude, latitude or festival place";
                return $alert;
            }
            else{
                move_uploaded_file($_FILES["festival_image"]["tmp_name"], $target_file);
                $query = "insert into festival (name, description, place, img, idreligion, time,longtitude,latitude) values ('$festival_name','$festival_description','$festival_place','$file_name','$idreligion','$festival_time','$longtitude','$latitude')";
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
        public function festivalList(){
            $query = "SELECT Festival.*, Religion.Name as religioname
            FROM Festival
            INNER JOIN Religion ON Festival.idreligion=Religion.id;     
            ";
            $result = $this->db->select($query);
            return $result;
        }
        public function getFestivalById($id){
            $id = $this->fm->validation($id);
            $query = "select * from festival where id = '".$id."' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function updateFestivalById( $data, $file,$id){
            $id = $this->fm->validation($id);
            $festival_name = mysqli_real_escape_string($this->db->link,$data['festival_name']);
            $festival_description = mysqli_real_escape_string($this->db->link,$data['festival_description']);
            $festival_place = mysqli_real_escape_string($this->db->link,$data['festival_place']);
            $idreligion = mysqli_real_escape_string($this->db->link,$data['idreligion']);
            $festival_time = mysqli_real_escape_string($this->db->link,$data['festival_time']);
            $longtitude = mysqli_real_escape_string($this->db->link,$data['longtitude']);
            $latitude = mysqli_real_escape_string($this->db->link,$data['latitude']);

            $target_dir = "../uploads/";
            $target_file = $target_dir.basename($_FILES["festival_image"]["name"]);
            $file_name = $_FILES['festival_image']['name'];
       
            if(empty($festival_name) ||empty($festival_description) || empty($festival_place)||empty($file_name)||empty($festival_time)||empty($longtitude)||empty($latitude)){
                $alert ="Please fill the blank of festival name, description or festival place";
                return $alert;
            }if(empty($festival_name) && empty($festival_description) && empty($festival_place)&&empty($file_name)&&empty($festival_time)&&empty($longtitude)&&empty($latitude)){
                $alert ="Please fill the blank of festival name, description or festival place";
                return $alert;
            }else{
                move_uploaded_file($_FILES["festival_image"]["tmp_name"], $target_file);
                $query = "update festival set name = '$festival_name', description = '$festival_description', place ='$festival_place',img ='$file_name', idreligion ='$idreligion',time='$festival_time',latitude='$latitude',longtitude='$longtitude' where id = '$id' ";
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
        public function deleteFestival($id){
            $id = $this->fm->validation($id);
            $query = "delete from festival where id = '$id' ";
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
        //Frontend
        public function FestivalRandom(){
            $query = "SELECT  Festival.*, Religion.name as religioname
            FROM Festival
            inner join Religion
            on Festival.idreligion=Religion.id
            limit 3  
            ";
            $result = $this->db->select($query);
            return $result;
        }
        public function FestivalRandom2(){
            $query = "SELECT  Festival.*, Religion.name as religioname
            FROM Festival
            inner join Religion
            on Festival.idreligion=Religion.id
            order by id desc limit 3  
            ";
            $result = $this->db->select($query);
            return $result;
        }
        public function getReligionFestivalById($id){
            $id = $this->fm->validation($id);
            $query = "SELECT  festival.*, Religion.name as religioname
            FROM festival
            inner join religion
            on festival.idreligion=religion.id
            where festival.id = '".$id."'";
            $result = $this->db->select($query);
            return $result;
        }
        public function getReligionFestival($id){
            $id = $this->fm->validation($id);
            $query = "SELECT  Festival.*, Religion.name as religioname
            FROM Festival
            inner join Religion
            on Festival.idreligion=Religion.id
            where Festival.idreligion = '".$id."'";
            $result = $this->db->select($query);
            return $result;
        }
        public function getFestival(){
            $query = "select Festival.* from Festival";
            $result = $this->db->select($query);
            return $result;
        }
        
    }
    
?>