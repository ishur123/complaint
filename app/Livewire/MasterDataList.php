<?php

namespace App\Livewire;

use App\Models\MasterData;
use Livewire\Component;
use Mary\Traits\Toast;

class MasterDataList extends Component
{
    use Toast;

    public $masterRecords;
    public $searchTerm;

    public $headers = [
        ['key' => 'id', 'label' => 'sr no.', 'class' => 'text-black'],
        ['key' => 'state.stateName', 'label' => 'State', 'class' => 'text-black'],
        ['key' => 'constituency.name', 'label' => 'Constituency', 'class' => 'text-black'],
        ['key' => 'mandal.mandalName', 'label' => 'Mandal', 'class' => 'text-black'],
        ['key' => 'distt.disttName', 'label' => 'Distt', 'class' => 'text-black'],
        ['key' => 'village.villageName', 'label' => 'Village', 'class' => 'text-black'],
        ['key' => 'deptt.depttName', 'label' => 'Deptt', 'class' => 'text-black'],
        ['key' => 'comp.compName', 'label' => 'Nature of Complaint', 'class' => 'text-black'],
        ['key' => 'cast.castName', 'label' => 'Caste', 'class' => 'text-black']
    ];

    public function mount()
    {
        $this->filter();
    }

    public function filter()
    {
        $query = MasterData::query();

        if ($this->searchTerm) {
            $query->whereHas('state', function ($q) {
                $q->where('stateName', 'like', '%' . $this->searchTerm . '%');
            })
                ->orWhereHas('constituency', function ($q) {
                    $q->where('name', 'like', '%' . $this->searchTerm . '%');
                })
                ->orWhereHas('mandal', function ($q) {
                    $q->where('mandalName', 'like', '%' . $this->searchTerm . '%');
                })
                ->orWhereHas('distt', function ($q) {
                    $q->where('disttName', 'like', '%' . $this->searchTerm . '%');
                })
                ->orWhereHas('village', function ($q) {
                    $q->where('villageName', 'like', '%' . $this->searchTerm . '%');
                })
                ->orWhereHas('deptt', function ($q) {
                    $q->where('depttName', 'like', '%' . $this->searchTerm . '%');
                })
                ->orWhereHas('comp', function ($q) {
                    $q->where('compName', 'like', '%' . $this->searchTerm . '%');
                })
                ->orWhereHas('cast', function ($q) {
                    $q->where('castName', 'like', '%' . $this->searchTerm . '%');
                });

        }

        $this->masterRecords = $query->orderBy('id')->get();
    }

    public function delete($id)
    {
        $masterRecord = MasterData::where('id', $id)->firstOrFail();
        $masterRecord->delete();

        $this->toast(
            type: 'success',
            title: 'Record Removed Succesfully',
            description: null,                  // optional (text)
            position: 'toast-top toast-end',    // optional (daisyUI classes)
            icon: 'o-information-circle',       // Optional (any icon)
            css: 'alert-info',                  // Optional (daisyUI classes)
            timeout: 3000,                      // optional (ms)
            redirectTo: null                    // optional (uri)
        );

        $this->redirectRoute('master-data-list');
    }

    public function render()
    {
        return view('livewire.master-data-list');
    }
}
