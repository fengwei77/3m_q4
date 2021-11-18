<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Post extends Model implements Sortable
{
    use HasDateTimeFormatter;
    use SoftDeletes;
    use SortableTrait;

    protected $fillable = [
        'fb_id',
        'fb_name ',
        'fb_email',
        'post_url',
        'embed_code',
        'enabled',
        'sort_number',
    ];


    public $sortable = [
        'order_column_name' => 'sort_number',
        'sort_when_creating' => true,
    ];
}
