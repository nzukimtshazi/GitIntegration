<?php
/**
 * Created by PhpStorm.
 * User: Nzuki Mtshazi
 * Date: 01-Sep-22
 * Time: 9:27 PM
 */

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['title', 'description', 'assigned_to', 'status', 'logo', 'client_id', 'priority_id', 'type_id'];
}