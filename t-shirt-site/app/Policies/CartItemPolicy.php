<?php

namespace App\Policies;

use App\Models\CartItem;
use App\Models\User;
use Illuminate\Auth\Access\Response;

//Les policies contiennent les classes régentant l'accès et les actions sur une donnée
class CartItemPolicy
{
    //détermine si un user peut ou non voir une view
    public function viewAny(User $user): bool
    {
        return false;
    }

    //détermination de l'accès au modèle
    public function view(User $user, CartItem $cartItem): bool
    {
        return false;
    }

  //Un user peut-il créer un modèle
    public function create(User $user): bool
    {
        return false;
    }

   //détermine en fonction de l'id du user s'il peut mettre à jour le panier
    public function update(User $user, CartItem $cartItem)
    {
        return $user->id === $cartItem->user_id;
    }

    //détermine s'il peut accéder à la méthode delete
    public function delete(User $user, CartItem $cartItem)
    {
        return $user->id === $cartItem->user_id;
    }
    public function restore(User $user, CartItem $cartItem): bool
    {
        return false;
    }
    public function forceDelete(User $user, CartItem $cartItem): bool
    {
        return false;
    }
}
