<?php

namespace App\Http\Controllers\Pdf;
use App\Http\Controllers\Controller;
use App\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PdfController extends Controller
{
    public function index(){
    	$data=Visitor::showVisits();
    	$pdf = App::make('dompdf.wrapper');

    	$pdf->loadView('pdf.showVisits',compact('data'));

    	return $pdf->stream();
    }
    public function download(){
    	$data=Visitor::showVisits();
    	$pdf = App::make('dompdf.wrapper');
    	$pdf->loadView('pdf.showVisits',compact('data'));
    	return $pdf->download();
    }
}
