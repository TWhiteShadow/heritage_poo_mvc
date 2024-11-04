<?php
namespace Controllers;

use Book;
use Models\Database;

require_once __DIR__ . '/../models/Book.php';

require_once __DIR__ . '/../models/Database.php';

class BookController
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function index()
    {
        $query = $this->db->query(
            "SELECT * FROM book"
        );
        $books = $query->fetchAll();
      
        foreach($books as $key => $book){
          $books[$key] = new Book($book);
        }
    
        return $books;
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $available = $_POST['available'];
            $pageNumber = $_POST['pageNumber'];

            $query = $this->db->prepare(
                "INSERT INTO book (title, author, available, pageNumber) VALUES (:title, :author, :available, :pageNumber)"
            );
            $query->execute([
                'title' => $title,
                'author' => $author,
                'available' => $available,
                'pageNumber' => $pageNumber
            ]);

            header('Location: index.php?controller=book');
        }
    }
    public function view($id)
    {
        $query = $this->db->prepare(
            "SELECT * FROM book WHERE id = :id"
        );
        $query->execute([
            'id' => $id
        ]);
        $book = $query->fetch();

        if ($book) {
            $book = new Book($book);
        }

        return $book;
    }
}