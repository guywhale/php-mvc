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
        ];

        $this->view('pages/index', $data);
    }
}
