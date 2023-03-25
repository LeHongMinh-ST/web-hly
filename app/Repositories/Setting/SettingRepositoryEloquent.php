<?php

namespace App\Repositories\Setting;

use App\Models\Setting;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

class SettingRepositoryEloquent extends BaseRepository implements SettingRepository
{
    public function model(): string
    {
        return Setting::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getAllSetting()
    {
        return $this->scopeQuery(fn($query) => $query)->get();
    }

    public function getByKey(string $key)
    {
        return $this->scopeQuery(function ($query) use ($key) {
            return $query->where('key', $key);
        })->get()->first();
    }
}
