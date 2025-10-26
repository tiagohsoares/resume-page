<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Storage;
use App\DataObjects\Resume;
use Spatie\LaravelPdf\Facades\Pdf;
use Spatie\LaravelPdf\Enums\Unit;
use Illuminate\Support\Facades\Cache;

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
            ->margins(2.5, 2, 2.5, 2, Unit::Pixel)
            ->format('A4')
             ->withBrowsershot(function ($browsershot) {
        $browsershot->noSandbox();
    });

        return $pdf->download();
    }
}
