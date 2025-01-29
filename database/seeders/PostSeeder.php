<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'cover' => 'cover1.jpg',
                'title' => 'Introduction to Vue.js',
                'content' => "### Introduction to Vue.js\n\nVue.js is a progressive JavaScript framework for building user interfaces.\n\n```javascript\nconst app = Vue.createApp({\n    data() {\n        return {\n            message: 'Hello Vue!'\n        };\n    }\n});\napp.mount('#app');\n```",
                'publish' => 1,
                'user_id' => 2,
            ],
            [
                'cover' => 'cover2.jpg',
                'title' => 'Getting Started with Laravel',
                'content' => "### Getting Started with Laravel\n\nLaravel is a web application framework with expressive syntax.\n\n```php\nRoute::get('/', function () {\n    return view('welcome');\n});\n```",
                'publish' => 1,
                'user_id' => 2,
            ],
            [
                'cover' => 'cover3.jpg',
                'title' => 'Mastering PHP for Web Development',
                'content' => "### Mastering PHP for Web Development\n\nPHP is a popular general-purpose scripting language for web development.\n\n```php\n<?php\necho 'Hello, World!';\n?>\n```",
                'publish' => 1,
                'user_id' => 1,
            ],
            [
                'cover' => 'cover4.jpg',
                'title' => 'Building Single Page Applications with Vue.js',
                'content' => "### Building Single Page Applications with Vue.js\n\nSingle Page Applications (SPAs) are web applications that load a single HTML page.\n\n```javascript\nconst router = VueRouter.createRouter({\n    history: VueRouter.createWebHistory(),\n    routes: [\n        { path: '/', component: Home },\n        { path: '/about', component: About }\n    ]\n});\n```",
                'publish' => 1,
                'user_id' => 1,
            ],
            [
                'cover' => 'cover5.jpg',
                'title' => 'Advanced Laravel Techniques',
                'content' => "### Advanced Laravel Techniques\n\nLaravel offers a variety of advanced features for developers.\n\n```php\nArtisan::command('make:custom', function () {\n    ('Custom Artisan Command Created!');\n});\n```",
                'publish' => 1,
                'user_id' => 1,
            ],
            [
                'cover' => 'cover6.jpg',
                'title' => 'PHP Best Practices',
                'content' => "### PHP Best Practices\n\nWriting clean and efficient PHP code is essential.\n\n```php\nfunction sanitizeInput(data) {\n    return htmlspecialchars(stripslashes(trim(data)));\n}\n```",
                'publish' => 0,
                'user_id' => 2,
            ],
            [
                'cover' => 'cover7.jpg',
                'title' => 'State Management in Vue.js',
                'content' => "### State Management in Vue.js\n\nManaging state in Vue.js applications can be done using Vuex or Pinia.\n\n```javascript\nconst store = createStore({\n    state() {\n        return { count: 0 };\n    },\n    mutations: {\n        increment(state) {\n            state.count++;\n        }\n    }\n});\n```",
                'publish' => 0,
                'user_id' => 2,
            ],
            [
                'cover' => 'cover8.jpg',
                'title' => 'Laravel Eloquent ORM',
                'content' => "### Laravel Eloquent ORM\n\nEloquent ORM provides a simple ActiveRecord implementation.```",
                'publish' => 1,
                'user_id' => 2,
            ],
            [
                'cover' => 'cover9.jpg',
                'title' => 'PHP and MySQL Integration',
                'content' => "### PHP and MySQL Integration\n\nPHP and MySQL are a powerful combination for building web applications.\n\n```php = new mysqli('localhost', 'username', 'password', 'database');\nif  {\n    die('Connection failed: ' .);\n}\n```",
                'publish' => 1,
                'user_id' => 2,
            ],
            [
                'cover' => 'cover10.jpg',
                'title' => 'Vue.js Component Communication',
                'content' => "### Vue.js Component Communication\n\nComponents in Vue.js can communicate using props and events.\n\n```javascript\napp.component('child', {\n    props: ['message'],\n    template: `<p>{{ message }}</p>`\n});\n```",
                'publish' => 0,
                'user_id' => 2,
            ],
        ];


        foreach ($posts as $post) {
            Post::create([
                'cover' => $post['cover'],
                'title' => $post['title'],
                'content' => $post['content'],
                'publish' => $post['publish'],
                'user_id' => $post['user_id'],
            ]);
        }
    }
}
