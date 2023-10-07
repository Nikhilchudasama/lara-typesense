<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
//use Typesense\LaravelTypesense\Interfaces\TypesenseDocument;

class Post extends Model
// for Typesense
//class Post extends Model implements TypesenseDocument
{
    use HasFactory,
        Searchable;

    protected $fillable = [
        'title',
        'slug',
        'body'
    ];

    /**
     * Get the indexable data array for the model.
     *
     * @return array<string, mixed>
     */
    public function toSearchableArray(): array
    {
        return $this->toArray();

        // meilisearch
//        return  [
//            'id' => (int) $this->id,
//            'title' => $this->name,
//            'slug' => $this->slug,
//            'body' => $this->body
//        ];

        // typesense
//        return  array_merge(
//            $this->toArray(),
//            [
//                'id' => (string) $this->id,
//                'created_at' => $this->created_at->timestamp,
//            ]
//        );
    }

    /**
     * The Typesense schema to be created.
     *
     * @return array
     */
//    public function getCollectionSchema(): array {
//        return [
//            'name' => $this->searchableAs(),
//            'fields' => [
//                [
//                    'name' => 'id',
//                    'type' => 'string',
//                ],
//                [
//                    'name' => 'title',
//                    'type' => 'string',
//                ],
//                [
//                    'name' => 'slug',
//                    'type' => 'string',
//                ],
//                [
//                    'name' => 'body',
//                    'type' => 'string',
//                ],
//                [
//                    'name' => 'created_at',
//                    'type' => 'int64',
//                ],
//            ],
//            'default_sorting_field' => 'created_at',
//        ];
//    }

    /**
     * The fields to be queried against. See https://typesense.org/docs/0.24.0/api/search.html.
     *
     * @return array
     */
//    public function typesenseQueryBy(): array {
//        return [
//            'title',
//            'body'
//        ];
//    }
}
