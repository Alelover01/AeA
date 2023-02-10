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
    

    //Ricerca delle categorie dei post - NON SO SE CI SERVE???
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

    //funzioni relative ai post da gestire ??

   
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
    public function registration($username,$nome, $cognome, $sesso, $email, $password, $dataNascita, $città){
        $query = "INSERT INTO persone(username,nome, cognome, sesso, email, password, dataNascita, città) values(?,?,?,?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssssds',$username,$nome, $cognome, $sesso, $email, $password, $dataNascita, $città);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    } 

    public function checkRegistration($username, $email){
        $query = "SELECT * FROM persone WHERE username = ? OR email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$username, $email);
        //prova da mettere che vada
        $result = mysqli_num_rows($query);
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
        $query = "SELECT * FROM persone WHERE Username= ? ";
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
        $query = "SELECT `media_file` FROM `post` WHERE `created_by_user_id`=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $user);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNewFotoPost($user){
        $query = "SELECT DISTINCT `media_file` FROM `post` WHERE `created_by_user_id`=? GROUP BY `created_time` DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $user);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}  
?>