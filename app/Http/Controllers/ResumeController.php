<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use App\DataObjects\Resume;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Cache;

class ResumeController extends Controller
{
    public function index(Factory $view){
        $resume = Cache::remember('resumeData', now()->addDay(), function () {
            $resumes = storage::disk('resumes')->get('resume.json');
            $resumeData = json_decode($resumes, true);

            return Resume::fromArray($resumeData);
        });

        return $view->make('resume' , ['resume' => $resume]);
    }
    public function download ()
    {
        $resume = Cache::remember('resumeData', now()->addDay(), function () {
            $resumes = storage::disk('resumes')->get('resume.json');
            $resumeData = json_decode($resumes, true);

            return Resume::fromArray($resumeData);
        });

        $pdf = Pdf::loadView('resume', ['resume' => $resume]);
        return $pdf->download($resume->basics->name . '-resume.pdf');
    }
}