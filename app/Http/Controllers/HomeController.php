<?php


namespace App\Http\Controllers;


use App\Client\QuoteRestClient;
use App\Quote;
use App\Repository\QuoteRepository;

class HomeController extends Controller
{
    /**
     * @var QuoteRepository
     */
    private $quoteRepository;

    /**
     * @var QuoteRestClient
     */
    private $quoteRestClient;

    public function __construct(QuoteRepository $quoteRepository, QuoteRestClient $quoteRestClient)
    {
        $this->quoteRepository = $quoteRepository;
        $this->quoteRestClient = $quoteRestClient;
    }


    public function show()
    {
        $category = 'inspire';

        $quote = $this->quoteRepository->findCurrentOneByCategory($category);

        if (null === $quote) {
            $quoteData = $this->quoteRestClient->retrieveQuote($category);

            $quote = Quote::createFromArray($quoteData);

            $this->quoteRepository->save($quote);
        }

        return view('index', ['quote' => $quote]);
    }
}