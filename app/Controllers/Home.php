<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class Home extends BaseController
{
    public function index($page = 'login')
    {
        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page);

        return view('templates/header', $data)
            .view('pages/'.$page)
            .view('templates/footer');
    }
}
