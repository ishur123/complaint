<?php

namespace App\Livewire;

use App\Models\Complaint;
use Livewire\Component;

class ComplainsList extends Component
{
    public $complaints;
    public $name;
    public $mobile;
    public $dateOpen;
    public $statuses;
    public $status;

    public $headers = [
        ['key' => 'complaintNo', 'label' => 'ID', 'class' => 'text-gray-800'],
        ['key' => 'complainant.name', 'label' => 'Name', 'class' => 'text-gray-800'],
        ['key' => 'complainant.mobile', 'label' => 'Mobile', 'class' => 'text-gray-800'],
        ['key' => 'created_at', 'label' => 'Date Open', 'class' => 'text-gray-800'],
        ['key' => 'department.depttName', 'label' => 'Department', 'class' => 'text-gray-800'],
        ['key' => 'natureOfComplaint.compName', 'label' => 'Nature of Complaint', 'class' => 'text-gray-800'],
        ['key' => 'complaintDetails', 'label' => 'Complaint Details', 'class' => 'text-gray-800'],
        ['key' => 'complaintStatus', 'label' => 'Complaint Status', 'class' => 'text-gray-800'],
//        ['key' => 'edit', 'label' => 'Edit Status','class'=>'text-gray-800'],
    ];

    public function mount()
    {
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

        $this->filter();
    }

    public function filter()
    {
        $query = Complaint::query();

        if (isset($this->name)) {
            $query->whereHas('complainant', function ($q) {
                $q->where('name', 'like', '%' . $this->name . '%');
            });
        }
        if (isset($this->mobile)) {
            $query->whereHas('complainant', function ($q) {
                $q->where('mobile', 'like', '%' . $this->mobile . '%');
            });
        }
        if (isset($this->dateOpen)) {
            $query = $query->where('created_at', $this->dateOpen);
        }
        if (isset($this->status)) {
            $query = $query->where('complaintStatus', $this->status);
        }

        $this->complaints = $query->get();
    }

    public function render()
    {
        return view('livewire.complains-list');
    }
}
