<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Achievement
 *
 * @property int $id
 * @property int $work_experience_id
 * @property mixed|null $achievements
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Achievement newModelQuery()
 * @method static Builder|Achievement newQuery()
 * @method static Builder|Achievement query()
 * @method static Builder|Achievement whereAchievements($value)
 * @method static Builder|Achievement whereCreatedAt($value)
 * @method static Builder|Achievement whereId($value)
 * @method static Builder|Achievement whereUpdatedAt($value)
 * @method static Builder|Achievement whereWorkExperienceId($value)
 * @mixin Eloquent
 * @property string $name
 * @method static Builder|Achievement whereName($value)
 * @property string $reference
 * @method static Builder|Achievement whereReference($value)
 * @property Carbon|null $deleted_at
 * @method static \Database\Factories\AchievementFactory factory(...$parameters)
 * @method static \Illuminate\Database\Query\Builder|Achievement onlyTrashed()
 * @method static Builder|Achievement whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Achievement withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Achievement withoutTrashed()
 */
class Achievement extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
}
