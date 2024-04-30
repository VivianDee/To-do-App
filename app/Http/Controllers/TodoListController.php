<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListItem;

class TodoListController extends Controller
{
    public function index() {
        return view('welcome', ['listItems' => ListItem::where('is_complete', 0)->get(), 'completedItems' => ListItem::where('is_complete', 1)->get()]);
    }

    public function saveItem(Request $request) {
        // \Log::info(json_encode($request->all()));

        //Add the new list Item to the database
        $item = $request->listItem;

        if ($item) {
            $newListItem = new ListItem;
            $newListItem->name = $request->listItem;
            $newListItem->is_complete = 0;
            $newListItem->save();
        }


        return redirect('/');
    }

    public function markComplete($id) {
        
        // Get item with id and mark as complete
        $listItem = ListItem::find($id);
        $listItem->is_complete = 1;
        $listItem->save();
        return redirect('/');
    }

    public function delete($id) {
        $delete = ListItem::destroy($id);

        return redirect('/');
    }
}
