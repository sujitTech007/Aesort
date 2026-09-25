<?php



namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Blog;

use Illuminate\Http\Request;



class PagesController extends Controller

{

    // Simple helper to return a view with current page name

    protected function view(string $name, array $data = [])

    {

        $data['currentPage'] = $data['currentPage'] ?? $name;

        $data['pageTitle'] = $data['pageTitle'] ?? ucfirst($name) . ' - Aesort';

        return view($name, $data);

    }



    public function home()

    {

        return $this->view('index', ['currentPage' => 'home']);

    }



    public function about()

    {

        return $this->view('about', ['currentPage' => 'about']);

    }
    
    public function cookiesPolicy()

    {

        return $this->view('cookies-policy', ['currentPage' => 'cookies.policy']);

    }



    public function services()
    {
        $services = Service::where('status', 1)->get();
    
        return view('services', [
            'services' => $services,
            'currentPage' => 'services'
        ]);
    }
    
    public function warranty()

    {

        return $this->view('warranty', ['currentPage' => 'warranty']);

    }
    
    public function supportPage()

    {

        return $this->view('support', ['currentPage' => 'support']);

    }
    
    public function damagePolicy()

    {

        return $this->view('damage-policy', ['currentPage' => 'damage.policy']);

    }



           public function serviceDetail($slug)
        {
            $service = Service::where('slug', $slug)
                              ->where('status', 1)
                              ->firstOrFail();
        
            return view('service-detail', [
                'service' => $service,
                'currentPage' => 'services'
            ]);
        }
    
    public function faqs()

    {

        return $this->view('faqs', ['currentPage' => 'faqs']);

    }



    public function blog()

    {
        $blogs = Blog::where('status', 1)->orderBy('created_at', 'desc')->get();
        return $this->view('blog', ['currentPage' => 'blog', 'blogs' => $blogs]);
    }



    public function blogDetail($id)

    {
        $blog = Blog::findOrFail($id);
        $relatedBlogs = Blog::where('id', '!=', $id)->take(3)->get(); 
        return $this->view('blog-detail', ['currentPage' => 'blog', 'blog' => $blog, 'relatedBlogs' => $relatedBlogs]);

    }



    public function contact()

    {

        return $this->view('contact', ['currentPage' => 'contact']);

    }



    public function subscription()

    {

        return $this->view('subscription', ['currentPage' => 'subscription']);

    }



    public function login()

    {

        return $this->view('auth.login', ['currentPage' => 'login']);

    }



    public function signup()

    {

        return $this->view('auth.signup', ['currentPage' => 'signup']);

    }
    
    public function requestDemo()
{
    return $this->view('request-a-demo', [
        'currentPage' => 'request-demo'
    ]);
}

    public function termsConditions()

    {

        return $this->view('terms-conditions', ['currentPage' => 'terms.conditions']);

    }
    public function privacyPolicy()

    {

        return $this->view('privacy-policy', ['currentPage' => 'privacy.policy']);

    }

}

