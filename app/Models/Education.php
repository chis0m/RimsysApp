<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Education
 *
 * @method static Builder|Education newModelQuery()
 * @method static Builder|Education newQuery()
 * @method static Builder|Education query()
 * @mixin Eloquent
 * @property int $id
 * @property string $slug
 * @property string $school
 * @property string $course
 * @property string $start_year
 * @property string $end_year
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Education whereCourse($value)
 * @method static Builder|Education whereCreatedAt($value)
 * @method static Builder|Education whereEndYear($value)
 * @method static Builder|Education whereId($value)
 * @method static Builder|Education whereSchool($value)
 * @method static Builder|Education whereSlug($value)
 * @method static Builder|Education whereStartYear($value)
 * @method static Builder|Education whereUpdatedAt($value)
 * @property string $reference
 * @method static Builder|Education whereReference($value)
 * @property Carbon|null $deleted_at
 * @method static \Database\Factories\EducationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Query\Builder|Education onlyTrashed()
 * @method static Builder|Education whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Education withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Education withoutTrashed()
 */
class Education extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
}
