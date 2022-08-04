<?php

namespace App\Models\sales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projectAttachment extends Model
{
    use HasFactory;
    protected $table = 'tbl_sales_project_attachment_info';
    public $timestamps = false;
}
