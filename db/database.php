<?php 
class DatabaseHelper{
    private $db;
    
    //creazione per la connessione al database
    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
    }
    

    //Ricerca delle categorie dei post
    public function getPost_Type(){
        $stmt = $this->db->prepare("SELECT * FROM post_type");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //ricerca della categoria di un post
    public function getPost_TypeyById($idcategory){
        $stmt = $this->db->prepare("SELECT post_type_name FROM post_type WHERE post_type_id=?");
        $stmt->bind_param('i',$idcategory);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getIdPostByPostName($post_type_name){
        $stmt = $this->db->prepare("SELECT post_type_id  FROM post_type WHERE post_type_name =?");
        $stmt->bind_param('i',$post_type_name);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostByType($post_type_id){
        $query ="SELECT *  FROM post WHERE post_type=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$post_type_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function deletePost($idPost){
        $query = "DELETE FROM `post` WHERE `post_id`=?;"; 
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idPost);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    public function deleteCommentsPost($idPost){
        $query = "DELETE FROM `comment` WHERE `post_id`=?;"; 
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idPost);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }
    //funzione che controlla il login degli utenti
    public function checkLogin($Username, $Password){
        $query = "SELECT * FROM persone WHERE Username = ? AND Password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$Username, $Password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    } 

       //funzione che inserisce i dati dell'utente alla registrazione
       public function registration($username,$foto, $nome, $cognome, $sesso, $email, $password, $dataNascita, $città){
        $query = "INSERT INTO persone(username,foto, nome, cognome, sesso, email, password, dataNascita, città) values(?,?,?,?,?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssssssds',$username,$foto, $nome, $cognome, $sesso, $email, $password, $dataNascita, $città);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    } 

    public function checkRegistration($username){
        $query = "SELECT * FROM persone WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    } 

    //funzione per seguire le persone
    public function follow($following,$followed){
        $query = "INSERT INTO `follower` (`following_user_id`,`followed_user_id`) VALUES (?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$following,$followed);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    //funzione per smettere di seguire le persone
    public function unfollow($following,$followed){
        $query = "DELETE FROM `follower` WHERE `following_user_id` = ? AND `followed_user_id` = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$following,$followed);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    //funzione per cercare un utente
    public function researchUser($searchUsername){
        $query = "SELECT * FROM persone WHERE Username= ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$searchUsername);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function userInDb($user) {
        $query = "SELECT Username FROM persone WHERE Username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$user);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getUserParams($user){
        $query = "SELECT * FROM persone WHERE Username= ? ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$user);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getFollowing($user){
        $query = "SELECT `following_user_id` FROM `follower` WHERE `followed_user_id`=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $user);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getFollowed($user){
        $query = "SELECT `followed_user_id` FROM `follower` WHERE `following_user_id`=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $user);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    
    }
    
    public function isFollowing($user_following, $user_followed){
        $query = "SELECT * FROM `follower` WHERE `following_user_id`=? AND `followed_user_id`=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$user_following, $user_followed);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getFotoPost($user){
        $query = "SELECT *  FROM `post` WHERE `created_by_user_id`=?"; 
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $user);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostUser($user,$idPost){
        $query = "SELECT *  FROM `post` WHERE `created_by_user_id`=? AND `post_id`=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $user,$idPost);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getPostCategories($idPost){
        $query = "SELECT *  FROM `post` WHERE `post_type`=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idPost);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getLikesPost($idPost){
        $query = "SELECT *  FROM `like` WHERE `post_id`=?"; 
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $idPost);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCommentsPost($idPost){
        $query = "SELECT *  FROM `comment` WHERE `post_id`=?"; 
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $idPost);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertComment($id,$comment,$user,$post){
        $query = "INSERT INTO `comment` (`comment_id`,`comment_text`,`user_profile_id`,`post_id`)  VALUES (?,?,?,?)"; 
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssss', $id,$comment,$user,$post);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    public function getLastIdComm(){
        $query = "SELECT MAX(`comment_id`) as `comment_id` FROM `comment` ORDER BY `comment_id`;"; 
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertLike($post,$user){
        $query = "INSERT INTO `like` (`post_id`,`user_profile_id`)  VALUES (?,?)"; 
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('is',$post,$user);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    public function insertPosts($post,$user, $author, $img, $text, $category){
        $query = "INSERT INTO `like` (`post_id`,`user_profile_id`, ')  VALUES (?,?)"; 
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('is',$post,$user);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    public function getRandomPosts($n){
        $stmt = $this->db->prepare("SELECT idarticolo, titoloarticolo, imgarticolo FROM articolo ORDER BY RAND() LIMIT ?");
        $stmt->bind_param('i',$n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function createPost($post_id, $createByUserId, $mediaFile, $created_time, $caption, $post_type) {
        $query = "INSERT INTO post (post_id, created_by_user_id, media_file, created_time, caption, post_type) VALUES(?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssss',$post_id, $createByUserId, $mediaFile, $created_time, $caption, $post_type);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    public function getLastIdPost(){
        $query = "SELECT MAX(`post_id`) as `post_id` FROM `post` ORDER BY `post_id`;"; 
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getLastIdPostOfUser($user){
        $query1 = "SELECT `post_id` FROM `post` WHERE created_by_user_id = ? ORDER BY created_time DESC LIMIT 1;";
        $stmt = $this->db->prepare($query1);
        $stmt->bind_param('s',$user);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    } 

    public function getAlert($Username){
        $query = "SELECT * FROM notifiche WHERE User = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$Username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateFoto($foto,$username) {
        $query = "UPDATE persone SET Foto= ? WHERE Username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$foto,$username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    public function updatePass($pass,$username) {
        $query = "UPDATE persone SET Password= ? WHERE Username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$pass,$username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    public function updateLuogo($luogo,$username) {
        $query = "UPDATE persone SET Città= ? WHERE Username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$luogo,$username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    
}
?>
