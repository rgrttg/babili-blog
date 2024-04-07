<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $author = User::create([
            'name' => 'Hans Mustermann',
            'email' => 'test@opportunity-zuerich.ch',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
        $json = [
            [
                "type" => "subheader",
                "value" => "Lorem Ipsum"
            ],
            [
                "type" => "paragraph",
                "value" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac fermentum tortor. Fusce vestibulum sem sed ipsum rutrum, vel feugiat tellus mollis. Nullam et sollicitudin mauris. Mauris aliquam euismod urna vitae elementum. Phasellus non sollicitudin nisi, ut tempus nunc. Praesent at ex sit amet libero accumsan efficitur."
            ],
            [
                "type" => "paragraph",
                "value" => "Proin fermentum ultricies ex, vel facilisis dolor ultricies in. Nulla facilisi. Nam ac augue ac est hendrerit auctor vel eu mauris. In hac habitasse platea dictumst. Suspendisse potenti. Nulla facilisi. Maecenas dignissim neque in tortor ullamcorper, in venenatis risus ultricies. Ut non sagittis purus."
            ],
            [
                "type" => "paragraph",
                "value" => "Fusce non velit sed libero vestibulum consequat. Duis ullamcorper, mauris sit amet ultricies rhoncus, magna justo dignissim mauris, at pellentesque justo elit nec libero. Sed eleifend metus eget convallis vehicula. Fusce pulvinar, lorem vitae tincidunt aliquam, lectus sem sodales urna, ac tempor nunc lorem ut justo. Sed id convallis elit."
            ],
            [
                "type" => "paragraph",
                "value" => "Vivamus congue magna sed diam iaculis, at molestie metus efficitur. Vivamus gravida auctor libero, in vehicula arcu consectetur sit amet. Nam congue tincidunt tortor, eu convallis neque venenatis nec. Fusce a tincidunt ligula. Maecenas tincidunt, ligula eu volutpat sodales, urna tellus rutrum tortor, nec posuere ligula metus in ex. Ut non justo quis justo finibus placerat ut ac lorem. Sed gravida ligula a arcu tempus, vitae suscipit orci semper."
            ],
            [
                "type" => "subheader",
                "value" => "Suspendisse Potenti"
            ],
            [
                "type" => "paragraph",
                "value" => "Suspendisse potenti. Cras auctor mauris auctor velit suscipit, eget rutrum enim blandit. Nulla vitae justo vel nisi fermentum blandit. Fusce sodales posuere libero eget maximus. Donec at efficitur metus. Sed finibus quam ut dui iaculis, nec eleifend enim sollicitudin. Ut ac turpis ac velit pretium eleifend. Suspendisse potenti."
            ],
            [
                "type" => "paragraph",
                "value" => "Vivamus ut massa vitae urna aliquam finibus. Integer interdum sem nec risus facilisis, at condimentum ipsum malesuada. Vestibulum dignissim lacus eget turpis malesuada feugiat. Maecenas tristique quam eget sapien lacinia malesuada. Vestibulum tristique libero eu diam volutpat, sit amet tincidunt urna lobortis. Fusce faucibus diam eu libero ultrices, ut faucibus nisi elementum. Nullam efficitur interdum odio, a rutrum lectus hendrerit sit amet."
            ]
        ];


        $blogs = [
            [
                'user_id' => $author->id,
                'title' => 'Sample Blog 1',
                'blog_image' => null,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat voluptatibus facilis doloremque eligendi obcaecati, quidem voluptatem enim voluptate quas corporis. Accusantium nihil quod sunt autem voluptas ratione exercitationem ut odit!',
                'content' => $json,                
                'published' => true,
                'published_at' => now()->subDays(2),
                'interactions' => 0,
                'created_at' => now()->subDays(4),
                'updated_at' => now()->subDays(3),
            ],
            [
                'user_id' => $author->id,
                'title' => 'Sample Blog 2',
                'blog_image' => null,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat voluptatibus facilis doloremque eligendi obcaecati, quidem voluptatem enim voluptate quas corporis. Accusantium nihil quod sunt autem voluptas ratione exercitationem ut odit!',
                'content' => $json,
                'published' => true,
                'published_at' => now()->subDay(25),
                'interactions' => 26,
                'created_at' => now()->subDay(28),
                'updated_at' => now()->subDay(26),
            ],
            [
                'user_id' => $author->id,
                'title' => 'Sample Blog 3',
                'blog_image' => null,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat voluptatibus facilis doloremque eligendi obcaecati, quidem voluptatem enim voluptate quas corporis. Accusantium nihil quod sunt autem voluptas ratione exercitationem ut odit!',
                'content' => $json,
                'published' => true,
                'published_at' => now(),
                'interactions' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($blogs as $blog) {
            $blogModel = Blog::create($blog);

            $tags = [];
            if ($blog['title'] === 'Sample Blog 1') {
                $tags[] = 'sample';
            } elseif ($blog['title'] === 'Sample Blog 2') {
                $tags[] = 'sample';
                $tags[] = 'lorem';
            } elseif ($blog['title'] === 'Sample Blog 3') {
                $tags[] = 'sample';
                $tags[] = 'lorem';
                $tags[] = 'ipsum';
            }

            foreach ($tags as $tagName) {
                $tag = Tag::firstOrCreate(['tag' => $tagName]);
                $blogModel->tags()->attach($tag);
            }
        }
        $blogId = 2;
        $comments = [
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'First single comment.',
                'parent_id' => null,
                'interactions' => 0,
                'created_at' => now()->subDays(3),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'Second single comment.',
                'parent_id' => null,
                'interactions' => 0,
                'created_at' => now()->subDays(2),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'Third single comment. Lorem ipsum venenatis a condimentum vitae sapien pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas sed tempus urna et pharetra pharetra massa massa ultricies mi quis hendrerit dolor magna eget est lorem ipsum dolor sit amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas integer eget aliquet nibh praesent tristique magna sit amet purus gravida quis blandit turpis cursus in hac habitasse platea dictumst quisque sagittis purus sit amet volutpat consequat mauris nunc congue nisi vitae suscipit tellus mauris a diam maecenas sed enim ut sem viverra aliquet eget',
                'parent_id' => null,
                'interactions' => 0,
                'created_at' => now()->subDays(1),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'Comment with 3 sub-comments.',
                'parent_id' => null,
                'interactions' => 3,
                'created_at' => now()->subDays(5),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'First sub-comment.',
                'parent_id' => 4, // Parent ID of the comment with 3 sub-comments
                'interactions' => 0,
                'created_at' => now()->subDays(4),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'Second sub-comment.',
                'parent_id' => 4, // Parent ID of the comment with 3 sub-comments
                'interactions' => 0,
                'created_at' => now()->subDays(3),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'Third sub-comment.',
                'parent_id' => 4, // Parent ID of the comment with 3 sub-comments
                'interactions' => 0,
                'created_at' => now()->subDays(2),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'Fourth single comment.',
                'parent_id' => null,
                'interactions' => 0,
                'created_at' => now()->subDays(10),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'Fifth single comment.',
                'parent_id' => null,
                'interactions' => 0,
                'created_at' => now()->subDays(9),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'Comment with 12 sub-comments.',
                'parent_id' => null,
                'interactions' => 12,
                'created_at' => now()->subDays(15),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'First sub-comment.',
                'parent_id' => 10, // Parent ID of the comment with 12 sub-comments
                'interactions' => 0,
                'created_at' => now()->subDays(14),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'Second sub-comment.',
                'parent_id' => 10, // Parent ID of the comment with 12 sub-comments
                'interactions' => 0,
                'created_at' => now()->subDays(13),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'Third sub-comment.',
                'parent_id' => 10, // Parent ID of the comment with 12 sub-comments
                'interactions' => 0,
                'created_at' => now()->subDays(12),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'Fourth sub-comment.',
                'parent_id' => 10, // Parent ID of the comment with 12 sub-comments
                'interactions' => 0,
                'created_at' => now()->subDays(11),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'Fifth sub-comment.',
                'parent_id' => 10, // Parent ID of the comment with 12 sub-comments
                'interactions' => 0,
                'created_at' => now()->subDays(10),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'Sixth sub-comment.',
                'parent_id' => 10, // Parent ID of the comment with 12 sub-comments
                'interactions' => 0,
                'created_at' => now()->subDays(9),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'Seventh sub-comment.',
                'parent_id' => 10, // Parent ID of the comment with 12 sub-comments
                'interactions' => 0,
                'created_at' => now()->subDays(8),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'Eighth sub-comment.',
                'parent_id' => 10, // Parent ID of the comment with 12 sub-comments
                'interactions' => 0,
                'created_at' => now()->subDays(7),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'Ninth sub-comment.',
                'parent_id' => 10, // Parent ID of the comment with 12 sub-comments
                'interactions' => 0,
                'created_at' => now()->subDays(6),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'Tenth sub-comment.',
                'parent_id' => 10, // Parent ID of the comment with 12 sub-comments
                'interactions' => 0,
                'created_at' => now()->subDays(5),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'Eleventh sub-comment.',
                'parent_id' => 10, // Parent ID of the comment with 12 sub-comments
                'interactions' => 0,
                'created_at' => now()->subDays(4),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'Twelfth sub-comment.',
                'parent_id' => 10, // Parent ID of the comment with 12 sub-comments
                'interactions' => 0,
                'created_at' => now()->subDays(3),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'Comment with 2 sub-comments and 1 single comment.',
                'parent_id' => null,
                'interactions' => 2,
                'created_at' => now()->subDays(20),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'First sub-comment.',
                'parent_id' => 23, // Parent ID of the comment with 2 sub-comments and 1 single comment
                'interactions' => 0,
                'created_at' => now()->subDays(19),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'Second sub-comment.',
                'parent_id' => 23, // Parent ID of the comment with 2 sub-comments and 1 single comment
                'interactions' => 0,
                'created_at' => now()->subDays(18),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'user_id' => $author->id,
                'content' => 'Single comment.',
                'parent_id' => null,
                'interactions' => 0,
                'created_at' => now()->subDays(17),
                'updated_at' => now(),
            ],
        ];
        DB::table('comments')->insert($comments);
    }
}
