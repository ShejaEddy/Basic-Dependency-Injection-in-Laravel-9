<?php

namespace Tests\Unit;

use App\Http\Controllers\DocumentService;
use App\Http\Controllers\HomeController;
use App\Http\Requests\HomeValidatorRequest;
use PHPUnit\Framework\TestCase;

class HomeControllerTest extends TestCase
{
    public function test_index_method_with_pdf_output()
    {
        $request = $this->createMock(HomeValidatorRequest::class);
        $request->method('input')->willReturn('pdf');

        $documentService = $this->getMockBuilder(DocumentService::class)
            ->setConstructorArgs([$request])
            ->getMock();

        $documentService->expects($this->once())
            ->method('download')
            ->willReturn('PDF');

        $homeController = new HomeController();
        $response = $homeController->index($documentService);

        $this->assertEquals('PDF', $response);
    }

    public function test_index_method_with_excel_output()
    {
        $request = $this->createMock(HomeValidatorRequest::class);
        $request->method('input')->willReturn('excel');

        $documentService = $this->getMockBuilder(DocumentService::class)
            ->setConstructorArgs([$request])
            ->getMock();

        $documentService->expects($this->once())
            ->method('download')
            ->willReturn('EXCEL FILE TO BE DOWNLOADED');

        $homeController = new HomeController();
        $response = $homeController->index($documentService);

        $this->assertEquals('EXCEL FILE TO BE DOWNLOADED', $response);
    }
}
