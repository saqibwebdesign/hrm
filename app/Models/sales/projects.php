<?php

namespace App\Models\sales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    use HasFactory;
    protected $table = 'tbl_sales_project_info';

    protected $fillable = [
        'platform_id',
        'client_name',
        'client_email',
        'project_name',
        'start_date',
        'end_date',
        'rate',
        'rate_type',
        'priority',
        'description',
        'status',
        'created_by'
    ];
}
