<?php

namespace App\Http\Controllers;

use App\Imports\Sales;
use App\Models\ExcelImport;
use App\Models\PdfImport;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function import(Request $request)
    {
        try{
            $request->validate([
                'file' => [
                    'required',
                    'mimes:xlsx',
                    'file'
                ],
            ]);

            // Import data Excel
            Excel::import(new Sales(), $request->file('file'));

            return redirect()->back()->with('success', 'File Excel berhasil diunggah dan diimpor.');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function pdf(Request $request)
    {
        try{
            $request->validate([
                'pdf' => 'required|mimes:pdf|max:2048', // Adjust max size as needed
                'desc' => 'required'
            ]);

            $file = $request->file('pdf');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('pdfs', $fileName, 'public');
            // Save $fileName to your database if needed
            $toDB = new PdfImport([
                'desc' => $request->desc,
                'file' => $fileName,
            ]);
            $toDB->save();

            return redirect()->back()->with('success', 'PDF uploaded successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function displayData()
    {
        $data = ExcelImport::all();
        $pdf = PdfImport::all();

        return view('dashboard', ['data' => $data, 'pdf' => $pdf]);
    }

    public function viewPdf($id)
    {
        $pdfFile = PdfImport::findOrFail($id);

        $pdfPath = storage_path('app/public/pdfs/' . $pdfFile->file);

        if (file_exists($pdfPath)) {
            // Directly render the PDF without using a Blade view
            return response()->file($pdfPath, ['Content-Type' => 'application/pdf']);
        }

        return response()->view('errors.404', [], 404);
    }
}
