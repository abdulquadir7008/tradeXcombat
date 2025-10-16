<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Combattypes;
use App\Models\Playersvs;
use App\Models\Colors;
use App\Models\CommissionLevels;
use App\Models\referralprogram;
use App\Models\timeslot;
use App\Models\Tournaments;
use App\Models\UsdtAccounts;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class MasterController extends Controller
{
	/*Combat Functions Start here */
    public function combattypes(Request $request): View
    {
        $comatedit = array();
		$combat = Combattypes::orderBy('id', 'desc')->get();
        return view('masters.combattypes',compact('combat', 'comatedit'));
    }

    public function storecombat(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|unique:combat_types,name',
            'icon' => 'required',
            'is_active' => 'required'
        ]);

		$uploadPath = public_path('uploads/combaticon');
		if (!file_exists($uploadPath)) {
			mkdir($uploadPath, 0755, true);
		}
		$imageName = '';
		if (!empty($request->file('icon'))) {
			$imageName = time() . '_combat.' . $request->icon->extension();
			$request->icon->move($uploadPath, $imageName);
		}

		$combat     = new Combattypes();
		$notification = 'Combat type created successfully';

		$combat->name  = $request->name;
		$combat->icon  = $imageName;
		$combat->is_active  = $request->is_active;
		$combat->save();
        return redirect()->route('combattypes')->with('success',$notification);
    }

    public function editcombat($id): View
    {
        $comatedit = Combattypes::find($id);
        $combat = Combattypes::orderBy('id', 'desc')->get();

        return view('masters.combattypes',compact('comatedit','combat'));
    }

	public function storeeditcombat(Request $request, $id = 0): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'is_active' => 'required'
        ]);

		$uploadPath = public_path('uploads/combaticon');
		if (!file_exists($uploadPath)) {
			mkdir($uploadPath, 0755, true);
		}
		$combat = Combattypes::findOrFail($id);
		$notification = 'Combat type updated successfully';

		if (!empty($request->file('icon'))) {
			$imageName = time() . '_combat.' . $request->icon->extension();
			$request->icon->move($uploadPath, $imageName);
			$combat->icon  = $imageName;
		}
		$combat->name  = $request->name;
		$combat->is_active  = $request->is_active;
		$combat->save();
        return redirect()->route('combattypes')->with('success',$notification);
    }
	/*Combat Functions End here */

	/*Players VS function start here*/
	public function playersvs(Request $request): View
    {
        $playervsedit = array();
		$playervs = Playersvs::with('combatType','color')->orderBy('id', 'desc')->get();
		$combat = Combattypes::orderBy('id', 'desc')->get();
		$colors = Colors::orderBy('id', 'desc')->get();
        return view('masters.playervs', compact('combat', 'playervs', 'playervsedit', 'colors'));
    }

	public function storeplayer(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'combat_id' => 'required',
            'vsname' => 'required',
            'textcolor' => 'required',
            'is_active' => 'required'
        ]);

		$playvs     = new Playersvs();
		$notification = 'Player VS created successfully';

		$playvs->combat_id  = $request->combat_id;
		$playvs->vsname  = $request->vsname;
		$playvs->textcolor  = $request->textcolor;
		$playvs->is_active  = $request->is_active;
		$playvs->save();
        return redirect()->route('playersvs')->with('success', $notification);
    }

	public function editplayervs($id): View
    {
        $playervsedit = Playersvs::find($id);
        $playervs = Playersvs::orderBy('id', 'desc')->get();
		$combat = Combattypes::orderBy('id', 'desc')->get();
		$colors = Colors::orderBy('id', 'desc')->get();
        return view('masters.playervs', compact('combat', 'playervs', 'playervsedit', 'colors'));
    }

	public function storeplayeredit(Request $request, $id=0): RedirectResponse
    {
        $this->validate($request, [
            'combat_id' => 'required',
            'vsname' => 'required',
            'textcolor' => 'required',
            'is_active' => 'required'
        ]);

		$playvs     = Playersvs::findOrFail($id);
		$notification = 'Player VS Updated successfully';

		$playvs->combat_id  = $request->combat_id;
		$playvs->vsname  = $request->vsname;
		$playvs->textcolor  = $request->textcolor;
		$playvs->is_active  = $request->is_active;
		$playvs->save();
        return redirect()->route('playersvs')->with('success', $notification);
    }
	/*Players VS function End here*/

	/*Tournament here Start here*/
	public function tournaments(Request $request): View
    {
        $tournaedit = array();
		$combat = Combattypes::orderBy('id', 'desc')->get();
		$tournament = Tournaments::with('combat','color')->orderBy('id', 'desc')->get();
        // dd($tournament);
		$colors = Colors::orderBy('id', 'desc')->get();
        return view('masters.tournaments',compact('combat', 'tournaedit', 'tournament', 'colors'));
    }

	public function storetournament(Request $request): RedirectResponse
    {

		$this->validate($request, [
            'combat_id' => 'required',
            'title' => 'required',
            'tournatype' => 'required',
            'bgcolor' => 'required',
            'is_active' => 'required'
        ]);


		// $uploadPath = public_path('uploads/tournament');
		// if (!file_exists($uploadPath)) {
		// 	mkdir($uploadPath, 0755, true);
		// }
		// $imageName = '';
		// if (!empty($request->file('icon'))) {
		// 	$imageName = time() . '_tourna.' . $request->icon->extension();
		// 	$request->icon->move($uploadPath, $imageName);
		// }

        $imageName = '';

        if ($request->hasFile('icon')) {
            $image = $request->file('icon');

            $path = $image->store('tournament', 'public');

            $imageName = $path;
        }

		$tourna     = new Tournaments();
		$notification = 'Tournaments created successfully';

		$tourna->combat_id  = $request->combat_id;
		$tourna->title  = $request->title;
		$tourna->totalplayer  = $request->totalplayer;
		$tourna->tournatype  = $request->tournatype;
		$tourna->bgcolor  = $request->bgcolor;
		$tourna->startdate  = $request->startdate;
		$tourna->enddate  = $request->enddate;
		$tourna->icon  = $imageName;
		$tourna->is_active  = $request->is_active;
		$tourna->save();
        return redirect()->route('tournaments')->with('success', $notification);
	}

	public function edittournament($id): View
    {
		$tournaedit = Tournaments::find($id);
		$combat = Combattypes::orderBy('id', 'desc')->get();
		$tournament = Tournaments::orderBy('id', 'desc')->get();
		$colors = Colors::orderBy('id', 'desc')->get();
        return view('masters.tournaments',compact('combat', 'tournaedit', 'tournament', 'colors'));
	}

	public function storetournamentedit(Request $request, $id=0): RedirectResponse
    {
            $this->validate($request, [
            'combat_id' => 'required',
            'title' => 'required',
            'tournatype' => 'required',
            'bgcolor' => 'required',
            'is_active' => 'required'
        ]);

        $tourna = Tournaments::whereRaw('MD5(id) = ?', [$id])->first();

        // $uploadPath = public_path('uploads/tournament');

        // if (!file_exists($uploadPath)) {
        //     mkdir($uploadPath, 0755, true);
        // }

       if ($request->hasFile('icon')) {
        $image = $request->file('icon');

        $path = $image->store('tournament', 'public');

        $tourna->icon = $path;
    }

        $tourna->combat_id = $request->combat_id;
        $tourna->title = $request->title;
        $tourna->totalplayer = $request->totalplayer;
        $tourna->tournatype = $request->tournatype;
        $tourna->bgcolor = $request->bgcolor;
        $tourna->startdate = $request->startdate;
        $tourna->enddate = $request->enddate;
        $tourna->is_active = $request->is_active;

        $tourna->save();

        return redirect()->route('tournaments')->with('success', 'Tournament updated successfully');


	}
     public function usdt_accounts(Request $request): View
    {
        //  $accounts = UsdtAccounts::latest()->paginate(5);
        $accounts = UsdtAccounts::orderBy('id', 'desc')->paginate(5);
        // dd($accounts);

        return view('masters.usdt_accounts',compact('accounts'))
            ->with('i', ($request->input('page', 1) - 1) * 5);


    }
    public function store_usdt(Request $request){
        $request->validate([
            'name' => [
            'required',
            'string',
            'max:100',
            'regex:/^(?=.*[a-zA-Z])[a-zA-Z0-9\s]+$/',
             'unique:usdt_accounts,name'
        ],
        'conversion_rate' => 'required|numeric',
        'status' => 'required|in:0,1',
    ]);

    UsdtAccounts::create([
        'name' => $request->name,
        'conversion_rate' => $request->conversion_rate,
        'status' => $request->status,
    ]);

    return redirect()->back()->with('success', 'USDT Account created successfully.');
    }

    public function edit_usdt(Request $request, $id)
    {
        $usdtedit = UsdtAccounts::find($id);
        $accounts = UsdtAccounts::latest()->paginate(5);

        return view('masters.usdt_accounts', compact('accounts', 'usdtedit'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function update_usdt(Request $request, $id)
    {
        // dd($id);
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                'regex:/^(?=.*[a-zA-Z])[a-zA-Z0-9\s]+$/',
                // 'unique:usdt_accounts,name,' . $id . ',id'
                Rule::unique('usdt_accounts', 'name')->ignore($id, 'id'),
            ],
            'conversion_rate' => 'required|numeric',
            'status' => 'required|in:0,1',
        ]);

        $account = UsdtAccounts::findOrFail($id);

        $account->update([
            'name' => $request->name,
            'conversion_rate' => $request->conversion_rate,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'USDT Account updated successfully.');
    }
    public function delete_usdt($id)
    {
        $account = UsdtAccounts::findOrFail($id);
        $account->delete();

        return redirect()->back()->with('success', 'Usdt account successfully!');
    }
    public function refer_and_earn(){
        $programs = referralprogram::orderBy('id', 'desc')->get();
        $levels = CommissionLevels::orderBy('id', 'desc')->get();
        return view('players.refer_and_earn',compact('programs','levels'));
    }
    public function create_program(Request $request){
        // dd($request);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'share_person' => 'required|integer|min:1',
            'giveaway' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'required|in:0,1',
            'referral_type' => 'required|string|max:255',
        ]);

        $program = referralprogram::create([
            'name' => $validated['name'],
            'share_person' => $validated['share_person'],
            'giveaway' => $validated['giveaway'],
            'description' => $validated['description'],
            'is_active' => $validated['is_active'],
            'referral_type' => $validated['referral_type']
        ]);
        if($program){
        return redirect()->back()->with('success', 'Referral program created successfully!');

        }

        }
        public function edit_program(Request $request){
             $program = referralprogram::whereRaw('MD5(id) = ?', [$request->id])
            ->first();
            // dd($role);
            if (!$program) {
                return redirect()->route('referAndEarn')->with('error', 'Role not found.');
            }

            return response()->json($program);
        }

       public function update_program(Request $request)
        {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'share_person' => 'required|integer|min:1',
                'giveaway' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
                'is_active' => 'required|in:0,1',
                'referral_type' => 'required|string|max:255',
            ]);

            try {
                $program = referralprogram::whereRaw('MD5(id) = ?', [$request->program_id])->firstOrFail();

                $program->update($validated);

                return redirect()->route('referAndEarn')->with('success', 'Referral Program updated successfully!');
            } catch (ModelNotFoundException $e) {
                return redirect()->back()->with('error', 'Referral Program not found or invalid ID.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Something went wrong.'. $e->getMessage());
            }
        }
        public function delete_program($id)
        {
        $program = referralprogram::whereRaw('MD5(id) = ?', [$id])
        ->first();
        $program->delete();
        return redirect()->route('referAndEarn')->with('success', 'Referral Program Deleted successfully.');
       }
       public function createCommissionLevel(Request $request){

        $validated = $request->validate([
              'level' => 'required|integer|min:1|unique:commission_levels,level',
        'commission_rate' => 'required|numeric|min:0|max:100|unique:commission_levels,commission_rate',
        ]);

        CommissionLevels::create([
            'level' => $validated['level'],
            'commission_rate' => $validated['commission_rate'],
        ]);

        return redirect()->back()->with('success', 'Commission level added successfully.');
        }
        public function delete_level($id)
        {
        $level = CommissionLevels::whereRaw('MD5(id) = ?', [$id])
        ->first();
        $level->delete();
        return redirect()->route('referAndEarn')->with('success', 'CommissionLevel Deleted successfully.');
       }
       public function edit_level(Request $request){
             $level = CommissionLevels::whereRaw('MD5(id) = ?', [$request->id])
            ->first();
            if (!$level) {
                return redirect()->route('referAndEarn')->with('error', 'Level not found.');
            }

            return response()->json($level);
        }
     public function update_level(Request $request)
    {
        $level = CommissionLevels::whereRaw('MD5(id) = ?', [$request->level_id])->firstOrFail();

        $validated = $request->validate([
            'level' => 'required|integer|min:1|unique:commission_levels,level,' . $level->id,
            'commission_rate' => 'required|numeric|min:0|max:100|unique:commission_levels,commission_rate,' . $level->id,
        ]);

        $level->update($validated);

        return redirect()->route('referAndEarn')->with('success', 'Commission Level updated successfully!');
    }


    // Timeslot
    public function time_slots(){


		$timeslot = timeslot::with('combatType')->orderBy('id', 'desc')->get();
        $combatTypes = Combattypes::orderBy('id', 'desc')->get();
        return view('masters.timeslot',compact('timeslot','combatTypes'));

    }

    public function create_timeslot(Request $request){
        // dd($request);

        $validated = $request->validate([
        'combat_id' => 'required|exists:combat_types,id',
        'timeslot' => 'required|integer|min:1',
        'duration' => 'required|string',
        'is_active' => 'required|boolean',
        ]);

        TimeSlot::create($validated);

        return redirect()->back()->with('success', 'Time slot created successfully!');
    }
      public function edit_timeslot($id): View
    {
        $slotedit = timeslot::find($id);
        $timeslot = timeslot::with('combatType')->orderBy('id', 'desc')->get();
        $combatTypes = Combattypes::orderBy('id', 'desc')->get();

        return view('masters.timeslot',compact('slotedit','timeslot','combatTypes'));
    }
    public function storeeditslot(Request $request, $id)
    {
        $validated = $request->validate([
            'combat_id' => 'required|exists:combat_types,id',
            'timeslot' => 'required|integer|min:1',
            'duration' => 'required|string',
            'is_active' => 'required|boolean',
        ]);

        $timeslot = TimeSlot::findOrFail($id);
        $timeslot->update($validated);

        return redirect()->back()->with('success', 'Time slot updated successfully!');

    }





}
