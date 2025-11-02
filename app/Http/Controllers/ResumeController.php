<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Storage;
use App\DataObjects\Resume;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Cache;

class ResumeController extends Controller
{
    // Helper para carregar o resume com cache
    private function getResume(): Resume
    {
        return Cache::remember('resumeData', 86400, function () {
            $resumes = Storage::disk('resumes')->get('resume.json');
            $resumeData = json_decode($resumes, true);
            return Resume::fromArray($resumeData);
        });
    }

    // Página HTML do resume
    public function index(Factory $view)
    {
        $resume = $this->getResume();

        return $view->make('resume', [
            'resume' => $resume,
            'allowDownload' => true,
        ]);
    }

    // Download PDF usando DomPDF
    public function download()
    {
        $resume = $this->getResume();

        $pdf = Pdf::loadView('resume', [
            'resume' => $resume,
            'allowDownload' => false,
        ])->setPaper('A4', 'portrait');

        return $pdf->download($resume->basics->name . '-resume.pdf');
    }
}
