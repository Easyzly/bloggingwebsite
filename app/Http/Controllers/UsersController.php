<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function destroy(int $id)
    {
        $user = User::find($id);
        if($user){
            $user->delete();
        }
        return redirect()->route('page.users');
    }

    public function adminmaker(int $id)
    {
        $user = User::find($id);
        $user->update([
           'isAdmin'=> true,
        ]);
        return redirect()->route('page.users');
    }
    public function adminremover(int $id)
    {
        $user = User::find($id);
        $user->update([
            'isAdmin'=> false,
        ]);
        return redirect()->route('page.users');
    }
}
