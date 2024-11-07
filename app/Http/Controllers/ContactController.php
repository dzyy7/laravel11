<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class ContactController extends Controller
{
    public function indexx()
    {
        return view('contact', [
            'title' => 'contact',
            'nama' => 'Muhammad Dzaky Aulia Al Ghazam',
            'Kelas' => '11 PPLG 2',
            'Linkedin' => 'https://www.linkedin.com/in/muhammad-dzaky-aulia-al-ghazam-7472352a1',
            'Github' => 'https://github.com/dzyy7'
        ]);    }
}
