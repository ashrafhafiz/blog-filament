<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAuthorAPIRequest;
use App\Http\Requests\API\UpdateAuthorAPIRequest;
use App\Models\Author;
use App\Repositories\AuthorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AuthorController
 * @package App\Http\Controllers\API
 */

class AuthorAPIController extends AppBaseController
{
    /** @var  AuthorRepository */
    private $authorRepository;

    public function __construct(AuthorRepository $authorRepo)
    {
        $this->authorRepository = $authorRepo;
    }

    /**
     * Display a listing of the Author.
     * GET|HEAD /authors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $authors = $this->authorRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($authors->toArray(), 'Authors retrieved successfully');
    }

    /**
     * Store a newly created Author in storage.
     * POST /authors
     *
     * @param CreateAuthorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAuthorAPIRequest $request)
    {
        $input = $request->all();

        $author = $this->authorRepository->create($input);

        return $this->sendResponse($author->toArray(), 'Author saved successfully');
    }

    /**
     * Display the specified Author.
     * GET|HEAD /authors/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Author $author */
        $author = $this->authorRepository->find($id);

        if (empty($author)) {
            return $this->sendError('Author not found');
        }

        return $this->sendResponse($author->toArray(), 'Author retrieved successfully');
    }

    /**
     * Update the specified Author in storage.
     * PUT/PATCH /authors/{id}
     *
     * @param int $id
     * @param UpdateAuthorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAuthorAPIRequest $request)
    {
        $input = $request->all();

        /** @var Author $author */
        $author = $this->authorRepository->find($id);

        if (empty($author)) {
            return $this->sendError('Author not found');
        }

        $author = $this->authorRepository->update($input, $id);

        return $this->sendResponse($author->toArray(), 'Author updated successfully');
    }

    /**
     * Remove the specified Author from storage.
     * DELETE /authors/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Author $author */
        $author = $this->authorRepository->find($id);

        if (empty($author)) {
            return $this->sendError('Author not found');
        }

        $author->delete();

        return $this->sendSuccess('Author deleted successfully');
    }
}
