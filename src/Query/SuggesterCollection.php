<?php

declare(strict_types=1);

namespace Spameri\ElasticQuery\Query;

// [
//     "name-suggester" =>[
//         "text" => "xxxxx",
//         "term" => [
//             "field" => 'yyyy'
//         ]
//     ]
// ]

class SuggesterCollection
{
    private array $suggesters;
    private $termCollection;

    public function __construct()
    {
        $this->suggesters = [];
    }

    public function add(SuggesterItem $item)
    {
        $this->suggesters[] = $item;
    }

    public function toArray(): array
    {
        $array = [];
        /** @var \Spameri\ElasticQuery\Query\LeafQueryInterface $item */
        foreach ($this->suggesters as $item) {
            $array[$item->name]['text'] = $item->text;
            $array[$item->name]['term'] = $item->item->toArray()['term'];
        }

        return $array;
    }

    // public function add(SuggesterTerm $term, string $text)
    // {
    //     $this->suggesters['text'] = $text;
    //     $this->suggesters['term'] = $term->toArray()['term'];
    // }
}
