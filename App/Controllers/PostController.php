<?php

namespace App\Controllers;

use Framework\Core\BaseController;
use Framework\Http\HttpException;
use Framework\Http\Request;
use Framework\Http\Responses\Response;
use App\Models\Post;

class PostController extends BaseController
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

        return $this->redirect($this->url('post.myposts'));
    }

    public function delete(Request $request): Response
    {
        $post = $this->findPost($request);
        $post->delete();

        $comments = $post->comments();
        foreach ($comments as $comment) {
            $comment->delete();
        }

        return $this->redirect($this->url('post.myposts'));
    }

    public function findPost(Request $request): Post
    {
        $post = Post::getOne((int) $request->value('id'));
        if ($post === null) {
            throw new HttpException(404, 'Príspevok sa nenašiel');
        }

        return $post;
    }

    public function detail(Request $request): Response
    {
        $post = $this->findPost($request);
        $comments = $post->comments();

        return $this->html([
            'post' => $post,
            'comments' => $comments,
        ]);
    }

    public function comment(Request $request): Response
    {
        $post = $this->findPost($request);
        $content = $request->post('content');

        if (!empty($content)) {
            $comment = new \App\Models\Comment();
            $comment->setPostId($post->getId());
            $comment->setUserId(1); // Replace with actual user ID from session or authentication
            $comment->setContent($content);
            $comment->save();
        }

        return $this->redirect($this->url('post.detail', ['id' => $post->getId()]));
    }

    public function editComment(Request $request): Response
    {
        $commentId = (int) $request->value('id');
        $comment = \App\Models\Comment::getOne($commentId);

        if ($comment === null) {
            throw new HttpException(404, 'Komentár sa nenašiel');
        }

        if ($request->isPost()) {
            $content = $request->post('content');
            if (!empty($content)) {
                $comment->setContent($content);
                $comment->save();
            }
            return $this->redirect($this->url('post.detail', ['id' => $comment->getPostId()]));
        }

        return $this->html([
            'comment' => $comment,
        ]);
    }

    public function deleteComment(Request $request): Response
    {
        $commentId = (int) $request->value('id');
        $comment = \App\Models\Comment::getOne($commentId);

        if ($comment === null) {
            throw new HttpException(404, 'Komentár sa nenašiel');
        }

        $postId = $comment->getPostId();
        $comment->delete();

        return $this->redirect($this->url('post.detail', ['id' => $postId]));
    }
}
