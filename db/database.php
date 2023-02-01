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
    public function checkLogin($username, $password){
        $query = "SELECT Username, Password FROM persone WHERE Username = ? AND Password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    } 

      //funzione che inserisce i dati dell'utente alla registrazione
    public function registration($username,$nome, $cognome, $sesso, $email, $password, $dataNascita, $città){
        $query = "INSERT INTO persone(username,nome, cognome, sesso, email, password, dataNascita, città) values(?,?,?,?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$username,$nome, $cognome, $sesso, $email, $password, $dataNascita, $città);
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
}  
?>