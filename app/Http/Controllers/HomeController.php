<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomeValidatorRequest;
use Illuminate\Support\Facades\Log;

// Todo: I should have put this in Interfaces folder instead of here
interface DocumentInterface {
    public function download();
}

// Todo: I should have put this in Services folder instead of here
class DocumentService implements DocumentInterface {
    private string $output;

    public function __construct(HomeValidatorRequest $request) {
        $this->output = $request->input('output', 'pdf');
    }

    public function download() {
        if ($this->output === 'excel') {
            Log::info("DOWNLOAD WITH EXCEL");
            return "EXCEL FILE TO BE DOWNLOADED";
        }
        else if ($this->output === 'pdf') {
            Log::info("DOWNLOAD WITH PDF TO BE DOWNLOADED");
            return "PDF";
        }
    }
}

class HomeController extends Controller {
    public function index(DocumentService $documentService) {
        return $documentService->download();
    }
}
