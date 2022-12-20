<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Models\Question;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Section::with('user')->where('users_id', Auth::user()->id);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="inline-block border border-green-500 bg-green-500 text-white rounded-md px-4 py-1 m-1 font-semibold transition duration-500 ease select-none hover:bg-green-800 focus:outline-none focus:shadow-outline"
                            href="' . route('dashboard.section.question.create', $item->id) . '">
                            Add Question
                        </a>

                        <a class="inline-block border border-sky-500 bg-sky-500 text-white rounded-md px-4 py-1 m-1 font-semibold transition duration-500 ease select-none hover:bg-sky-800 focus:outline-none focus:shadow-outline"
                            href="' . route('dashboard.section.edit', $item->id) . '">
                            Edit
                        </a>

                        <a class="inline-block border border-amber-500 bg-amber-500 text-white rounded-md px-2 py-1 m-1 font-semibold transition duration-500 ease select-none hover:bg-amber-800 focus:outline-none focus:shadow-outline"
                            href="' . route('dashboard.section.show', $item->id) . '">
                            Show
                        </a>

                        <form class="inline-block" action="' . route('dashboard.section.destroy', $item->id) . '" method="POST">
                            <button class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-1 font-semibold transition duration-500 ease select-none hover:bg-red-800 focus:outline-none focus:shadow-outline" >
                                Delete
                            </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>
                    ';
                })
                ->editColumn('is_active', function ($item) {
                    return $item->is_active == 1 ? 'Yes' : 'No';
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.section.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.section.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionRequest $request)
    {
        $data = $request->all();
        $data['users_id'] = Auth::user()->id;

        Section::create($data);

        // alert
        alert()->success('Successfully Created', 'Section created successfully!');

        return redirect()->route('dashboard.section.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section, User $user)
    {

        if (request()->ajax()) {
            $query = Question::where('sections_id', $section->id);

            return DataTables::of($query)

                ->addColumn('action', function ($item) {
                    return '
                        <a class="inline-block border border-amber-500 bg-amber-500 text-white rounded-md px-2 py-1 m-1 font-semibold transition duration-500 ease select-none hover:bg-amber-800 focus:outline-none focus:shadow-outline"
                            href="' . route('dashboard.question.show', $item->id) . '">
                            Show
                        </a>

                        <form class="inline-block" action="' . route('dashboard.question.destroy', $item->id) . '" method="POST">
                            <button class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-1 font-semibold transition duration-500 ease select-none hover:bg-red-800 focus:outline-none focus:shadow-outline" >
                                Delete
                            </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>
                    ';
                })
                // ->addIndexColumn()
                ->rawColumns(['action'])
                ->make();
        }
        // return view('pages.section.index');
        return view('pages.section.show', compact('section', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        return view('pages.section.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(SectionRequest $request, Section $section)
    {
        $data = $request->all();

        $section->update($data);

        // alert
        alert()->success('Successfully Updated', 'Section updated successfully!');

        return redirect()->route('dashboard.section.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $section->delete();

        // alert
        alert()->success('Successfully Deleted', 'Section deleted successfully!');

        return redirect()->route('dashboard.section.index');
    }
}
