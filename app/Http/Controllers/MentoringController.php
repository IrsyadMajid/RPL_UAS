<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MentoringController extends Controller
{
    public function mentoring1()
    {
        return view('mentoring.mentoring1');
    }

    public function mentoring2()
    {
        return view('mentoring.mentoring2');
    }

    public function mentoringC()
    {
        return view('mentoring.mentoringC');
    }

    public function mentoringD()
    {
        return view('mentoring.mentoringD');
    }

    public function mentoringDraft()
    {
        return view('mentoring.mentoringDraft');
    }

    public function mentoringDraft1()
    {
        return view('mentoring.mentoringDraft1');
    }
}
