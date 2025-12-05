<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


use App\Models\User;
use App\Models\Company;
use App\Models\Category;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;
    protected $table = "job_listings";
    protected $fillable = ["company_id", "user_id", "title", "description", "contact_phone", "contact_email", "contact_name", "tags"];
    protected $casts = ["tags" => "array"];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    } 
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    } 
    public function category(): BelongsToMany       
    {
        return $this->belongsToMany(Category::class);
    } 


}