<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VPF extends Model
{
    protected $guarded = [];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vpf';

    public function __toString()
    {
        // Non-Ranking User
        if($this->rank->id == 1)
        {
            return $this->last_name.'.'.$this->first_name[0];
        } else {
            return $this->rank->abbreviation.'. '.$this->last_name.'.'.$this->first_name[0];
        }

    }

    /**
     * Returns User
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Returns Rank
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rank()
    {
        return $this->belongsTo('App\Rank');
    }

    /**
     * Returns Assignment
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assignment()
    {
        return $this->belongsTo('App\Assignment');
    }

    /**
     * Returns all Operations
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function operations()
    {
        return $this->belongsToMany('App\Operation', 'operations_vpf', 'vpf_id', 'operation_id')->withPivot('date_attended');
    }

    /**
     * Returns all Operations
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function qualifications()
    {
        return $this->belongsToMany('App\Qualification', 'qualifications_vpf', 'vpf_id', 'qualification_id')->withPivot('date_awarded');
    }

    /**
     * Returns all Ribbons
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function ribbons()
    {
        return $this->belongsToMany('App\Ribbon', 'ribbons_vpf', 'vpf_id', 'ribbon_id')->withPivot('date_awarded');
    }

    /**
     * Returns all Schools
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function schools()
    {
        return $this->belongsToMany('App\School', 'schools_vpf', 'vpf_id', 'school_id')->withPivot('date_attended');
    }

    public function article15()
    {
        return $this->hasMany('App\Article15','vpf_id','id');
    }

    /**
     * Returns all Verbal Counseling Statements
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vcs()
    {
        return $this->hasMany('App\VCS','vpf_id','id');
    }

    /**
     * Returns all Negative Counseling Statements
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ncs()
    {
        return $this->hasMany('App\NCS','vpf_id','id');
    }

    /**
     * Returns all Developmental Counseling Statements
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dcs()
    {
        return $this->hasMany('App\DCS','vpf_id','id');
    }

    /**
     * Returns all Service History
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function serviceHistory()
    {
        return $this->hasMany('App\Service_History','vpf_id','id');
    }

    /**
     * Returns all Promotions
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function promotions()
    {
        return $this->hasMany('App\Promotion');
    }

    /**
     * Returns all Promotions Points
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function promotionsPoints()
    {
        return $this->hasMany('App\PromotionPoints');
    }



}
