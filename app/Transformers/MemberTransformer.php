<?php

namespace App\Transformers;

use App\Member;
use League\Fractal\TransformerAbstract;

class MemberTransformer extends TransformerAbstract
{
    /**
     * @param \App\Member $member
     * @return array
     */
    public function transform(Member $member)
    {
        return [
            'id'        => (int) $member->id,
            'name'        => $member->name,
            'nim'        => $member->nim,
            'contact'   => $member->contact,
            'email'     => $member->email,
            'created'   => $member->created_at->diffForHumans(),
            'updated'   => $member->updated_at->diffForHumans(),
            'action' => '<btn title="Edit data" class="edit-user btn btn-outline-light btn-sm border-0" data-id="'.$member->id.'"><i class="fas fa-pen-nib"></i></btn><btn title="Delete data" class="delete-user btn btn-outline-light btn-sm border-0" data-id="'.$member->id.'"><i class="fas fa-trash-alt"></i></btn>',
        ];
    }
}
