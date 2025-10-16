<?php

namespace App\Http\Controllers;
use App\Models\currencie;
use App\Models\CurrencySymbol;
use App\Models\newsAndTutorials;
use App\Models\Promotions;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    //
    public function currencies(Request $request): View
    {
         $currencies = currencie::orderBy('id', 'desc')->get();
         $currency_symbols = CurrencySymbol::get();

        return view('content.currencies',compact('currencies','currency_symbols'))
            ->with('i', ($request->input('page', 1) - 1) * 5);


            // $currencies = currencie::get();
            // dd($currencies);
            // return view('content.currency', compact('currencies'));

    }
    public function create(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:100',
        'code' => 'required|string|max:10|unique:currencies,code',
        'symbol' => 'required|string|max:10',
        'exchange_rate' => 'required|numeric',
        'status' => 'required|in:0,1',
    ]);

    currencie::create([
        'name' => $request->name,
        'code' => strtoupper($request->code),
        'symbol' => $request->symbol,
        'exchange_rate' => $request->exchange_rate,
        'status' => $request->status,
    ]);

    return redirect()->back()->with('success', 'Currency created successfully.');

    }
    public function edit(Request $request,$id)
    {
        $currencyedit = currencie::find($id);
         $currencies = currencie::latest()->paginate(5);

        return view('content.currencies',compact('currencies','currencyedit'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'symbol' => 'required|string|max:10',
            'code' => 'required|string|max:10',
            'exchange_rate' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        $currency = currencie::findOrFail($id);

        $currency->update($validated);

        return redirect()->back()->with('success', 'Currency updated successfully!');
    }
    public function delete($id)
    {
        $currency = currencie::findOrFail($id);
        $currency->delete();

        return redirect()->back()->with('success', 'Currency deleted successfully!');
    }

    // News and Tutorials
    public function news_and_tutorials(){
         $news = newsAndTutorials::orderBy('id', 'desc')->get();
        return view('content.news_and_tutorials',compact('news'));
    }
    public function create_news(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'required|string',
            'content' => 'required|string',
            'file_path'   => 'required|file|mimes:jpg,jpeg,png,pdf,docx,doc',
            'is_active'   => 'nullable|boolean',
        ]);


        $news = new newsAndTutorials();
        $news->title       = $request->title;
        $news->category    = $request->category;
        $news->content = $request->content;
        $news->is_active   = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('file_path')) {
        $file = $request->file('file_path');
        $path = $file->store('news_icon', 'public');
            $news->file_path = $path;
        }
        $news->save();

        return redirect()->back()->with('success', 'News created successfully.');
    }
     public function edit_news(Request $request)
        {
             $news = newsAndTutorials::whereRaw('MD5(id) = ?', [$request->id])
            ->first();
            // dd($role);
            if (!$news) {
                return redirect()->route('newsAndTutorials')->with('error', 'Role not found.');
            }

            return response()->json($news);
        }
       public function update_news(Request $request)
        {
            $validated = $request->validate([
                'title'       => 'required|string|max:255',
                'category'    => 'required|string',
                'content'     => 'required|string',
                'file_path'   => 'nullable|file|mimes:jpg,jpeg,png,pdf,docx,doc',
                'is_active'   => 'nullable|boolean',
            ]);

            try {
                $news = newsAndTutorials::whereRaw('MD5(id) = ?', [$request->news_id])->firstOrFail();

                $news->title     = $validated['title'];
                $news->category  = $validated['category'];
                $news->content   = $validated['content'];
                $news->is_active = $request->has('is_active') ? 1 : 0;

                if ($request->hasFile('file_path')) {


                    $file = $request->file('file_path');
                    $path = $file->store('news_icon', 'public');
                    $news->file_path = $path;
                }

                $news->save();

                return redirect()->back()->with('success', 'News updated successfully.');
            } catch (ModelNotFoundException $e) {
                return redirect()->back()->with('error', 'News not found or invalid ID.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Something went wrong. Please try again.');
            }
        }
        public function delete_news($id)
        {
        $news = newsAndTutorials::whereRaw('MD5(id) = ?', [$id])
        ->first();
        $news->delete();
        return redirect()->route('newsAndTutorials')->with('success', 'News Deleted successfully.');
       }
       public function events_and_promotion(){
         $promotions = Promotions::orderBy('id', 'desc')->get();
        return view('content.events_and_promotion', compact('promotions'));
       }
       public function create_promotion(Request $request)
        {
            // dd($request);
            $request->validate([
                'coupon_type'   => 'required|string|max:255',
                'coupon_code' => 'required|string|max:50|unique:promotions,coupon_code',
                'percentage'    => 'required|numeric|min:0|max:100',
                'expiry_date'   => 'required|date|after_or_equal:today',
                'file_path'     => 'required|file|mimes:jpg,jpeg,png,pdf',
                'is_active'     => 'required|boolean',
            ]);



            $promotion = new Promotions();
            $promotion->coupon_type = $request->coupon_type;
            $promotion->coupon_code = $request->coupon_code;
            $promotion->percentage = $request->percentage;
            $promotion->expiry_date = $request->expiry_date;
            if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $path = $file->store('promotions', 'public');
                $promotion->file_path = $path;
            }
            $promotion->is_active = $request->is_active;
            $promotion->save();

            return redirect()->back()->with('success', 'Promotion created successfully!');
        }
        public function edit_promotion(Request $request){
            $promotion = Promotions::whereRaw('MD5(id) = ?', [$request->id])
            ->first();
            // dd($role);
            if (!$promotion) {
                return redirect()->route('eventsAndPromotions')->with('error', 'Promotion not found.');
            }

            return response()->json($promotion);

        }
        public function update_promotion(Request $request)
        {
            try {
                $promotion = Promotions::whereRaw('MD5(id) = ?', [$request->promotion_id])->firstOrFail();

                $validated = $request->validate([
                    'coupon_type'   => 'required|string|max:255',
                    'coupon_code'   => 'required|string|max:50|unique:promotions,coupon_code,' . $promotion->id,
                    'percentage'    => 'required|numeric|min:0|max:100',
                    'expiry_date'   => 'required|date|after_or_equal:today',
                    'file_path'     => 'nullable|file|mimes:jpg,jpeg,png,pdf',
                    'is_active'     => 'required|boolean',
                ]);

                $promotion->coupon_type = $validated['coupon_type'];
                $promotion->coupon_code = $validated['coupon_code'];
                $promotion->percentage = $validated['percentage'];
                $promotion->expiry_date = $validated['expiry_date'];
                $promotion->is_active = $validated['is_active'];

                if ($request->hasFile('file_path')) {


                    $file = $request->file('file_path');
                    $path = $file->store('promotions', 'public');
                    $promotion->file_path = $path;
                }

                $promotion->save();

                return redirect()->back()->with('success', 'Promotion updated successfully.');
            } catch (ModelNotFoundException $e) {
                return redirect()->back()->with('error', 'Promotion not found or invalid ID.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Something went wrong. Please try again.');
            }
        }
        public function delete_promotion($id)
        {
        $promotion = Promotions::whereRaw('MD5(id) = ?', [$id])
        ->first();
        $promotion->delete();
        return redirect()->route('eventsAndPromotion')->with('success', 'Promotion Deleted successfully.');
       }





}
