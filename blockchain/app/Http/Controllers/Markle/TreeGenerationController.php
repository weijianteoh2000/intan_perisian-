<?php

namespace App\Http\Controllers\Markle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TreeGenerationController extends Controller
{

    public function buildMerkleTreeConcatenated($data)
    {

        // Return the root value of the Merkle tree
        return $tree[0];
    }

    public function index()
    {

        return view('advance.tree', compact('data', 'rootValue'));
    }
    public function genrateTree(Request $request)
    {
        return back()->withErrors(['Please enter a valid number']);
    }

    public function generateTreeView($treeNumber){

        return view('advance.tree', compact('data', 'rootValue'));
    }
}
