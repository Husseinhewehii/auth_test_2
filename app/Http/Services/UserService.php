<?php

namespace App\Http\Services;

use App\Models\User;
use Symfony\Component\HttpFoundation\Request;
use Hash;

class UserService
{
    public function fillFromRequest(Request $request, $user = null)
    {
        if (!$user) {
            $user = new User();
        }

        $user->fill($request->all());
        // $user->type = $request->type;
        $user->save();

        return $user;
    }

    public function fillUserGroupsFromRequest(Request $request, $user = null)
    {
        if (!$user) {
            return false;
        }
        $user->groups()->sync($request->input("groups"));
        return $user;
    }

    public function changePassword(Request $request, $user)
    {
        $oldPassword = $request->get('old_password');
        $newPassword = $request->get('new_password');
        $hashedPassword = $user->password;

        if (Hash::check($oldPassword, $hashedPassword)) {
            $user->update(['password' => $newPassword]);
            $response = trans('updated_successfully');
        } else {
            $response = trans('wrong_old_password');
        }
        return $response;
    }

    
}
