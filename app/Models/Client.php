<?php
/**
 * Created by PhpStorm.
 * User: Nzuki Mtshazi
 * Date: 02-Sep-22
 * Time: 4:35 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['name'];
}