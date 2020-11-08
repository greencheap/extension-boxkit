<?php 
use GreenCheap\Application as App;
use GreenCheap\Blog\Model\Post;

$blog = App::module('blog');

$query = Post::query()->where(['status = :status', 'date < :date'], ['status' => Post::getStatus('STATUS_PUBLISHED'), 'date' => new \DateTime])->where(function ($query) {
    return $query->where('roles IS NULL')->whereInSet('roles', App::user()->roles, false, 'OR');
})->related('user');

if (!$limit = $blog->config('posts.posts_per_page')) {
    $limit = $options->limit;
}

$query->limit($limit)->orderBy('date', 'DESC');

$posts = [];

foreach($query->get() as $key => $post){
    $posts[$key] = [
        'title' => $post->title,
        'content' => App::content()->applyPlugins($post->excerpt, ['post' => $post, 'markdown' => $post->get('markdown')]),
        'link' => App::url('@blog/id', ['id' => $post->id ?: 0]),
        'link_text' => __('Read more'),
        'align' => 'left',
        'media' => $post->get('image.src')
    ];
}

return (object) $posts;
?>