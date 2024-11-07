<?php
namespace App\Controllers;

use App\Models\Database;
use App\Models\Book;


class BookController
{
    private $db;

    public function __construct()
    {
        echo 'Hello from BookController constructor';
        $this->db = Database::connect();
        $this->index();
    }
    public function index()
    {
        echo 'Hello from BookController index';
        $query = $this->db->query(
            "SELECT * FROM books"
        );
        $books = $query->fetchAll();
      
        foreach($books as $key => $book){
          $books[$key] = new Book($book);
        }
        var_dump($books);
    
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