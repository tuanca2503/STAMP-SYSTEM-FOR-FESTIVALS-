<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath."/../lib/session.php");
    include_once($filepath."/../lib/database.php");
    include_once($filepath."/../helpers/format.php");
?>
<?php
    class Gallery
    {
        private $db;
        private $fm;
        
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function getGalleryById($id){
            $id = $this->fm->validation($id);
            $query = "select * from gallery where idworldfestival = '".$id."' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function getGalleryByReligionId($id){
            $id = $this->fm->validation($id);
            $query = "select * from gallery where idfestival = '".$id."' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function getFestivalGallery(){
            $query = "select * from gallery";
            $result = $this->db->select($query);
            return $result;
        }
        public function getWorldFestival(){
            $query = "select * from gallery where idfestival is null";
            $result = $this->db->select($query);
            return $result;
        }
        //back end
        public function getFullDetailsFestivalGallery(){
            $query = "select gallery.*, worldfestival.name as worldname, festival.name as festivalname
            FROM  ((gallery
            left JOIN worldfestival  ON gallery.idworldfestival=worldfestival.id)
            left JOIN festival  ON gallery.idfestival=festival.id)
            
            ";
            $result = $this->db->select($query);
            return $result;
        }
        public function addGallery($data,$files){
            $idfestival = mysqli_real_escape_string($this->db->link,$data['idfestival']);
            $target_dir = "../uploads/";
            $target_file = $target_dir.basename($_FILES["source"]["name"]);
            $file_name = $_FILES['source']['name'];
           
            if(empty($idfestival) ||empty($file_name)){
                $alert ="Please fill the blank ";
                return $alert;
            }
            if(empty($idfestival) &&empty($file_name)){
                $alert ="Please fill the blank ";
                return $alert;
            }
            else{
                move_uploaded_file($_FILES["source"]["tmp_name"], $target_file);
                $query = "insert into gallery (source, idfestival) values 
                ('$file_name','$idfestival')";
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
        public function addGallery2($data,$files){
            $idworldfestival = mysqli_real_escape_string($this->db->link,$data['idworldfestival']);
            $target_dir = "../uploads/";
            $target_file = $target_dir.basename($_FILES["source"]["name"]);
            $file_name = $_FILES['source']['name'];
           
            if(empty($idworldfestival) ||empty($file_name)){
                $alert ="Please fill the blank ";
                return $alert;
            }
            if(empty($idworldfestival) &&empty($file_name)){
                $alert ="Please fill the blank ";
                return $alert;
            }
            else{
                move_uploaded_file($_FILES["source"]["tmp_name"], $target_file);
                $query = "insert into gallery (source, idworldfestival) values 
                ('$file_name','$idworldfestival')";
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
        public function deleteGallery($id){
            $id = $this->fm->validation($id);
            $query = "delete from gallery where id = '$id' ";
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