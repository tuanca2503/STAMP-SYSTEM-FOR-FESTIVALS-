<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/session.php");
    include_once ($filepath."/../lib/database.php");
    include_once ($filepath."/../helpers/format.php");
?>
<?php
    class Feedback
    {
        private $db;
        private $fm;
        
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insertFeedback($data){
            $content = mysqli_real_escape_string($this->db->link, $data['content']);
            $adminid = Session::get('id');
            $rate = mysqli_real_escape_string($this->db->link, $data['rate']);
            $feedbackdate = mysqli_real_escape_string($this->db->link,$data['feedbackdate']);
            if (empty($content)||empty($rate)) {
                $alert = "<span class='text-danger'>Sending feedback failed!</span>";
                return $alert;
            }else{
                $query = "insert into feedback(adminid,content,rate,feedbackdate) values('$adminid','$content','$rate','$feedbackdate')";
                $result=$this->db->insert($query);
                if ($result) {
                    $alert="<span class='text-success'>Sending feedback successful!</span>";
                    return $alert;
                }else{
                    $alert="<span class='text-danger'>Sending feedback failed!</span>";
                    return $alert;
                }
                
            }
        }
        public function showFeedBack(){
            $query = "select feedback.*,admin.username as username,admin.fullname as fullname from feedback
                    inner join admin on feedback.adminid = admin.id
            ";
            $result= $this->db->select($query);
            return $result;
        }
        public function countFeedback(){
            $query = "select count(feedback.id) as feedback from feedback";
            $result= $this->db->select($query);
            if ($result) {
                while ($kq = $result->fetch_assoc()) {
                   $number = $kq['feedback'] ;
                }
                Session::set('countFeedback',$number);
            }
            
        }
       
        //back end 
        public function deleteFeedback($id){
            $id = $this->fm->validation($id);
            $query = "delete from feedback where id = '$id' ";
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
        public function getFeedbackById($id){
            $id = $this->fm->validation($id);
            $query = "select * from feedback where id = '".$id."' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function updateFeedback($content,$id,$rate,$feedbackdate){
            $id = $this->fm->validation($id);
           
            if(empty($content)||empty($feedbackdate)||empty($rate)){
                $alert ="Please fill the blank ";
                return $alert;
            }
            else{
                $query = "update feedback set content = '$content',rate = '$rate',feedbackdate = '$feedbackdate' where id = '$id' ";
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
       
}
?>