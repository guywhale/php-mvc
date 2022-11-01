<?php

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPosts()
    {
        $sql = 'SELECT *,
                posts.id as postId,
                users.id as userId,
                posts.created_at as postCreated,
                users.created_at as userCreated
                FROM posts
                INNER JOIN users
                ON posts.user_id = users.id
                ORDER BY posts.created_at DESC
                ';

        $this->db->query($sql);

        $results = $this->db->resultSet();

        return $results;
    }

    public function addPost($data)
    {
        $this->db->query('INSERT INTO posts (title, user_id, body) VALUES(:title, :userId, :body)');
        //Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':userId', $data['userId']);
        $this->db->bind(':body', $data['body']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
