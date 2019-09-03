<?php

namespace App\Http\Controllers;

use App\Package;
use App\Statement;
use App\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    /**
     * This is admin option page where admin can see
     * all available package has been created
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $packages = Package::all();
        return view('package.list', compact('packages'));

    }

    /**
     * Package page where user can see all
     * available packages to buy
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $packages = Package::all();
        return view('package.show', compact('packages'));
    }

    /**
     * Page where admin can crate new package
     *
     * @param $name
     * @return mixed
     */
    public function addIndex($name)
    {
        return view('package.add', compact('name'))->compileShortcodes();
    }

    /**
     * Edit a package
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $package = Package::find($id);


        return view('package.edit', compact('package', 'id'));
    }

    /**
     * Delete a package
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {

        Package::where('id', $id)
            ->delete();

        return redirect()
            ->back()
            ->withSuccess('Deleted package !');
    }

    /**
     * Crate a new package
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $request->validate([
            'package_name' => 'required',
            'package_description' => 'required',
            'package_price' => 'required',
            'duration' => 'required',
        ]);

        Package::create($request->all());

        return redirect()
            ->back()
            ->withSuccess('Package Created !');


    }

    /**
     * Update a package
     *
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request)
    {

        $request->validate([
            'package_name' => 'required',
            'package_description' => 'required',
            'package_price' => 'required',
            'duration' => 'required',
        ]);

        Package::where('id', $request->id)->update([
            'package_name' => $request->package_name,
            'package_description' => $request->package_description,
            'package_price' => $request->package_price,
            'duration' => $request->duration,
        ]);

        return redirect()
            ->back()
            ->withSuccess('Package updated');
    }


    /**
     * Buy Package page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function buyPackageIndex()
    {

        $packages = Package::all();

        return view('package.buy', compact('packages'));

    }

    /**
     *
     * Buy package action
     *
     * @param Request $request
     * @return $this
     */
    public function buyPackage(Request $request)
    {
        \Stripe\Stripe::setApiKey(get_settings('stripe_secret_key'));


        $token = $request->stripeToken;
        $package = Package::find($request->package_id);

        if ($package->package_price == 0) {

            // if package is free

            $arr = [
                'balance_transaction' => 'N/A',
                'receipt_url' => 'N/A',
                'amount' => 0,
            ];

            $charge = (object)$arr;
            $this->createStatement($request, $charge);
            $this->subscribe($request);

            return redirect()
                ->back()
                ->withSuccess('Package activated !');

        } else {

            // if package is not free

            $charge = \Stripe\Charge::create([
                'amount' => $package->package_price * 100,
                'currency' => 'usd',
                'description' => $package->package_description,
                'source' => $token,
            ]);

            if ($charge->status == 'succeeded') {

                $this->createStatement($request, $charge);
                $this->subscribe($request);

                return redirect()
                    ->back()
                    ->withSuccess('Package purchased !');

            } else {

                return redirect()
                    ->back()
                    ->withErrors('Sorry . Could not purchase the package');

            }
        }


    }


    /**
     * Crate statement after a successful
     * package purchase
     * @param $request
     * @param $charge
     */
    private function createStatement($request, $charge)
    {

        Statement::create([
            'userId' => Auth::id(),
            'package_id' => $request->package_id,
            'transaction_id' => $charge->balance_transaction,
            'receipt_url' => $charge->receipt_url,
            'amount' => $charge->amount / 100,
        ]);

    }

    /**
     *
     * Subscribe user to a package
     * @param $request
     */

    private function subscribe($request)
    {

        if (
        Subscription::where('userId', Auth::id())
            ->where('packageId', $request->package_id)
            ->exists()
        ) {

            $this->updateExistingSubscription($request);

        } else {

            $this->createSubscription($request);

        }

    }

    /**
     * Create subscription
     * @param $request
     */
    private function createSubscription($request)
    {
        $package = Package::find($request->package_id);
        $duration = $package->duration;
        $date = \Carbon\Carbon::today()->unix();
        $newDate = strtotime('+' . $duration . ' days', $date);

        $expireDate = \Carbon\Carbon::parse($newDate)->format('d-m-Y');

        Subscription::create([
            'userId' => Auth::id(),
            'packageId' => $request->package_id,
            'expire_date' => $expireDate,
            'plugin_name' => $package->plugin_name,
        ]);
    }

    /**
     * Update subscription
     * @param $request
     */
    private function updateExistingSubscription($request)
    {
        $package = Package::find($request->package_id);
        $duration = $package->duration;
        $currentSubscription = Subscription::where('userId', Auth::id())
            ->where('packageId', $request->package_id)
            ->first();


        $currentDate = Carbon::parse($currentSubscription->expire_date)->unix();

        $newDate = strtotime('+' . $duration . ' days', $currentDate);

        $expireDate = Carbon::parse($newDate)->format('d-m-Y');

        Subscription::where('userId', Auth::id())
            ->where('packageId', $request->package_id)
            ->update([
                'expire_date' => $expireDate
            ]);


    }

    /**
     * User's subscribed package
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userPackages()
    {

        $subscriptions = Subscription::where('userId', Auth::id())->get();
        return view('package.my', compact('subscriptions'));

    }
}
