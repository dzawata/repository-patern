<?php

namespace Repository {

    use Model\Comment;

    interface CommentRepository
    {
        function insert(Comment $comment);
        function findById(int $id);
        function findAll();
        function update(Comment $comment);
    }

    class CommentRepositoryImpl implements CommentRepository
    {
        private $connection;
        
        public function __construct($connection)
        {
             $this->connection = $connection;
        } 
        
        public function insert(Comment $comment)
        {
            $sql = "INSERT INTO comments(email, comment) VALUES (? , ?)";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$comment->getEmail(), $comment->getComment()]);
            
            $id = $this->connection->lastInsertId();
            $comment->setId($id);
            return $comment;
        }

        public function findById(int $id)
        {
            $sql = "SELECT * FROM comments WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$id]);
            
            if($row = $statement->fetch())
            {
                $comment = new Comment(
                    $row['id'],
                    $row['email'],
                    $row['comment']
                );

                return $comment;
            }
            else
            {
                return null;
            }
        }

        public function findAll()
        {
            $sql = "SELECT * FROM comments";
            $statement = $this->connection->query($sql);

            $array = array();

            while($row = $statement->fetch()){
                $array[] = new Comment(
                    $row['id'],
                    $row['email'],
                    $row['comment']
                );
            }

            return $array;
        }

        public function update(Comment $comment)
        {
            $sql = "SELECT id FROM comments WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$comment->getId()]);
            
            if($row = $statement->fetch())
            {
                $sql2 = "UPDATE comments SET email=? , comment=? WHERE id=?";
                $statement = $this->connection->prepare($sql2);
                $statement->execute([$comment->getEmail(), $comment->getComment(), $comment->getId()]);
                echo $statement->rowCount();
            }
            else
            {
                return null;
            }
        }
    }
}