<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CombatParticipant extends Model
{
    use HasFactory;

    // Since this is a composite key, we define it here, but typically you treat it as a standard model
    // and rely on the relationships for querying. We explicitly state the table name.
    protected $table = 'combat_participants';

    // Prevent Laravel from assuming an 'id' primary key
    public $incrementing = false;

    // Define the columns that form the composite key
    protected $primaryKey = ['combat_id', 'user_id'];
    protected $keyType = 'string';

    protected $guarded = [];

    /**
     * Set the primary key as a composite key (Required for Eloquent to handle composite keys correctly)
     */
    protected function setKeysForSaveQuery($query)
    {
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::setKeysForSaveQuery($query);
        }

        foreach($keys as $keyName){
            $query->where($keyName, '=', $this->getAttribute($keyName));
        }

        return $query;
    }

    /**
     * Get the combat that this participant belongs to.
     */
    public function combat()
    {
        return $this->belongsTo(GroupCombat::class, 'combat_id', 'combat_id');
    }

    // You would typically define a relationship to your main User model here as well
}