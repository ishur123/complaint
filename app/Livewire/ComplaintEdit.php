<?php

namespace App\Livewire;

use App\Models\Complaint;
use App\Models\ComplaintTransaction;
use Livewire\Component;
use Mary\Traits\Toast;

class ComplaintEdit extends Component
{
    use Toast;

    public $id;
    public $complaint;
    public $statuses;
    public $status;
    public $date;
    public $remark;
    public $addRemarkModal;
    public $actionTypes;
    public $actionType;
    public $assignTos;
    public $assignTo;
    public $remarks;

    public function mount(){
        $addRemarkModal = false;
        $this->actionTypes = [
            [
                'id' => 'Letter sent to mla',
                'name' => 'Letter sent to mla'
            ],
            [
                'id' => 'action2',
                'name' => 'action2'
            ],
            [
                'id' => 'action3',
                'name' => 'action3'
            ],
        ];
        $this->assignTos = [
            [
                'id' => 'assignee1',
                'name' => 'assignee1'
            ],
            [
                'id' => 'assignee2',
                'name' => 'assignee2'
            ],
            [
                'id' => 'assignee3',
                'name' => 'assignee3'
            ],
        ];
        $this->complaint = Complaint::where('complaintNo',$this->id)->first();
        $this->statuses = [
            [
                'id' => 'open',
                'name' => 'open'
            ],
            [
                'id' => 'processing',
                'name' => 'processing'
            ],
            [
                'id' => 'close',
                'name' => 'close'
            ],
        ];

        $this->remarks = ComplaintTransaction::where('complaintNo',$this->id)->orderBy('created_at','DESC')->get();
    }

    public function addRemark(){

        $remark = new ComplaintTransaction();
        $remark->complaintNo = $this->id;
        $remark->actionType = $this->actionType;
        $remark->tranDate = today();
        $remark->assignedTo = $this->assignTo;
        $remark->remarks = $this->remark;
        $remark->status = $this->status;
        $remark->save();

        $remarkUpdate =  Complaint::where('complaintNo',$this->id)->first();
        $remarkUpdate->complaintStatus  = $this->status;
        $remarkUpdate->save();

        $this->toast(
            type: 'success',
            title: 'Remark Added Successfully',
            position: 'toast-top toast-end',
        );

        $this->redirectRoute('complaint-edit',[$this->id]);
    }

    public function render()
    {
        return view('livewire.complaint-edit');
    }
}
