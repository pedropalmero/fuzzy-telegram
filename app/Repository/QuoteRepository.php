<?php


namespace App\Repository;


use App\Quote;

class QuoteRepository
{
    /**
     * @var Quote
     */
    private $model;

    public function __construct(Quote $model)
    {
        $this->model = $model;
    }

    public function findCurrentOneByCategory(string $category)
    {
        $today = new \DateTimeImmutable();

        return $this->model
          ->where('category', $category)
          ->whereDate('created_at', $today->format('Y-m-d'))
          ->inRandomOrder()
          ->first();
    }

    public function save(Quote $quote)
    {
        $quote->save();
    }
}