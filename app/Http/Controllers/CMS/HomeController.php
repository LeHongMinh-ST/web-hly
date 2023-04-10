<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Models\Category;
use App\Models\Post;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Contact\ContactRepository;
use App\Repositories\Post\PostRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function Termwind\ValueObjects\isEmpty;

class HomeController extends Controller
{
    public function __construct(
        private PostRepository     $postRepository,
        private CategoryRepository $categoryRepository,
        private ContactRepository $contactRepository
    )
    {
    }
    public function index()
    {
        $posts = $this->postRepository->with('categories')->all();
        $featuredPosts = $this->postRepository->getFeaturedPosts(5);
        return view('cms.page.index')->with([
            'posts' => $posts,
            'featuredPosts' => $featuredPosts
        ]);
    }
    public function investors()
    {
        $posts = $this->postRepository->with('categories')->all();
        return view('cms.page.investor')->with([
            'posts'=>$posts
        ]);
    }

    public function postPage(Request $request)
    {
        if (!empty($request->input('category_id'))) {
            $posts = Post::whereHas('categories', function ($query) use ($request) {
                $query->where('category_id', $request->input('category_id'));
            })->with(['categories'])->paginate(5);
        } else {
            $posts = $this->postRepository->with(['categories', 'slug'])->paginate(7);
        }
        $categories = Category::where('status', 1)->orderBy('order')->get();

        return view('cms.page.news')->with([
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }

    public function createContact(StoreContactRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $this->contactRepository->create($data);

            DB::commit();
            $request->session()->flash('success', 'Gửi yêu cầu thành công');
            return redirect()->route('cms.contact');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error store contact', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể Gửi yêu cầu']])->withInput();
        }
    }
}
