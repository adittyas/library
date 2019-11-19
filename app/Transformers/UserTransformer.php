<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * @param \App\User $user
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id' => (int) $user->id,
            'id_employee' => (int) $user->id_employee,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'created' => $user->created_at->diffForHumans(),
            'updated' => $user->updated_at->diffForHumans(),
            'action' => '<btn title="Edit data" class="edit-user btn btn-outline-light btn-sm border-0" data-id="'.$user->id.'"><i class="fas fa-pen-nib"></i></btn><btn title="Delete data" class="delete-user btn btn-outline-light btn-sm border-0" data-id="'.$user->id.'"><i class="fas fa-trash-alt"></i></btn>',
            'address' => $user->profile->address.', '.$user->profile->province.' '.$user->profile->district.' '.$user->profile->sub_district.''.$user->profile->urban_village,
            'contact' => $user->profile->contact,
            'avatar' => $user->getAvatar()
        ];
    }
}