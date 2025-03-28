<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    protected $table = 'Article';
    protected $primaryKey = "ArticleId";
    protected $fillable = [
        'ArticleId',
        'Title',
        'Body',
        'CreateDate',
        'StartDate',
        'EndDate',
        'ContributorUsername'
        ];

        public function contributor() {
            return $this->belongsTo(User::class, 'ContributorUsername', 'Username');
        }
}
