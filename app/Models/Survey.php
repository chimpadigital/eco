<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'how_did_you_know_manual',
        'process_download',
        'virtual_assists_boolean',
        'virtual_assists',
        'call_time_boolean',
        'call_time',
        'quality_advice_boolean',
        'quality_advice',
        'attention',
        'suggestions',
        'content_option_1',
        'content_option_2',
        'content_option_3',
        'content_option_4',
        'content_option_5',
        'content_option_6',
        'chapter_1',
        'chapter_2',
        'chapter_3',
        'chapter_4',
        'chapter_5',
        'chapter_6',
        'chapter_7',
        'chapter_8',
        'satisfied',
        'suggestions_2',
        'would_you_recommend',
        'like',
        'user_id',
    ];
}
