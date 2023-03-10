<?php
/**
 * @access public
 * @author koenma
 */
include 'config/db_config.php';


 if($_SERVER['HTTP_HOST'] == 'localhost:8888'){
	// Define local test values if IOS
		define('DB_SERVER', 'localhost');
		define('DB_USERNAME', 'root');
		define('DB_PASSWORD', 'root');
		define('DB_DATABASE', 'corrosie');
	}else if($_SERVER['HTTP_HOST'] == 'localhost'){
	// Define local test values
		define('DB_SERVER', 'localhost');
		define('DB_USERNAME', 'root');
		define('DB_PASSWORD', '');
		define('DB_DATABASE', 'corrosie');
	}else{
	// Define live values
		define('DB_SERVER', '');
		define('DB_USERNAME', '');
		define('DB_PASSWORD', '');
		define('DB_DATABASE', '');
	}
class Database {
	private $connection;
	/**
	 * @access public
	 */
	public function __construct() {
		$this->initializeConnection();
	}

	/**
	 * @access private
	 */
	private function initializeConnection() {
		$this->connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if ($this->connection->connect_error) die('Database error -> ' . $this->connection->connect_error);

	}

	/**
	 * @access public
	 */
	public function dbName() {
		return DB_DATABASE;
	}

	/**
	 * @access public
	 */
	public function retObj() {
		return $this->connection;
	}
}


class Template {
	protected $db;

	/**
	 * @access private
	 */
	private function DbConnect() {
		$this->db = new Database();
        $this->db = $this->db->retObj();
        return $this->db;
	}

    public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getChapter() {
		return $this->chapter;
	}

	public function setChapter($chapter) {
		$this->chapter = $chapter;
	}

    public function getSubChapter() {
		return $this->subchapter;
	}

	public function setSubChapter($subchapter) {
		$this->subchapter = $subchapter;
	}

    public function getPageContent() {
		return $this->pagecontent;
	}

	public function setPageContent($pagecontent) {
		$this->pagecontent = $pagecontent;
	}

    public function getOrderNr() {
		return $this->ordernr;
	}

	public function setOrderNr($ordernr) {
		$this->ordernr = $ordernr;
	}

    public function getChapterTable(){
        return 'chapters';
    }

    public function getSubChapterTable(){
        return 'subchapter';
    }

    public function getChapterContentTable(){
        return 'chaptercontent';
    }

	public function getChapterList() {
		$return_array = array();

        $query = "SELECT * FROM `".$this->getChapterTable()."` ORDER BY id";
        $result = $this->DbConnect()->query($query);
		$this->DbConnect()->close();
        // For all database results:
        foreach ($result as $idx => $array){
            // Nieuw object
            $template = new Template();
            // Set info
			$template->setid($array['id']);
            $template->setChapter($array['chapter']);
            $template->setOrderNr($array['sortorder']);

            // Add new object to return array.
            $return_array[] = $template;
        }
        return $return_array;
	}

	public function getSubChapterList() {
		$return_array = array();

        $query = "SELECT * FROM `".$this->getSubChapterTable()."` ORDER BY id";
        $result = $this->DbConnect()->query($query);
		$this->DbConnect()->close();
        // For all database results:
        foreach ($result as $idx => $array){
            // Nieuw object
            $template = new Template();
            // Set info
			$template->setid($array['id']);
            $template->setSubChapter($array['chapter']);
            $template->setOrderNr($array['sortorder']);

            // Add new object to return array.
            $return_array[] = $template;
        }
        return $return_array;
	}

    public function getChapterContentList($id) {
		$return_array = array();

        $query = "SELECT * FROM `".$this->getChapterContentTable()."` WHERE `id` = $id ORDER BY id ";
        $result = $this->DbConnect()->query($query);
		$this->DbConnect()->close();
        // For all database results:
        foreach ($result as $idx => $array){
            // Nieuw object
            $template = new Template();
            // Set info
			$template->setid($array['id']);
            $template->setChapter($array['chapter']);
            $template->setSubChapter($array['subchapter']);
            $template->setPageContent($array['page_content']);

            // Add new object to return array.
            $return_array[] = $template;
        }
        return $return_array;
	}


    public function getChapterContentListByChapter() {
		$return_array = array();

        $query = "SELECT * FROM `".$this->getChapterContentTable()."` ORDER BY id ";
        $result = $this->DbConnect()->query($query);
		$this->DbConnect()->close();
        // For all database results:
        foreach ($result as $idx => $array){
            // Nieuw object
            $template = new Template();
            // Set info
			$template->setid($array['id']);
            $template->setChapter($array['chapter']);
            $template->setSubChapter($array['subchapter']);
            $template->setPageContent($array['page_content']);

            // Add new object to return array.
            $return_array[] = $template;
        }
        return $return_array;
	}


    public function getChapterContentListByChapterMinID() {
        $query = "SELECT MIN(`id`) FROM `".$this->getChapterContentTable()."`;";
        $result = $this->DbConnect()->query($query);
		$this->DbConnect()->close();
        $followingdata = $result->fetch_assoc();
        return $followingdata;
	}


    
    public function getChapterContentListByChapterCounter() {
            $query = "SELECT COUNT(*) AS nr FROM `". $this->getChapterContentTable()."`";
            $result = $this->DbConnect()->query($query);
            $this->DbConnect()->close();
            $followingdata = $result->fetch_assoc();
    
            return $followingdata['nr'];
        }

	// public function getSession(){
	// 	$sql = "SELECT `token` FROM ".$this->getUserTable()." WHERE id = ".$_SESSION['uid'].";";
	// 	$result = $this->DbConnect()->query($sql) or die($this->DbConnect()->error);
    //     $this->DbConnect()->close();
	// 	$user_data = $result->fetch_All(MYSQLI_ASSOC);
	// 	$token = $user_data[0]['token'];
    //     return $_SESSION['token'] = $token;
    // }

	// public function userLogout() {
	// 	$session = $this->getSession();
	// 	$session = FALSE;
    //     unset($_SESSION);
    //     session_destroy();
    // }
}
?>