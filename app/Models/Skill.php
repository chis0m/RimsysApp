<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Skill
 *
 * @method static Builder|Skill newModelQuery()
 * @method static Builder|Skill newQuery()
 * @method static Builder|Skill query()
 * @mixin Eloquent
 * @property int $id
 * @property string $slug
 * @property string $category
 * @property string $name
 * @property int $level
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Skill whereCategory($value)
 * @method static Builder|Skill whereCreatedAt($value)
 * @method static Builder|Skill whereId($value)
 * @method static Builder|Skill whereLevel($value)
 * @method static Builder|Skill whereName($value)
 * @method static Builder|Skill whereSlug($value)
 * @method static Builder|Skill whereUpdatedAt($value)
 * @property string $reference
 * @method static Builder|Skill whereReference($value)
 * @property string|null $description
 * @property Carbon|null $deleted_at
 * @method static \Database\Factories\SkillFactory factory(...$parameters)
 * @method static \Illuminate\Database\Query\Builder|Skill onlyTrashed()
 * @method static Builder|Skill whereDeletedAt($value)
 * @method static Builder|Skill whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|Skill withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Skill withoutTrashed()
 */
class Skill extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
}
