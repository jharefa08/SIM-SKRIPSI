<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model; use Illuminate\Database\Eloquent\Factories\HasFactory;
class TitleSubmission extends Model { use HasFactory; protected $guarded=[]; protected $casts=['approved_at'=>'datetime']; public function student(){ return $this->belongsTo(User::class,'student_id'); } public function supervisor(){ return $this->belongsTo(User::class,'supervisor_id'); } }
