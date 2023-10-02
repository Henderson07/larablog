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

        if ($request->hasFile('business_logo')) {
            $file = $request->file('business_logo');
            $old_picture = $user->picture;
            $file_path = public_path($path . '/' . $old_picture);
            $new_picture_name = 'AIMG' . $user->id . time() . rand(1, 100000) . '.jpg';

            if ($old_picture != null && File::exists($file_path)) {
                File::delete($file_path);
            }

            $upload = $file->move(public_path($path), $new_picture_name);

            if ($upload) {
                $user->update([
                    'picture' => $new_picture_name
                ]);

                $output = [
                    'success' => 1,
                    'msg' => __('Foto atualizada com sucesso')
                ];

                return redirect()->route('author.profile')->with('status', $output);
            } else {
                $output = [
                    'success' => 0,
                    'msg' => 'Algo deu errado e a foto não foi atualizada.'
                ];

                return redirect()->route('author.profile')->with('status', $output);
            }
        }

        $output = [
            'success' => 0,
            'msg' => 'Algo deu errado e a foto não foi atualizada.'
        ];

        return redirect()->route('author.profile')->with('status', $output);
    }
}
