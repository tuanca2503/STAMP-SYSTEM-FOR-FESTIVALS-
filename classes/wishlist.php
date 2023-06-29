<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath."/../lib/session.php");
    include_once($filepath."/../lib/database.php");
    include_once($filepath."/../helpers/format.php");
?>
<?php
    class Wishlist
    {
        private $db;
        private $fm;
        
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function addToWishList($idwishlist){
            $id = $this->fm->validation($idwishlist);
            $sId = session_id();
            $query = "select * from wishlist where bookid = '".$id."' and sId = '$sId'";
            $kq = $this->db->select($query);
            if ($kq) {
                $alert = "<span class='text-danger'>Item Already Added!</span>";
                return $alert;
            }
            else{
                $query = "insert into wishlist(sId,bookid) values ('$sId','$id')";
                $result= $this->db->insert($query);
                if ($result) {
                    $alert = "<span class='text-success'>Item Successfully Added!</span>";
                    return $alert;
                }
                
            }
            
        }
        public function showWishlist(){
            $sId = session_id();
            $query = "  select wishlist.*,book.name as name,book.instock as instock,book.price as price,book.img as img from wishlist 
                        inner join book
                        on wishlist.bookid = book.id
                        where sId = '".$sId."' ";
            $result= $this->db->select($query);
               return $result;
            
        }
        
        public function deleteWishlist($id){
            $sId = session_id();
            $id = $this->fm->validation($id);
            $query = "delete from wishlist where id = '$id' and sId = '$sId'";
            $result= $this->db->delete($query);
            return $result;

        }
        public function CountItems(){
            $sId = session_id();
            $query = " select count(bookid) as number from wishlist where sId = '$sId'
                         ";
            $result= $this->db->select($query);
            if ($result) {
              $kq= $result->fetch_assoc();
              Session::set('wishlist',$kq['number']);
            }
               
        }
    }
?>