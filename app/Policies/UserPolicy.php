<?php

namespace App\Policies;

// LPG: Cuando se trate del modelo user, se debe eliminar una importación
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {

        $exceptAbilities = ['delete'];

        if($user->isAdmin() && !in_array($ability, $exceptAbilities)){
        
            return true;
            
        }

    }

    public function index(User $user)
    {

        // Es posible que esto deba verificarse más adelante. 
        return false;

    }

    public function viewAny(User $user)
    {
        return false;
    }   

    // De manera predeterminada larapack-generator especifica (User $user, User $user)
    // Lo cual se debe cambiar por (User $user, User $model)
    public function view(User $user, User $model)
    {

        // Validaciones individuales

            // El usuario autenticado intenta ver a si mismo
            $a = $user->id === $model->id;

        // Validación compuesta

            return $a;

    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, User $model)
    {
        // Validaciones individuales

            // El usuario autenticado intenta ver a si mismo
            $a = $user->id === $model->id;

        // Validación compuesta

            return $a;
    }

    public function delete(User $user, User $model)
    {      

        // Validación individual

            $a = !$model->isAdmin();

            

        // Validaciones compuestas
            
            return $a;
    }

    public function restore(User $user, User $model)
    {
        return false;
    }

    public function forceDelete(User $user, User $model)
    {
        return false;
    }

    public function export(User $user)
    {
        return false;
    }

}
