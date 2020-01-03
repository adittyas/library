<?php

namespace App\Transformers;

use App\Member;
use App\Book;
use League\Fractal\TransformerAbstract;

class MemberTransformer extends TransformerAbstract
{
    /**
     * @param \App\Member $member
     * @return array
     */
    public function transform(Member $member)
    {
        if($member->status=='1'){
            $member->status='Active';
        }else if($member->status=='0'){
            $member->status='Deactive';
        }

        $dt =  $member->bookings;
        $book = [];
        $data = [];
        foreach ($dt as $key) {
            if($key->fullfill===0){
                 $ff = Book::find($key->book_id);
                 $book['name']= $ff->title;
                 $book['start']= \Carbon\Carbon::parse($key->out_date)->toFormattedDateString();
                 $book['end']=  \Carbon\Carbon::parse($key->end_date)->toFormattedDateString();
                 $book['late']= $key->late.' Days';
                 $data[] = $book;
            }
        }
        if(count($data)>0){
              $delete='';
        }else{
             $delete = '<button title="Delete data" class="delete-member btn btn-outline-light btn-sm border-0" data-id="'.$member->id.'"><i class="fas fa-trash-alt"></i></button>';
        }

        return [
            'id'        => (int) $member->id,
            'name'      => $member->name,
            'nim'       => $member->nim,
            'contact'   => $member->contact,
            'email'     => $member->email,
            'status'    => $member->status,
            'reason'    => $member->reason,
            'book'      => $data,
            'created'   => $member->created_at->diffForHumans(),
            'updated'   => $member->updated_at->diffForHumans(),
            'action'    => '<button title="Edit data" class="edit-member btn btn-outline-light btn-sm border-0" data-id="'.$member->id.'"><i class="fas fa-pen-nib"></i></button>'.$delete,
        ];
    }
}