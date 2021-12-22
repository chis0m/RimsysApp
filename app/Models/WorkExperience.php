<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\WorkExperience
 *
 * @method static Builder|WorkExperience newModelQuery()
 * @method static Builder|WorkExperience newQuery()
 * @method static Builder|WorkExperience query()
 * @mixin Eloquent
 * @property int $id
 * @property string $slug
 * @property string $company
 * @property string $position
 * @property string|null $stack
 * @property string $start_year
 * @property string $end_year
 * @property string|null $image_url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|WorkExperience whereCompany($value)
 * @method static Builder|WorkExperience whereCreatedAt($value)
 * @method static Builder|WorkExperience whereEndYear($value)
 * @method static Builder|WorkExperience whereId($value)
 * @method static Builder|WorkExperience whereImageUrl($value)
 * @method static Builder|WorkExperience wherePosition($value)
 * @method static Builder|WorkExperience whereSlug($value)
 * @method static Builder|WorkExperience whereStack($value)
 * @method static Builder|WorkExperience whereStartYear($value)
 * @method static Builder|WorkExperience whereUpdatedAt($value)
 * @property string $reference
 * @property-read Collection|Achievement[] $achievements
 * @property-read int|null $achievements_count
 * @method static Builder|WorkExperience whereReference($value)
 * @property int $till_present
 * @property Carbon|null $deleted_at
 * @method static \Database\Factories\WorkExperienceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Query\Builder|WorkExperience onlyTrashed()
 * @method static Builder|WorkExperience whereDeletedAt($value)
 * @method static Builder|WorkExperience whereTillPresent($value)
 * @method static \Illuminate\Database\Query\Builder|WorkExperience withTrashed()
 * @method static \Illuminate\Database\Query\Builder|WorkExperience withoutTrashed()
 */
class WorkExperience extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function achievements(): HasMany
    {
        return $this->hasMany(Achievement::class);
    }
}
