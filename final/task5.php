<?php

class Book {
    
    private $title;
    private $author;
    private $year;

   
    public function __construct($title, $author, $year) {
        $this->title  = $title;
        $this->author = $author;
        $this->year   = $year;
    }

  
    public function setTitle($title) {
        $this->title = $title;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setYear($year) {
        $this->year = $year;
    }


    public function getDetails() {
        return "Title: " . $this->title .
               ", Author: " . $this->author .
               ", Publication Year: " . $this->year;
    }
}


$book1 = new Book(title: "abcd", author: "nir", year: 18);


$book1->setTitle(title: "hjvu");
$book1->setAuthor(author: "iuhin");
$book1->setYear(year: 28);

echo $book1->getDetails();
?>
