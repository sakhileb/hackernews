<?php

namespace App\Http\Controllers;

use DB;
use App\Models\News;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class HackerNewsController extends Controller {

	private $types;

	public function __construct(){
		$this->types = array(
			'top',
			'ask',
			'job',
			'new',
			'show'
		);
	}


	public function show($type = 'top'){

		$items = DB::table('items')
			->where('is_' . $type, true)
			->paginate(9);

		$page_data = array(
			'title' => $type,
			'types' => $this->types,
			'items' => $items
		);

		return view('show', $page_data);
	}

	public function read(Request  $request, $id)
	{
		$id_from_db = $id;

		$client = new Client(array(
			'base_uri' => 'https://hacker-news.firebaseio.com'
		));

		$item_res = $client->get("/v0/item/" . $id . ".json");
		$item_data = json_decode($item_res->getBody(), true);

		$content = array(
			"by" => $item_data['by'],
  			"descendants" => $item_data['descendants'],
  			"id" => $item_data['id'],
  			"kids" => $item_data['kids'],
  			"score" => $item_data['score'],
  			"time" => $item_data['time'],
  			"title" => $item_data['title'],
  			"type" => $item_data['type'],
  			"url" => $item_data['url']
		);

		$kids = [];

		foreach ($content['kids'] as $kids) {
			$item_result = $client->get("/v0/item/" . $kids . ".json");
			$item_comment[] = json_decode($item_result->getBody(), true);

			//insert into database
			// DB::table('comments')
			
		}
		$keys = array_keys($item_comment);		// return array
		$values = array_values($item_comment);

		// dd($values);

		$page_read_data = array(
			'page_content' => $content,
			'page_comments' => array_values($item_comment)
		);

		return view('read', $page_read_data);
	}

}


