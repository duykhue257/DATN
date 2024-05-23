<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Products;
use App\Models\ProductVariants;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\ArrayInput;

class ChartController extends Controller
{
    //
    public function viewChart()
    {
        // $chart = Products::query()->with('category')->get()->groupBy('category_id');
        $ProductQty = ProductVariants::query()->count();
        $ProducutOrderqty = OrderDetail::sum('quantity');
       
        $OrderSuccess = OrderDetail::with('order.status_id')->whereHas('order', function ($query) {
            $query->where('status_id', 5);
        })->sum('quantity');

        $successOrderQty = number_format(($OrderSuccess / $ProducutOrderqty) * 100, 2);


        $total = Order::sum('total');
        $totalsum = intval($total);
        $ProducutOrdertotal = number_format($totalsum, 0, ',', '.');
        
        $ProductBestSeller = OrderDetail::groupBy('product_variant_id')->groupBy('name')->selectRaw("product_variant_id, name, sum(quantity) as Total ")->orderByDesc("Total")->limit(5)->get();
        $TopUser = Order::groupBy('user_id')->selectRaw("user_id, count(user_id) as UserCount ")->orderByDesc("UserCount")->limit(5)->whereNot('user_id')->with('user')->get();

        // dd($TopUser);
        return view('admin.partials.charts', compact('successOrderQty','ProductQty', 'ProductBestSeller', 'TopUser','ProducutOrderqty','ProducutOrdertotal'));
    }
    public function chart()
    {
        // $chart = Products::query()->get()->groupBy('category_id');
        $chart = Products::query()->with('category')->get()->groupBy('category_id');
        $lable = [];
        $data = [];
        // dd($chart);
        foreach ($chart as $c) {
            array_push($lable, $c[0]->category->name_cate);
            array_push($data, $c->count());

            // foreach($c as $ch){
            //     array_push($data,$ch->count());
            // }

        }
        return [$lable, $data];
    }
    public function doanhThu(Request $request)
    {
        // return $request->all();
        $type = $request->type;

        $result = [];
        switch ($type) {
            case 'day':

                # code...
                $lable = [[0, 4], [4, 8], [8, 12], [12, 16], [16, 20], [20, 24]];
                foreach ($lable as $lb) {
                    $startHour = $lb[0];
                    $endHour = $lb[1] - 1;
                    $Order = Order::query()->whereBetween('created_at', [
                        Carbon::today()->startOfHour()->addHours($startHour),
                        Carbon::today()->startOfHour()->addHours($endHour)->addMinutes(59)->addSeconds(59)
                    ])->get();
                    $total = $Order->reduce(function ($sum, $O) {
                        return $sum + $O->total;
                    }, 0);
                    $result['label'][] = $startHour . ':00' . '-' . $endHour . ':59';
                    $result['data'][] = $total;
                }

                break;
            case 'week':
                # code...
                $startOfWeek = Carbon::now()->startOfWeek();
                for ($i = 0; $i < 7; $i++) {
                    $startDay = $startOfWeek->copy()->addDays($i);
                    $endDay = $startDay->copy()->endOfDay();
                    $Order = Order::query()->whereBetween('created_at', [
                        $startDay, $endDay
                    ])->get();
                    $total = $Order->reduce(function ($sum, $O) {
                        return $sum + $O->total;
                    }, 0);
                    $result['label'][] = $startDay->toDateString();
                    $result['data'][] = $total;
                }
                break;
            case 'month':
                // $startOfMonth = Carbon::now()->startOfMonth();
                // $endOfMonth = Carbon::now()->endOfMonth();
                // $currentWeek = $startOfMonth->copy()->startOfWeek();

                // while ($currentWeek->lte($endOfMonth)) {
                //     $endOfWeek = $currentWeek->copy()->endOfWeek();
                //     $orders = Order::query()->whereBetween('created_at', [
                //         $currentWeek, $endOfWeek
                //     ])->get();
                //     $total = $orders->sum('total');
                //     $result['label'][] = $currentWeek->toDateString();
                //     $result['data'][] = $total;
                //     $currentWeek->addWeek();
                // }
                // break;


                $month = Carbon::now()->month;
                $startOfMonth = Carbon::today()->startOfMonth();
                $endOfMonth = Carbon::now()->endOfMonth();

                $startOfMonth = Carbon::now()->startOfMonth();
                $endOfMonth = Carbon::now()->endOfMonth();
                $currentWeek = $startOfMonth->copy()->startOfWeek();
                $labels = [
                    [1, 5],
                    [6, 10],
                    [11, 15],
                    [16, 20],
                    [21, 25],
                    [26, $endOfMonth->day],
                ];

                foreach ($labels as $label) {
                    $startDate = $startOfMonth->copy()->addDays($label[0] - 1);
                    $endDate = $startOfMonth->copy()->addDays($label[1])->endOfDay();
                    $orders = Order::query()->whereBetween('created_at', [
                        $startDate, $endDate
                    ])->get();
                    $total = $orders->sum('total');
                    $result['label'][] = $label[0] . "/$month" . " - " . $label[1] . "/$month";
                    $result['data'][] = $total;
                    $currentWeek->addWeek();
                }
                break;


            case 'year':
                $startOfYear = Carbon::now()->startOfYear();
                $endOfYear = Carbon::now()->endOfYear();
                $currentMonth = $startOfYear->copy()->startOfMonth();

                while ($currentMonth->lte($endOfYear)) {
                    $endOfMonth = $currentMonth->copy()->endOfMonth();
                    $orders = Order::query()->whereBetween('created_at', [
                        $currentMonth, $endOfMonth
                    ])->get();
                    $total = $orders->sum('total');
                    $result['label'][] = 'Tháng ' . $currentMonth->month;
                    $result['data'][] = $total;
                    $currentMonth->addMonth();
                }
                break;

            default:
                # code...
                break;
        }
        return $result;
    }

    public function donHang(Request $request)
    {
        // return $request->all();
        $type = $request->type;

        $result = [];
        switch ($type) {
            case 'day':

                # code...
                $lable = [[0, 4], [4, 8], [8, 12], [12, 16], [16, 20], [20, 24]];
                foreach ($lable as $lb) {
                    $startHour = $lb[0];
                    $endHour = $lb[1] - 1;
                    $Order = Order::query()->whereBetween('created_at', [
                        Carbon::today()->startOfHour()->addHours($startHour),
                        Carbon::today()->startOfHour()->addHours($endHour)->addMinutes(59)->addSeconds(59)
                    ])->count();

                    $result['label'][] = $startHour . ':00' . '-' . $endHour . ':59';
                    $result['data'][] = $Order;
                }

                break;
            case 'week':
                # code...
                $startOfWeek = Carbon::now()->startOfWeek();
                for ($i = 0; $i < 7; $i++) {
                    $startDay = $startOfWeek->copy()->addDays($i);
                    $endDay = $startDay->copy()->endOfDay();
                    $Order = Order::query()->whereBetween('created_at', [
                        $startDay, $endDay
                    ])->count();

                    $result['label'][] = $startDay->toDateString();
                    $result['data'][] = $Order;
                }
                break;
            case 'month':
                $month = Carbon::now()->month;
                $startOfMonth = Carbon::today()->startOfMonth();
                $endOfMonth = Carbon::now()->endOfMonth();

                $startOfMonth = Carbon::now()->startOfMonth();
                $endOfMonth = Carbon::now()->endOfMonth();
                $currentWeek = $startOfMonth->copy()->startOfWeek();
                $labels = [
                    [1, 5],
                    [6, 10],
                    [11, 15],
                    [16, 20],
                    [21, 25],
                    [26, $endOfMonth->day],
                ];

                foreach ($labels as $label) {
                    $startDate = $startOfMonth->copy()->addDays($label[0] - 1);
                    $endDate = $startOfMonth->copy()->addDays($label[1])->endOfDay();
                    $orders = Order::query()->whereBetween('created_at', [
                        $startDate, $endDate

                    ])->count();
                    $result['label'][] = $label[0] . "/$month" . " - " . $label[1] . "/$month";
                    $result['data'][] = $orders;
                    $currentWeek->addWeek();
                }

                // while ($currentWeek->lte($endOfMonth)) {
                //     $endOfWeek = $currentWeek->copy()->endOfWeek();
                //     $orders = Order::query()->whereBetween('created_at', [
                //         $currentWeek, $endOfWeek
                //     ])->count();

                //     $result['label'][] = $currentWeek->toDateString();
                //     $result['data'][] = $orders;
                //     $currentWeek->addWeek();
                // }
                break;


            case 'year':
                $startOfYear = Carbon::now()->startOfYear();
                $endOfYear = Carbon::now()->endOfYear();
                $currentMonth = $startOfYear->copy()->startOfMonth();

                while ($currentMonth->lte($endOfYear)) {
                    $endOfMonth = $currentMonth->copy()->endOfMonth();
                    $orders = Order::query()->whereBetween('created_at', [
                        $currentMonth, $endOfMonth
                    ])->count();

                    $result['label'][] = 'Tháng ' . $currentMonth->month;
                    $result['data'][] = $orders;
                    $currentMonth->addMonth();
                }
                break;

            default:
                # code...
                break;
        }
        return $result;
    }
}
