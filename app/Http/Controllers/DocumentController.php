<?php

namespace App\Http\Controllers;

use App\Http\Requests\Document\StoreRequest;
use App\Models\Document;
use App\Models\Product;
use App\Services\DocumentService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class DocumentController extends Controller
{
    /**
     * @param DocumentService $documentService
     */
    public function __construct(
        protected DocumentService $documentService,
    ) {}

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function index()
    {
        $documents = Document::all();
        return view('documents.index', compact('documents'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function create()
    {
        $products = Product::all();
        $types = Document::typeList();
        return view('documents.create', compact('types', 'products'));
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->documentService->create($data);
        return redirect()->route('documents.index');
    }

    /**
     * @param Document $document
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function show(Document $document)
    {
        return view('documents.show', compact('document'));
    }

    /**
     * @param Document $document
     * @return RedirectResponse
     */
    public function approve(Document $document)
    {
        $this->documentService->approve($document);
        return redirect()->route('documents.index');
    }
}
