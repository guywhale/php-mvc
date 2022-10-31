<?php

/**
 * Pages controller
 */
class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'title' => 'Hwale Shareposts',
            'description' => 'Simple social network built on the Hwale PHP framework.'
        ];

        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About',
            'description' => 'App to share posts with other users.'
        ];

        $this->view('pages/index', $data);
    }
}
