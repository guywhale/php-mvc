<?php

class Posts extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->postModel = $this->model('Post');
    }

    public function index()
    {
        $posts = $this->postModel->getPosts();
        // Format time
        $this->formatTime($posts);

        $data = [
            'posts' => $posts
        ];

        $this->view('posts/index', $data);
    }

    // Format time to 01 November 2022
    public function formatTime($posts)
    {
        foreach ($posts as $post) {
            $dateObj = new DateTime($post->postCreated);
            $post->postCreated = $dateObj->format('d F Y');
        }

        return $posts;
    }

    public function add()
    {
        $data = [
            'title' => '',
            'body' => '',
            'titleErr' => '',
            'bodyErr' => '',
        ];

        $this->view('posts/add', $data);
    }
}
