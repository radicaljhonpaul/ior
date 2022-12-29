<?php

namespace App\Http\Controllers;
use App\Models\ProductRegistrationComments;
use Illuminate\Http\Request;

class ProductRegistrationCommentsController extends Controller
{
    public function addDeclinedMessage(Request $request)
    {
        $request->validate([
            'comments' => 'required',
        ]);

        return ProductRegistrationComments::create($request->all());
    }

    public function getCommentsById($id)
    {
        return ProductRegistrationComments::join('users', 'users.id', '=', 'product_registration_comments.user_id')->join('product_registrations', 'product_registrations.id', '=', 'product_registration_comments.product_registration_id')->where('product_registrations.id',$id)->get(['product_registration_comments.*','users.fname','users.lname']);
    }
}
