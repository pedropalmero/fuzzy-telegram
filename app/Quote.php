<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    public static function createFromArray(array $quoteData): Quote
    {
        $quote = new Quote();
        $quote->category = $quoteData['category'];
        $quote->text = $quoteData['quote'];

        return $quote;
    }
}
