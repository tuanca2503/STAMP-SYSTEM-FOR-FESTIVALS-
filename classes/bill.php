<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/session.php");
    include_once ($filepath."/../lib/database.php");
    include_once ($filepath."/../helpers/format.php");
?>
<?php
    class Bill
    {
        private $db;
        private $fm;
        
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insertBill($data){
            $orderdate = mysqli_real_escape_string($this->db->link,$data['orderdate']);
            $adminid = Session::get('id');
            $items = Session::get('cart');
            $paymentMethod = mysqli_real_escape_string($this->db->link,$data['paymentMethod']);
            $cardname = mysqli_real_escape_string($this->db->link,$data['cardname']);
            $cardnumber = mysqli_real_escape_string($this->db->link,$data['cardnumber']);
            $sId = session_id();
             
            if ($cardname == null && $cardnumber == null && $paymentMethod == 'cash') {
                $query = "insert into bill(adminid,paymethod,sId,orderdate,items) values('$adminid','$paymentMethod','$sId','$orderdate','$items')";
                $result = $this->db->insert($query);
                if ($result) {
                    echo'<script>
                        window.location="bill.php";
                    </script>';
                } else {
                    $alert="<span class='text-danger'>Payment failed!</span>";
                    return $alert;
                }
            }if ($cardname !=null && $cardnumber != null ) {
                $query = "insert into bill(adminid,paymethod,cardname,cardnumber,sId,orderdate,items) values('$adminid','$paymentMethod','$cardname','$cardnumber','$sId','$orderdate','$items')";
                $result = $this->db->insert($query);
                if ($result) {
                    $alert="<span class='text-success'>Payment successful! <a class='text-success' href='bill.php'><b>Click here to review your bill order!</b></a></span>";
                    return $alert;
                } else {
                    $alert="<span class='text-danger'>Payment failed!</span>";
                    return $alert;
                }
            }else{
                $alert="<span class='text-danger'>Payment method details must be not empty!</span>";
                return $alert;
            }   
        }   
    
        public function showBill(){
            $sId = session_id();
            $query ="select bill.* from bill
            where bill.sId = '$sId' ";
            $result = $this->db->select($query);
            return $result;
         
        }
        //Back end
        public function showBillAdmin(){
            $sId = session_id();
            $query ="select bill.* ,admin.fullname as fullname,admin.address as address,admin.telephone as phone,admin.email as email from bill 
            inner join admin on bill.adminid = admin.id ";
            $result = $this->db->select($query);
            return $result;
        }
        public function deleteBill($id){
            $id = $this->fm->validation($id);
            $query = "delete from bill where id = '$id' ";
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
        public function getBillById($id){
            $id = $this->fm->validation($id);
            $query = "select * from bill where id = '".$id."' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function updateStatusBill($status,$id){
            $id = $this->fm->validation($id);
           
            if(empty($status)){
                $alert ="Please fill the blank of status";
                return $alert;
            }
            else{
                $query = "update bill set status = '$status' where id = '$id' ";
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