<?php

class Posts extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        $posts = $this->postModel->getPosts();
        // Format time
        $this->formatTimes($posts);

        $data = [
            'posts' => $posts
        ];

        $this->view('posts/index', $data);
    }

    // Format time to 01 November 2022
    public function formatTimes($posts)
    {
        foreach ($posts as $post) {
            $dateObj = new DateTime($post->postCreated);
            $post->postCreated = $dateObj->format('d F Y');
        }

        return $posts;
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Process form
            $title = $body = '';

            // Sanitize POST array
            $title = trim(htmlspecialchars($_POST['title']));
            $body = trim(htmlspecialchars($_POST['body']));

            // Init data
            $data = [
                'title' => $title,
                'body' => $body,
                'userId' => $_SESSION['userId'],
                'titleErr' => '',
                'bodyErr' => '',
            ];

            // Vaidate Title
            if (empty($data['title'])) {
                $data['titleErr'] = 'Please enter a title.';
            }

            // Vaidate Body
            if (empty($data['body'])) {
                $data['bodyErr'] = 'Please enter some body text.';
            }

            // Make sure there's no errors
            if (empty($data['titleErr']) && empty($data['bodyErr'])) {
                // Validated
                if ($this->postModel->addPost($data)) {
                    flash('postMessage', 'Post added.');
                    redirect('posts');
                } else {
                    die('Something went wrong.');
                }
            } else {
                // Load view with errors
                $this->view('posts/add', $data);
            }
        } else {
            $data = [
                'title' => '',
                'body' => '',
                'titleErr' => '',
                'bodyErr' => '',
            ];

            $this->view('posts/add', $data);
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Process form
            $title = $body = '';

            // Sanitize POST array
            $title = trim(htmlspecialchars($_POST['title']));
            $body = trim(htmlspecialchars($_POST['body']));

            // Init data
            $data = [
                'id' => $id,
                'title' => $title,
                'body' => $body,
                'userId' => $_SESSION['userId'],
                'titleErr' => '',
                'bodyErr' => '',
            ];

            // Vaidate Title
            if (empty($data['title'])) {
                $data['titleErr'] = 'Please enter a title.';
            }

            // Vaidate Body
            if (empty($data['body'])) {
                $data['bodyErr'] = 'Please enter some body text.';
            }

            // Make sure there's no errors
            if (empty($data['titleErr']) && empty($data['bodyErr'])) {
                // Validated
                if ($this->postModel->updatePost($data)) {
                    flash('postMessage', 'Post updated.');
                    redirect('posts');
                } else {
                    die('Something went wrong.');
                }
            } else {
                // Load view with errors
                $this->view('posts/edit', $data);
            }
        } else {
            // Get current post from model
            $post = $this->postModel->getPostById($id);

            // Check for owner to ensure non-logged in users can't access URL
            if ($post->userId !== $_SESSION['userId']) {
                // redirect back to posts page if not logged in.
                redirect('posts');
            }

            $data = [
                'id' => $id,
                'title' => $post->title,
                'body' => $post->body,
                'titleErr' => '',
                'bodyErr' => '',
            ];

            $this->view('posts/edit', $data);
        }
    }

    // Show individual posts
    public function show($id)
    {
        $post = $this->postModel->getPostById($id);
        // Format time
        $this->formatTimes([$post]);

        $user = $this->userModel->getUserById($post->user_id);
        $data = [
            'post' => $post,
            'user' => $user
        ];

        $this->view('posts/show', $data);
    }
}
