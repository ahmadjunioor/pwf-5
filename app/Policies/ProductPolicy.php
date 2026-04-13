<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy
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
    public function view(User $user, Product $product): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Product $product): bool
    {
        // User hanya bisa update produknya sendiri ATAU dia adalah admin
        return $user->id === $product->user_id || $user->role === 'admin';
    }

    public function delete(User $user, Product $product): bool
    {
        // User hanya bisa delete produknya sendiri ATAU dia adalah admin
        return $user->id === $product->user_id || $user->role === 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Product $product): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Product $product): bool
    {
        return false;
    }

    public function destroy(Product $product)
    {
        // Ini akan mengecek aturan 'delete' di ProductPolicy
        Gate::authorize('delete', $product); 

        $product->delete();
        return redirect()->back()->with('success', 'Produk berhasil dihapus');
    }
}
