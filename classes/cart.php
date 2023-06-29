<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/session.php");
    include_once ($filepath."/../lib/database.php");
    include_once ($filepath."/../helpers/format.php");
?>
<?php
    class Cart
    {
        private $db;
        private $fm;
        
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function addTocart($quantity,$id){
            $id = $this->fm->validation($id);
            $sId = session_id();
            $query = "select * from cart where bookid = '".$id."' and sId = '$sId'";
            $kq = $this->db->select($query);
            if ($kq) {
                $alert = "<span class='text-danger'>Item Already Added!</span>";
                return $alert;
            }
            else{
                $query = "insert into cart(sId,bookid,quantity) values ('$sId','$id','$quantity')";
                $result= $this->db->insert($query);
                if ($result) {
                    $alert = "<span class='text-success'>Item Successfully Added!</span>";
                    return $alert;
                }
                
            }
            
        }
        public function showCart(){
            $sId = session_id();
            $query = "select cart.*,book.name as name,book.author as author,book.price as price,book.img as img, book.language as language from cart 
                        inner join book on cart.bookid = book.id
                        where sId = '$sId' ";
            $result= $this->db->select($query);
            return $result;
        }
        public function updateQuantityCart($id,$quantity){
            $sId = session_id();
            $quantity = $this->fm->validation($quantity);
            $id = $this->fm->validation($id);
            $query = "update cart set quantity = '$quantity' where id ='$id' and sId = '$sId'";
            $result= $this->db->update($query);
            return $result;
        }
        public function deleteCart($idcart){
            $sId = session_id();
            $id = $this->fm->validation($idcart);
            $query = "delete from cart where id = '$id' and sId = '$sId'";
            $result= $this->db->delete($query);
            return $result;

        }
        public function CountItems(){
            $sId = session_id();
            $query = " select count(bookid) as number from cart where sId = '$sId'
                         ";
            $result= $this->db->select($query);
            if ($result) {
              $kq= $result->fetch_assoc();
              Session::set('cart',$kq['number']);
            }
               
        }
    }
?>