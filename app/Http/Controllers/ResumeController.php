<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use App\DataObjects\Resume;
use Spatie\LaravelPdf\Facades\Pdf;
use Illuminate\Support\Facades\Cache;
use Spatie\Browsershot\Browsershot;

class ResumeController extends Controller
{
    public function index(Factory $view){
        $resume = Cache::remember('resumeData', now()->addDay(), function () {
            $resumes = storage::disk('resumes')->get('resume.json');
            $resumeData = json_decode($resumes, true);

            return Resume::fromArray($resumeData);
        });

        return $view->make('resume' , ['resume' => $resume, 'allowDownload' => true]);
    }
    public function download ()
    {

        $resume = Cache::remember('resumeData', now()->addDay(), function () {
            $resumes = storage::disk('resumes')->get('resume.json');
            $resumeData = json_decode($resumes, true);

            return Resume::fromArray($resumeData);
        });

        $pdf = Pdf::view('resume', ['resume' => $resume, 'allowDownload' => false])
            ->name($resume->basics->name . '-resume.pdf')
            ->format('A4');

        return $pdf->download();
    }
}