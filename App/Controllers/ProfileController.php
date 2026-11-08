<?php

namespace App\Controllers;

use Framework\Core\BaseController;
use Framework\Http\HttpException;
use Framework\Http\Request;
use Framework\Http\Responses\Response;
use App\Models\Post;

class ProfileController extends BaseController
{


    public function index(Request $request): Response
    {
        return $this->html();
    }

    /**
     * Summary of myposts
     * 
     * This action serves the main HTML view of the user's own posts page, where users can see their own posts and related information.
     * 
     * @return Response
     */
    public function myposts(Request $request): Response
    {
        $posts = Post::getAll();

        return $this->html([
            'posts' => $posts,
        ]);
    }

    public function add(Request $request): Response
    {
        return $this->html([
            'post' => new Post(),
        ]);
    }

    public function edit(Request $request): Response
    {
        return $this->html(['post' => $this->findPost($request)]);
    }

    public function save(Request $request): Response
    {
        $post = (int) $request->value('id') ? $this->findPost($request) : new Post();
        $data = $request->post();

        $post->setCategoryId((int) ($data['category_id'] ?? 1));
        $post->setTitle($data['title'] ?? '');
        $post->setDescription($data['description'] ?? '');
        $post->setLocation($data['location'] ?? '');
        $post->setDatePlanned($data['date_planned'] ?? '');
        $post->setCapacity($data['capacity'] !== '' ? (int) $data['capacity'] : 0);
        $post->setPhotoPath($data['photo_path'] ?? '');
        $post->setPrice($data['price'] !== '' ? (float) $data['price'] : null);
        $post->setDateUpdated(date('Y-m-d H:i:s'));

        $post->save();

        return $this->redirect($this->url('profile.myposts'));
    }

    public function delete(Request $request): Response
    {
        $post = $this->findPost($request);
        $post->delete();

        return $this->redirect($this->url('profile.myposts'));
    }

    public function findPost(Request $request): Post
    {
        $post = Post::getOne((int) $request->value('id'));
        if ($post === null) {
            throw new HttpException(404, 'Príspevok sa nenašiel');
        }

        return $post;
    }

}