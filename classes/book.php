<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/session.php");
    include_once ($filepath."/../lib/database.php");
    include_once ($filepath."/../helpers/format.php");
?>
<?php
    class Book 
    {
        private $db;
        private $fm;
        
        public function __construct(){
       
        $this->db = new Database();
        $this->fm = new Format();

        }
        public function addBook($data, $files){
            $book_name = mysqli_real_escape_string($this->db->link,$data['book_name']);
            $book_description = mysqli_real_escape_string($this->db->link,$data['book_description']);
            $book_price = mysqli_real_escape_string($this->db->link,$data['book_price']);
            $idreligion = mysqli_real_escape_string($this->db->link,$data['idreligion']);

            $author = mysqli_real_escape_string($this->db->link,$data['author']);
            $release_date = mysqli_real_escape_string($this->db->link,$data['release_date']);
            $genre = mysqli_real_escape_string($this->db->link,$data['genre']);
            $language = mysqli_real_escape_string($this->db->link,$data['language']);
            $instock = mysqli_real_escape_string($this->db->link,$data['instock']);



            $target_dir = "../uploads/";
            $target_file = $target_dir.basename($_FILES["book_image"]["name"]);
            $file_name = $_FILES['book_image']['name'];
           
            if(empty($book_name) ||empty($book_description) || empty($book_price)|| empty($author)|| empty($release_date)|| empty($genre)|| empty($language)|| empty($instock)|| empty($file_name)){
                $alert ="Please fill the blank of Book name, description or place";
                return $alert;
            }
            if(empty($book_name) &&empty($book_description) && empty($book_price)&& empty($author)&& empty($release_date)&& empty($genre)&& empty($language)&& empty($instock)&& empty($file_name)){
                $alert ="Please fill the blank of Book name, description or place";
                return $alert;
            }
            else{
                move_uploaded_file($_FILES["book_image"]["tmp_name"], $target_file);
                $query = "insert into book (name, description, price, img, idreligion, author,release_date,genre, language, instock) values 
                ('$book_name','$book_description','$book_price','$file_name','$idreligion','$author','$release_date','$genre', '$language','$instock')";
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
        public function bookList(){
            $query = " select book.*,religion.name as religioname from book
            inner join religion on book.idreligion = religion.id
            ";
            $result = $this->db->select($query);
            return $result;
        }
        public function getBookById($id){
            $id = $this->fm->validation($id);
            $query = "select * from book where id = '".$id."' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function updateBookById( $data, $file,$id){
            $id = $this->fm->validation($id);
            $book_name = mysqli_real_escape_string($this->db->link,$data['book_name']);
            $book_description = mysqli_real_escape_string($this->db->link,$data['book_description']);
            $book_price = mysqli_real_escape_string($this->db->link,$data['book_price']);
            $idreligion = mysqli_real_escape_string($this->db->link,$data['idreligion']);
            // $idfestival = mysqli_real_escape_string($this->db->link,$data['idfestival']);
            $author = mysqli_real_escape_string($this->db->link,$data['author']);
            $release_date = mysqli_real_escape_string($this->db->link,$data['release_date']);
            $genre = mysqli_real_escape_string($this->db->link,$data['genre']);
            $language = mysqli_real_escape_string($this->db->link,$data['language']);
            $instock = mysqli_real_escape_string($this->db->link,$data['instock']);


            $target_dir = "../uploads/";
            $target_file = $target_dir.basename($_FILES["book_image"]["name"]);
            $file_name = $_FILES['book_image']['name'];
       
            if(empty($book_name) ||empty($book_description) || empty($book_price)|| empty($author)|| empty($release_date)|| empty($genre)|| empty($language)|| empty($instock)|| empty($file_name)){
                $alert ="Please fill the blank of Book name, description or place";
                return $alert;
            }
            if(empty($book_name) &&empty($book_description) && empty($book_price)&& empty($author)&& empty($release_date)&& empty($genre)&& empty($language)&& empty($instock)&& empty($file_name)){
                $alert ="Please fill the blank of Book name, description or place";
                return $alert;
            }
            else{
                move_uploaded_file($_FILES["book_image"]["tmp_name"], $target_file);
                $query = "update book set name = '$book_name', description = '$book_description', price ='$book_price',img ='$file_name', idreligion ='$idreligion', author ='$author',release_date='$release_date',genre ='$genre',language='$language',instock='$instock' where id = '$id' ";
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

        public function deleteBook($id){
            $id = $this->fm->validation($id);
            $query = "delete from book where id = '$id' ";
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
        //Front end
        public function getBookByIdReligion($id){
            $id = $this->fm->validation($id);
            $query = "select book.*,religion.name as religioname from book,religion where idreligion = '".$id."' and book.idreligion = religion.id";
            $result = $this->db->select($query);
            return $result;
        }
        public function getABookById($id){
            $id = $this->fm->validation($id);
            $query = "select book.*,religion.name as religioname from book,religion where book.id = '".$id."' and book.idreligion = religion.id";
            $result = $this->db->select($query);
            return $result;
        }
        public function getSameCategoryBook($id){
            $query = "select book.*,religion.name as religioname from book,religion where book.id <> '".$id."' and book.idreligion = religion.id limit 5";
            $result = $this->db->select($query);
            return $result;
        }
 
    }
    
?>