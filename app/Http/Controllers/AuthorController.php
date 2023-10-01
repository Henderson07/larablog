<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        return view('backend.pages.home');
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('author.login');
    }
    public function ResetForm(Request $request, $token = null)
    {
        $data = [
            'pageTitle' => 'Redefinir senha'
        ];
        return view('backend.pages.auth.reset', $data)->with(['token' => $token, 'email' => $request->email]);
    }
    public function changeProfilePicture(Request $request)
    {
        $user = User::find(auth('web')->id());
        $path = 'backend/dist/img/authors';
        $file = $request->file('file');
        $old_picture = $user->getAttribute()['picture'];
        $file_path = $user . $old_picture;
        $new_picture_name = 'AIMG' . $user->id . time() . rand(1, 100000) . '.jpg';

        if ($old_picture != null && File::exists(public_path($file_path))) {
            File::delete(public_path($file_path));
        }
        $upload = $file->move(public_path($path), $new_picture_name);
        if ($upload) {
            $user->update([
                'picture' => $new_picture_name
            ]);
            return response()->json(['status' => 1, 'msg' => 'Foto de perfil atualizada com sucesso']);
        } else {
            return response()->json([
                'status' => 0, 'msg' => 'Algo deu errado'
            ]);
        }
    }
}
