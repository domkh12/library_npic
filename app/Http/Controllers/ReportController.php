<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Student;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Attendent;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function generate(Request $request)
    {
        $validated = $request->validate([
            'report_type' => 'required|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date'
        ]);

        $reportType = $validated['report_type'];
        $startDate = $validated['start_date'];
        $endDate = $validated['end_date'];

        $data = $this->fetchReportData($reportType, $startDate, $endDate);

        return view('reports.preview', compact('data', 'reportType', 'startDate', 'endDate'));
    }

    public function export($type, Request $request)
    {
        $reportType = $request->query('report_type');
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        $data = $this->fetchReportData($reportType, $startDate, $endDate);

        if ($type === 'excel') {
            return $this->exportToCSV($data, $reportType);
        } elseif ($type === 'pdf') {
            $pdf = Pdf::loadView('reports.pdf', compact('data', 'reportType', 'startDate', 'endDate'));
            return $pdf->download('report.pdf');
        }
    }

    private function fetchReportData($reportType, $startDate, $endDate)
    {
        switch ($reportType) {
            case 'students':
                return Student::all();
            case 'books':
                return Book::all();
            case 'attendances':
                // Assuming you have an Attendance model
                return Attendent::whereBetween('date', [$startDate, $endDate])->get();
            case 'borrowings':
                return Borrow::with(['student', 'book'])->whereBetween('borrow_date', [$startDate, $endDate])->get();
            default:
                return [];
        }
    }

    private function exportToCSV($data, $reportType)
    {
        $filename = $reportType . ".csv";
        $handle = fopen($filename, 'w+');

        // Add BOM to fix UTF-8 in Excel
        fprintf($handle, chr(0xEF) . chr(0xBB) . chr(0xBF));

        if ($reportType === 'students') {
            fputcsv($handle, ['ID សិស្ស', 'ឈ្មោះ', 'លេខទូរស័ព្ទ', 'ជំនាញ', 'ឆ្នាំ', 'ចំនួនខ្ចីសៀវភៅ']);
            foreach ($data as $student) {
                fputcsv($handle, [
                    $student->stu_id,
                    $student->name,
                    $student->phone,
                    $student->faculty->fac_name,
                    optional($student->year)->year_name ?? 'N/A',
                    $student->borrow_qty
                ]);
            }
        } elseif ($reportType === 'borrowings') {
            fputcsv($handle, [
                'ID សិស្ស', 
                'ឈ្មោះសិស្ស', 
                'ID សៀវភៅ', 
                'ឈ្មោះសៀវភៅ', 
                'កាលបរិច្ឆេទខ្ចី', 
                'កាលបរិច្ឆេទត្រូវត្រឡប់', 
                'កាលបរិច្ឆេទសង', 
                'ស្ថានភាព', 
                'ពិន័យ'
            ]);

            foreach ($data as $item) {
                fputcsv($handle, [
                    $item->student->stu_id,
                    $item->student->name,
                    $item->book->id,
                    $item->book->book_name,
                    \Carbon\Carbon::parse($item->borrow_date)->format('d/m/Y'),
                    \Carbon\Carbon::parse($item->deadline_date)->format('d/m/Y'),
                    \Carbon\Carbon::parse($item->return_date)->format('d/m/Y'),
                    $item->status,
                    number_format($item->price_penalty) . '៛'
                ]);
            }
        } elseif ($reportType === 'attendances') {
            fputcsv($handle, ['ID សិស្ស', 'ឈ្មោះ', 'កាលបរិច្ឆេទ', 'ស្ថានភាព']);
            foreach ($data as $attendance) {
                fputcsv($handle, [
                    $attendance->student->stu_id,
                    $attendance->student->name,
                    $attendance->date,
                    $attendance->status
                ]);
            }
        } elseif ($reportType === 'books') {
            fputcsv($handle, ['ID', 'ឈ្មោះសៀវភៅ', 'អ្នកនិពន្ធ', 'ចំនួន']);
            foreach ($data as $book) {
                fputcsv($handle, [
                    $book->id,
                    $book->title,
                    $book->author,
                    $book->quantity
                ]);
            }
        }

        fclose($handle);

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        return response()->download($filename, $filename, $headers)->deleteFileAfterSend(true);
    }
}
