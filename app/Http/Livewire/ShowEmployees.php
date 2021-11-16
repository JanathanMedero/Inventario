<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Auth;
use Illuminate\Support\Str;
use App\Models\Role;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class ShowEmployees extends Component
{
    use WithPagination;

    public $search = "";
    public $employees;

    public function mount($employees)
    {
        $employees = $this->employees;
    }

    public function render()
    {
        $employees = User::where('name', 'LIKE', '%' . $this->search . '%')->whereNotIn('id', [Auth::user()->id])->orderBy('created_at', 'DESC')->paginate(10);

        $roles = Role::all();

        return view('livewire.show-employees', compact('employees', 'roles'));
    }
}
