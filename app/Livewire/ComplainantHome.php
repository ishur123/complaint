<?php

namespace App\Livewire;

use App\Models\Complainant;
use App\Models\Complaint;
use App\Models\Deptt;
use App\Models\NatureOfComplaint;
use Livewire\Component;
use Mary\Traits\Toast;

class ComplainantHome extends Component
{
    use Toast;

    public $mobile;
    public $complainant;
    public $complains;
    public $addComplaintModal;
    public $departments;
    public $natureOfComplaints;
    public $departmentRelatedTo;
    public $natureOfComplaintRelatedTo;
    public $complainDetails;
//    public $photo;

    public $headers = [
        ['key' => 'complaintNo', 'label' => 'ID' ,'class'=>'text-gray-800'],
        ['key' => 'name', 'label' => 'Date Open','class'=>'text-gray-800'],
        ['key' => 'department.depttName', 'label' => 'Department','class'=>'text-gray-800'],
        ['key' => 'natureOfComplaint.compName', 'label' => 'Nature of Complaint','class'=>'text-gray-800'],
        ['key' => 'complaintDetails', 'label' => 'Complaint Details','class'=>'text-gray-800'],
        ['key' => 'complaintStatus', 'label' => 'Complaint Status','class'=>'text-gray-800'],
        ['key' => 'edit', 'label' => 'Edit Status','class'=>'text-gray-800'],
    ];

    public function mount()
    {
        $addComplaintModal = false;
        $this->complainant = Complainant::where('mobile', $this->mobile)->first();
        $this->complains = Complaint::where('contactId', $this->complainant->contactId)->get();

        $this->departments = Deptt::all();
        $this->natureOfComplaints = NatureOfComplaint::all();
    }

    public function addComplant(){
        $complain = new Complaint();
        $complain->contactId = Complainant::where('mobile', $this->mobile)->first()->contactId;
        $complain->depttId = $this->departmentRelatedTo;
        $complain->compId = $this->natureOfComplaintRelatedTo;
        $complain->complaintDetails = $this->complainDetails;
        $complain->complaintStatus = 'open';
        $complain->save();

        $this->toast(
            type: 'success',
            title: 'Complaint Created Successfully',
            description: null,
            position: 'toast-top toast-end',
            icon: 'o-information-circle',       // Optional (any icon)
            css: 'alert-info',                  // Optional (daisyUI classes)
            timeout: 3000,
            redirectTo: null
        );

        $this->redirectRoute('complainant-home',[$this->mobile]);
    }

    public function render()
    {
        return view('livewire.complainant-home');
    }
}
