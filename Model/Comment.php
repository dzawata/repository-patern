<?php

namespace Model {
    
    class Comment
    {
        private $id;
        private $email;
        private $comment;
        
        public function __construct($id = null, $email = null, $comment = null)
        {
            $this->id = $id;
            $this->email = $email;
            $this->comment = $comment;
        }
        
        public function setId(?int $id):void
        {
            $this->id = $id;
        }

        public function getId(): ?int
        {
            return $this->id;
        }

        public function setEmail(?string $email): void
        {
            $this->email = $email;
        }

        public function getEmail(): ?string
        {
            return $this->email;
        }

        public function setComment(?string $comment):void
        {
            $this->comment = $comment;
        }

        public function getComment(): ?string
        {
            return $this->comment;
        }
    }

}