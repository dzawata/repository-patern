<?php

require_once __DIR__."/GetConnection.php";
require_once __DIR__."/Repository/CommentRepository.php";
require_once __DIR__."/Model/Comment.php";

use Model\Comment;
use Repository\CommentRepositoryImpl;

$connection = getConnection();
$repository = new CommentRepositoryImpl($connection);
$comment = new Comment($id=3, $email="interisty91@gmail.com", $comment="Hi");

// $newComment = $repository->insert($comment);
// var_dump($newComment->getId());

$findCommentById = $repository->findById(3);
var_dump($findCommentById);

// $findComment = $repository->findAll();
// var_dump($findComment);

// $updateComment = $repository->update($comment);
// var_dump($updateComment);

$connection = null;