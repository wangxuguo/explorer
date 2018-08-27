<?php
namespace App\Http\Controllers\Api\Network;

use App\Http\Controllers\Api\Controller;

use App\Modules\Network\Network;

class SupplyController extends Controller
{
	public function show()
	{
		$log = Network::latest()->first();

		return $this->response()->make([
			'supply' => $log ? $log->supply : 0,
		]);
	}

	public function raw()
	{
		$log = Network::latest()->first();

		return response($log ? $log->supply : 0, 200)->header('Content-Type', 'text/plain');
	}

	public function coinGeckoWithSeparators()
	{
		$log = Network::latest()->first();

		return response($log ? number_format($log->supply . '.000000000', 9, '.', ',') : '0.000000000', 200)->header('Content-Type', 'text/plain');
	}

	public function coinGeckoWithoutSeparators()
	{
		$log = Network::latest()->first();

		return response($log ? number_format($log->supply . '.000000000', 9, '', '') : '0.000000000', 200)->header('Content-Type', 'text/plain');
	}
}
