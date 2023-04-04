<?php

namespace App\Repositories\Contact;

use App\Models\Contact;
use Prettus\Repository\Eloquent\BaseRepository;

class ContactRepositoryEloquent extends BaseRepository implements ContactRepository
{

    public function model()
    {
        return Contact::class;
    }
}
