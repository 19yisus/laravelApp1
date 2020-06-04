<?php

namespace App\Policies;

use App\Models\Nucleos;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class NucleoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return Auth::user()->permisos == 4;
        
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\=Models\Nucleos  $nucleos
     * @return mixed
     */
    public function view(User $user, Nucleos $nucleos)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Nucleos  $nucleos
     * @return mixed
     */
    public function update(User $user, Nucleos $nucleos)
    {
        return $nucleos->status == 1;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Nucleos  $nucleos
     * @return mixed
     */
    public function delete(User $user, Nucleos $nucleos)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Nucleos  $nucleos
     * @return mixed
     */
    public function restore(User $user, Nucleos $nucleos)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\=Models\Nucleos  $nucleos
     * @return mixed
     */
    public function forceDelete(User $user, Nucleos $nucleos)
    {
        //
    }
}
