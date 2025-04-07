<?php

namespace App\Exports;

use App\Models\Review;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReviewExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $reviews = Review::with('transaction')->get();

        return $reviews->map(function ($review) {
            return [
                'ID'              => $review->id,
                'Transaction Number' => $review->transaction->transaction_number,
                'Transaction Type' => class_basename($review->transaction->transactionable),
                'Rating' => $review->rating,
                'Comment' => $review->comment,
                'Created At'      => $review->created_at ? $review->created_at->toDateTimeString() : null,
                'Updated At'      => $review->updated_at ? $review->updated_at->toDateTimeString() : null,
            ];
        });
    }
    
    public function headings(): array
    {
        return [
            'ID',
            'Transaction Number',
            'Transaction Type',
            'Rating',
            'Comment',
            'Created At',
            'Updated At',
        ];
    }
}
