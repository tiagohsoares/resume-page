<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use App\DataObjects\Resume;

class ResumeController extends Controller
{
    public function index(Factory $view){

        $resumes = storage::disk('resumes')->get('resume.json');
        $resumeData = json_decode($resumes, true);  
        return $view->make('resume' , ['resume' => Resume::fromArray($resumeData)]);
    }
}
