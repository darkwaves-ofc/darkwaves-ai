<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Subscriber extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'plan_id',
        'status',
        'gateway',
        'words',
        'images',
        'subscription_id',
        'active_until',
        'frequency',
    ];


    /**
     * Subscription belongs to a single user
     *
     * 
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Plan belongs to a single user
     *
     * 
     */
    public function plan()
    {
        return $this->belongsTo(SubscriptionPlan::class);
    }


    /**
     * Check if subscription is active
     *
     * 
     */
    public function isActive()
    {
        if ($this->status == 'Active') {
            return Carbon::parse($this->active_until)->gt(now());
        } 
    }
}
