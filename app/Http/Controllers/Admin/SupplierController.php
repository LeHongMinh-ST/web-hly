<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Language;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Supplier\StoreSupplierRequest;
use App\Models\Supplier;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Supplier\SupplierRepository;
use App\Services\Helper\SlugService;
use App\Services\LanguageMeta\LanguageMetaService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SupplierController extends Controller
{
    public function __construct(
        private SupplierRepository  $supplierRepository,
        private CategoryRepository  $categoryRepository,
        private LanguageMetaService $languageMetaService,
        private SlugService         $slugService
    )
    {
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): Factory|View|Application
    {
        $data = $request->only(['q', 'limit', 'locale']);

        $suppliers = $this->supplierRepository->getPaginate($data);
        return view('admin.pages.supplier.index')->with(compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function create(Request $request): Factory|View|Application
    {
        $supplier = null;

        $refLanguage = $request->get('ref_language', Language::Vietnamese);


        return view('admin.pages.supplier.create')->with(compact( 'supplier', 'refLanguage'));
    }


    /**
     * Store the specified resource from storage.
     *
     * @param StorePostRequest $request
     * @return RedirectResponse
     */
    public function store(StoreSupplierRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $filteredArrayImgBrand = array_filter($data['imgBrand'], function($value) {
                return $value !== null;
            });
            $filteredArrayNameBrand = array_filter($data['nameBrand'], function($value) {
                return $value !== null;
            });
            if(count($filteredArrayImgBrand) && count($filteredArrayNameBrand)) $data['brands'] = array_map(null, $data['imgBrand'], $data['nameBrand']);
            $supplier = $this->supplierRepository->create($data);
            $supplier?->slug()->create(['content' => $this->slugService->generateSlug(Supplier::class, $supplier->name)]);
            $refLanguage = $data['ref_language'] ?? Language::Vietnamese;
            $this->languageMetaService->createPost($supplier->id, Supplier::class, $refLanguage, @$supplier['from_id']);
            DB::commit();
            $request->session()->flash('success', 'Tạo mới nhà đầu tư thành công');
            return redirect()->route('admin.suppliers.index', ['locale' => $refLanguage]);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error store supplier', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể tạo mới nhà đầu tư']])
                ->withInput();
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int|string $id
     * @return Application|Factory|View
     */
    public function edit(int|string $id): Factory|View|Application
    {
        $supplier = $this->supplierRepository->find($id);
        $supplier->load('language');
        $supplier->locales = $this->languageMetaService->getArrayLocale($supplier->id, Supplier::class);
        $supplier->localeIds = $this->languageMetaService->getArrayLocaleId($supplier->id, Supplier::class);
        return view('admin.pages.supplier.edit')->with(compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StorePostRequest $request
     * @param int|string $id
     * @return RedirectResponse
     */
    public function update(StoreSupplierRequest $request, int|string $id): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $filteredArrayImgBrand = array_filter($data['imgBrand'], function($value) {
                return $value !== null;
            });
            $filteredArrayNameBrand = array_filter($data['nameBrand'], function($value) {
                return $value !== null;
            });
            if(count($filteredArrayImgBrand) && count($filteredArrayNameBrand)) $data['brands'] = array_map(null, $data['imgBrand'], $data['nameBrand']);

            $supplier = $this->supplierRepository->find($id);

            $supplier?->fill(array_merge($data, [
                'update_by' => auth()->id(),
                'is_top' => array_key_exists('is_top', $data)
            ]));

            $supplier?->save();
            $supplier?->slug()->delete();
            $supplier?->slug()->create(['content' => $this->slugService->generateSlug(Supplier::class, $supplier->name, $id)]);

            DB::commit();

            $request->session()->flash('success', 'Cập nhật nhà đầu tư thành công');

            return redirect()->route('admin.suppliers.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error update suppliers', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể cập nhật nhà đầu tư']])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int | string $id
     * @return RedirectResponse
     */
    public function destroy(int|string $id): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $this->supplierRepository->delete($id);

            DB::commit();

            session()->flash('success', 'Xóa nhà đầu tư thành công');

            return redirect()->route('admin.suppliers.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error delete post', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể xóa nhà đầu tư']])
                ->withInput();
        }
    }
}
