<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\SettingRequest;
use App\Repositories\Setting\SettingRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    public function __construct(
        private SettingRepository $settingRepository
    )
    {
    }

    public function index(): Factory|View|Application
    {
        $settings = $this->settingRepository->getAllSetting();

        foreach ($settings as $setting) {
            $settings[$setting->key] = $setting->value;
        }

        $settings = array_merge(config('seo'), $settings->toArray());

        return view('admin.pages.setting.index')->with(compact('settings'));
    }

    public function update(SettingRequest $request): Application|Factory|View
    {
        $formValue = $request->all();

        DB::beginTransaction();
        try {
            foreach ($formValue as $key => $value) {
                if (!str_starts_with($key, '_')) {
                    $this->settingRepository->updateOrCreate(['key' => $key], ['value' => $value]);
                }
            }
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('Error update settings', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return $this->index()
                ->withErrors(['error' => ['Không thể cập nhật bài viết']]);
        }

        session()->flash('success', 'Lưu cài đặt thành công');
        return $this->index();
    }
}
