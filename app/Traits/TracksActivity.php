<?php

namespace App\Traits;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

trait TracksActivity
{
    protected static function bootTracksActivity()
    {
        static::created(function ($model) {
            $model->trackActivity('created');
        });

        static::updated(function ($model) {
            $model->trackActivity('updated');
        });

        static::deleted(function ($model) {
            $model->trackActivity('deleted');
        });
    }

    protected function trackActivity($action)
    {
        $type = class_basename($this) . '_' . $action;
        $description = $this->getActivityDescription($action);

        // Special handling for user creation
        $userId = null;
        if ($action === 'created' && $this instanceof \App\Models\User) {
            $userId = null; // Don't set user_id for user creation
        } else {
            $userId = Auth::id();
        }

        Activity::create([
            'user_id' => $userId,
            'bin_id' => $this instanceof \App\Models\Bin ? $this->id : ($this->bin_id ?? null),
            'location_id' => $this->location_id ?? null,
            'type' => $type,
            'description' => $description,
            'data' => $this->getActivityData()
        ]);
    }

    protected function getActivityDescription($action)
    {
        $modelName = class_basename($this);
        
        switch ($action) {
            case 'created':
                return "New {$modelName} created";
            case 'updated':
                return "{$modelName} updated";
            case 'deleted':
                return "{$modelName} deleted";
            default:
                return "{$modelName} {$action}";
        }
    }

    protected function getActivityData()
    {
        return [
            'id' => $this->id,
            'attributes' => $this->getAttributes(),
            'changes' => $this->getChanges(),
        ];
    }
} 