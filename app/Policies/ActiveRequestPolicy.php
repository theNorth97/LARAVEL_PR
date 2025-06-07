<?php

namespace App\Policies;

use App\Models\ActiveRequest;
use App\Models\User;

class ActiveRequestPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        return $user->rights->contains('name', 'can_view_apppllications'); //права на просмотр списка заявок ( кнопка заявки) 
        // вызываю модельку юзера  , с правами готовыми.
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->rights->contains('name', 'can_create_apppllication'); //права на завершение заявки ( кнопка заявки) 
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ActiveRequest $activeRequest): bool
    {
        return $user->id === $activeRequest->user_id
            && $user->rights->contains('name', 'can_create_apppllication'); //права на завершение заявки ( кнопка заявки) 
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ActiveRequest $activeRequest): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ActiveRequest $activeRequest): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ActiveRequest $activeRequest): bool
    {
        return false;
    }
}
