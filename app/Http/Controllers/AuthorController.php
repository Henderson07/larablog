<?php

namespace App\Http\Controllers;

use App\Models\GeneralSettings;
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

    public function changeBlogLogo(Request $request)
    {
        $general_settings = GeneralSettings::find(1);
        $logo_path = 'backend/dist/img/logo-favicon';
        $old_logo = $general_settings->blog_logo;
        $file = $request->file('blog_logo');

        if ($request->hasFile('blog_logo')) {
            // Validação: Verifique se o arquivo é um SVG
            if ($file->getClientOriginalExtension() === 'svg') {
                // Gere um nome único para o arquivo
                $filename = time() . '_' . rand(1, 100000) . '_blog_logo.svg';
            } else {
                $filename = time() . '_' . rand(1, 100000) . 'blog_logo.png';
            }

            if ($old_logo != null && File::exists(public_path($logo_path . $old_logo))) {
                File::delete(public_path($logo_path . $old_logo));
            }

            $upload = $file->move(public_path($logo_path), $filename);

            if ($upload) {
                $general_settings->update([
                    'blog_logo' => $filename
                ]);

                $output = [
                    'success' => 1,
                    'msg' => __('Logo atualizada com sucesso')
                ];

                return redirect()->route('author.settings')->with('status', $output);
            } else {
                $output = [
                    'success' => 0,
                    'msg' => __('Algo deu errado')
                ];

                return redirect()->route('author.settings')->with('status', $output);
            }
        } else {
            $output = [
                'success' => 0,
                'msg' => 'O arquivo deve ser um SVG.'
            ];

            return redirect()->route('author.settings')->with('status', $output);
        }
    }

    public function changeBlogFavicon(Request $request)
    {
        $general_settings = GeneralSettings::find(1);
        $favicon_path = 'backend/dist/img/logo-favicon';
        $old_favicon = $general_settings->blog_favicon;
        $file = $request->blog_favicon;
        // dd($request, $general_settings, $favicon_path, $old_favicon, $file);
        if ($request->hasFile('blog_favicon')) {
            // Validação: Verifique se o arquivo é um SVG
            if ($file->getClientOriginalExtension() === 'svg') {
                // Gere um nome único para o arquivo
                $filename = time() . '_' . rand(1, 2000) . '_blog_favicon.ico';
            } else {
                $filename = time() . '_' . rand(1, 2000) . '_blog_favicon.ico';
            }

            if ($old_favicon != null && File::exists(public_path($favicon_path . $old_favicon))) {
                File::delete(public_path($favicon_path . $old_favicon));
            }

            $upload = $file->move(public_path($favicon_path), $filename);

            if ($upload) {
                $general_settings->update([
                    'blog_favicon' => $filename
                ]);

                $output = [
                    'success' => 1,
                    'msg' => __('Ícone atualizado com sucesso')
                ];

                return redirect()->route('author.settings')->with('status', $output);
            } else {
                $output = [
                    'success' => 0,
                    'msg' => __('Algo deu errado')
                ];

                return redirect()->route('author.settings')->with('status', $output);
            }
        } else {
            $output = [
                'success' => 0,
                'msg' => 'O arquivo deve ser um SVG ou JPG.'
            ];

            return redirect()->route('author.settings')->with('status', $output);
        }
    }
}
