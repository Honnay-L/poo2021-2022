<?php
namespace App\Twig;


use App\Search\SearchFormGenerator;
use NumberFormatter;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;


class MyTwigExtension extends AbstractExtension
{
    private SearchFormGenerator $searchFormGenerator;

    /**
     * MyTwigExtension constructor.
     * @param SearchFormGenerator $searchFormGenerator
     */
    public function __construct(SearchFormGenerator $searchFormGenerator)
    {
        $this->searchFormGenerator = $searchFormGenerator;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('getSearchForm', [$this->searchFormGenerator,'getSearchForm'])
        ];
    }

    public function getFilters()
    {
        return [
            new TwigFilter('price', [$this, 'priceFilter'])
        ];
    }

    public function priceFilter(float $number): string {
        $fmt = new NumberFormatter( 'fr_FR', NumberFormatter::CURRENCY );
        return $fmt->formatCurrency($number, "EUR");
    }


}
