<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function index(Factory $view){

        dd(storage::get('resume.json'));
        return $view->make('resume');
    }
}
