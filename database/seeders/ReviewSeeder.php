<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Repositories\Review\ReviewRepository;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ReviewSeeder extends Seeder
{

    public $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }


    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        Review::truncate();


        $reviews = [
            "This product is fantastic! It's compact, lightweight, and incredibly easy to use. I've been using it for a while now, and it's still as good as new. Highly recommend!",
            "Unfortunately, this product didn't live up to my expectations. The build quality is subpar, and it stopped working after just a few uses. Disappointed with my purchase.",
            "I'm amazed by the performance of this product! The sound quality is exceptional, and the battery life is impressive. It's perfect for on-the-go use and enhances my listening experience.",
            "This product is a game-changer! It's versatile, durable, and offers great value for the price. I've recommended it to all my friends, and they love it too. Definitely worth buying!",
            "I had high hopes for this product, but I was let down. The design is outdated, and the functionality is lacking. It's not worth the investment, in my opinion.",
            "I'm pleasantly surprised by this product! It's intuitive, reliable, and has exceeded my expectations. I use it every day and couldn't be happier with my purchase.",
            "The customer service for this product is top-notch! They were quick to address my concerns and provided helpful solutions. I'm impressed by their professionalism and dedication.",
            "I'm a long-time user of this product, and it never disappoints! It's reliable, efficient, and has become an essential part of my daily routine. I highly recommend it to everyone.",
            "I've had nothing but problems with this product. It constantly malfunctions, and the customer support is unresponsive. Save yourself the hassle and avoid this product.",
            "This product is a lifesaver! It's helped me stay organized, productive, and on top of my tasks. I don't know how I ever lived without it. Truly a game-changer!",
            "The build quality of this product is exceptional! It's sturdy, well-made, and built to last. I've been using it for months, and it's still as good as new. Highly recommend!",
            "I'm disappointed with the performance of this product. It's slow, glitchy, and doesn't live up to its promises. I expected better quality for the price I paid.",
            "I'm blown away by the features of this product! It's packed with innovative technology and offers endless possibilities. It's definitely worth the investment for anyone looking to upgrade.",
            "This product is a game-changer for my home! It's stylish, functional, and has completely transformed my living space. I've received countless compliments from friends and family.",
            "I'm thoroughly impressed by this product! It's sleek, modern, and performs flawlessly. The attention to detail is evident in every aspect of its design. Highly recommend!",
            "Unfortunately, this product didn't meet my expectations. It's bulky, awkward to use, and the quality is lacking. I regret purchasing it and would not recommend it to others.",
            "I'm amazed by the durability of this product! It's been through a lot of wear and tear, but it still works like a charm. It's definitely built to last and withstands heavy use.",
            "I'm thrilled with my purchase of this product! It's versatile, reliable, and offers great value for the price. I use it every day and couldn't be happier with its performance.",
            "I had high hopes for this product, but it fell short. The design is outdated, and the functionality is subpar. It's not worth the investment, in my opinion.",
            "This product is a game-changer for my business! It's streamlined our operations, increased efficiency, and saved us valuable time and resources. Highly recommend!",
            "I'm disappointed with the customer service for this product. They were unresponsive to my inquiries and provided no solution to my issue. I expected better support.",
            "I'm impressed by the versatility of this product! It's multi-functional, easy to use, and has become an essential part of my daily routine. I highly recommend it to everyone.",
            "The build quality of this product is exceptional! It's sturdy, well-made, and designed to withstand the test of time. I'm confident it will continue to perform well for years to come.",
            "I'm disappointed with the performance of this product. It's unreliable, prone to glitches, and doesn't deliver consistent results. I expected better quality for the price.",
            "This product is a game-changer for my hobby! It's versatile, durable, and offers great value for the price. I've recommended it to all my friends, and they love it too.",
            "I'm amazed by the quality of this product! It's sleek, modern, and performs flawlessly. It's a real standout in my collection, and I couldn't be happier with my purchase.",
            "Unfortunately, this product didn't meet my expectations. The design is clunky, and the functionality is limited. I regret purchasing it and would not recommend it to others.",
            "I'm blown away by the performance of this product! It's fast, efficient, and has completely transformed my workflow. I don't know how I ever lived without it. Highly recommend!",
            "The customer service for this product is outstanding! They were quick to address my concerns and provided excellent support. I'm impressed by their professionalism and dedication.",
            "I'm thrilled with my purchase of this product! It's reliable, easy to use, and has become an essential tool in my everyday life. I highly recommend it to anyone in need of a quality product.",
            "I'm disappointed with the quality of this product. It's flimsy, cheaply made, and doesn't hold up well over time. I expected better craftsmanship for the price I paid.",
            "This product is a game-changer for my health! It's helped me stay active, motivated, and on track with my fitness goals. I've seen incredible results since incorporating it into my routine.",
            "I'm amazed by the durability of this product! It's been through a lot of use, but it still works like a charm. It's definitely built to last and withstands heavy wear and tear.",
            "I'm impressed by the versatility of this product! It's multi-functional, easy to use, and has become an indispensable tool in my daily life. I highly recommend it to everyone.",
            "The build quality of this product is exceptional! It's sturdy, well-made, and designed to withstand frequent use. I'm confident it will continue to perform well for years to come.",
            "I'm disappointed with the performance of this product. It's slow, unreliable, and doesn't deliver the results I was expecting. I expected better quality for the price.",
            "This product is a game-changer for my business! It's efficient, reliable, and has streamlined our operations. I don't know how we ever managed without it. Highly recommend!",
            "I'm impressed by the customer service for this product. They were responsive, helpful, and provided excellent support. I'm confident in their commitment to customer satisfaction.",
            "I'm thrilled with my purchase of this product! It's versatile, durable, and offers great value for the price. I use it every day and couldn't be happier with its performance.",
            "Unfortunately, this product didn't live up to my expectations. The design is outdated, and the functionality is lacking. I regret purchasing it and would not recommend it to others.",
            "I'm amazed by the performance of this product! It's fast, efficient, and has completely transformed my workflow. I don't know how I ever lived without it. Highly recommend!",
            "The build quality of this product is exceptional! It's sturdy, well-made, and designed to last. I've been using it for months now, and it's still as good as new. Highly recommend!",
            "I'm disappointed with the quality of this product. It's flimsy, poorly made, and doesn't hold up well over time. I expected better craftsmanship for the price I paid.",
            "This product is a game-changer for my health! It's helped me stay active, motivated, and on track with my fitness goals. I've seen incredible results since incorporating it into my routine.",
            "I'm amazed by the durability of this product! It's been through a lot of use, but it still works like a charm. It's definitely built to last and withstands heavy wear and tear.",
            "I'm impressed by the versatility of this product! It's multi-functional, easy to use, and has become an indispensable tool in my daily life. I highly recommend it to everyone.",
            "The build quality of this product is exceptional! It's sturdy, well-made, and designed to withstand frequent use. I'm confident it will continue to perform well for years to come.",
            "I'm disappointed with the performance of this product. It's slow, unreliable, and doesn't deliver the results I was expecting. I expected better quality for the price.",
            "This product is a game-changer for my business! It's efficient, reliable, and has streamlined our operations. I don't know how we ever managed without it. Highly recommend!",
            "I'm impressed by the customer service for this product. They were responsive, helpful, and provided excellent support. I'm confident in their commitment to customer satisfaction.",
            "I'm thrilled with my purchase of this product! It's versatile, durable, and offers great value for the price. I use it every day and couldn't be happier with its performance.",
            "Unfortunately, this product didn't live up to my expectations. The design is outdated, and the functionality is lacking. I regret purchasing it and would not recommend it to others.",
            "I'm amazed by the performance of this product! It's fast, efficient, and has completely transformed my workflow. I don't know how I ever lived without it. Highly recommend!",
            "The build quality of this product is exceptional! It's sturdy, well-made, and designed to last. I've been using it for months now, and it's still as good as new. Highly recommend!",
            "I'm disappointed with the quality of this product. It's flimsy, poorly made, and doesn't hold up well over time. I expected better craftsmanship for the price I paid.",
            "This product is a game-changer for my health! It's helped me stay active, motivated, and on track with my fitness goals. I've seen incredible results since incorporating it into my routine.",
            "I'm amazed by the durability of this product! It's been through a lot of use, but it still works like a charm. It's definitely built to last and withstands heavy wear and tear.",
            "I'm impressed by the versatility of this product! It's multi-functional, easy to use, and has become an indispensable tool in my daily life. I highly recommend it to everyone.",
            "The build quality of this product is exceptional! It's sturdy, well-made, and designed to withstand frequent use. I'm confident it will continue to perform well for years to come.",
            "I'm disappointed with the performance of this product. It's slow, unreliable, and doesn't deliver the results I was expecting. I expected better quality for the price.",
            "This product is a game-changer for my business! It's efficient, reliable, and has streamlined our operations. I don't know how we ever managed without it. Highly recommend!",
            "I'm impressed by the customer service for this product. They were responsive, helpful, and provided excellent support. I'm confident in their commitment to customer satisfaction.",
            "I'm thrilled with my purchase of this product! It's versatile, durable, and offers great value for the price. I use it every day and couldn't be happier with its performance.",
            "Unfortunately, this product didn't live up to my expectations. The design is outdated, and the functionality is lacking. I regret purchasing it and would not recommend it to others.",
            "I'm amazed by the performance of this product! It's fast, efficient, and has completely transformed my workflow. I don't know how I ever lived without it. Highly recommend!",
            "The build quality of this product is exceptional! It's sturdy, well-made, and designed to last. I've been using it for months now, and it's still as good as new. Highly recommend!",
            "I'm disappointed with the quality of this product. It's flimsy, poorly made, and doesn't hold up well over time. I expected better craftsmanship for the price I paid.",
            "This product is a game-changer for my health! It's helped me stay active, motivated, and on track with my fitness goals. I've seen incredible results since incorporating it into my routine.",
            "I'm amazed by the durability of this product! It's been through a lot of use, but it still works like a charm. It's definitely built to last and withstands heavy wear and tear.",
            "I'm impressed by the versatility of this product! It's multi-functional, easy to use, and has become an indispensable tool in my daily life. I highly recommend it to everyone.",
            "The build quality of this product is exceptional! It's sturdy, well-made, and designed to withstand frequent use. I'm confident it will continue to perform well for years to come.",
            "I'm disappointed with the performance of this product. It's slow, unreliable, and doesn't deliver the results I was expecting. I expected better quality for the price.",
            "This product is a game-changer for my business! It's efficient, reliable, and has streamlined our operations. I don't know how we ever managed without it. Highly recommend!",
            "I'm impressed by the customer service for this product. They were responsive, helpful, and provided excellent support. I'm confident in their commitment to customer satisfaction.",
            "I'm thrilled with my purchase of this product! It's versatile, durable, and offers great value for the price. I use it every day and couldn't be happier with its performance.",
            "Unfortunately, this product didn't live up to my expectations. The design is outdated, and the functionality is lacking. I regret purchasing it and would not recommend it to others.",
            "I'm amazed by the performance of this product! It's fast, efficient, and has completely transformed my workflow. I don't know how I ever lived without it. Highly recommend!",
            "The build quality of this product is exceptional! It's sturdy, well-made, and designed to last. I've been using it for months now, and it's still as good as new. Highly recommend!",
            "I'm disappointed with the quality of this product. It's flimsy, poorly made, and doesn't hold up well over time. I expected better craftsmanship for the price I paid.",
            "This product is a game-changer for my health! It's helped me stay active, motivated, and on track with my fitness goals. I've seen incredible results since incorporating it into my routine.",
            "I'm amazed by the durability of this product! It's been through a lot of use, but it still works like a charm. It's definitely built to last and withstands heavy wear and tear.",
            "I'm impressed by the versatility of this product! It's multi-functional, easy to use, and has become an indispensable tool in my daily life. I highly recommend it to everyone.",
            "The build quality of this product is exceptional! It's sturdy, well-made, and designed to withstand frequent use. I'm confident it will continue to perform well for years to come.",
            "I'm disappointed with the performance of this product. It's slow, unreliable, and doesn't deliver the results I was expecting. I expected better quality for the price.",
            "This product is a game-changer for my business! It's efficient, reliable, and has streamlined our operations. I don't know how we ever managed without it. Highly recommend!",
            "I'm impressed by the customer service for this product. They were responsive, helpful, and provided excellent support. I'm confident in their commitment to customer satisfaction.",
            "I'm thrilled with my purchase of this product! It's versatile, durable, and offers great value for the price. I use it every day and couldn't be happier with its performance.",
            "Unfortunately, this product didn't live up to my expectations. The design is outdated, and the functionality is lacking. I regret purchasing it and would not recommend it to others.",
            "I'm amazed by the performance of this product! It's fast, efficient, and has completely transformed my workflow. I don't know how I ever lived without it. Highly recommend!",
            "The build quality of this product is exceptional! It's sturdy, well-made, and designed to last. I've been using it for months now, and it's still as good as new. Highly recommend!",
            "I'm disappointed with the quality of this product. It's flimsy, poorly made, and doesn't hold up well over time. I expected better craftsmanship for the price I paid.",
            "This product is a game-changer for my health! It's helped me stay active, motivated, and on track with my fitness goals. I've seen incredible results since incorporating it into my routine.",
            "I'm amazed by the durability of this product! It's been through a lot of use, but it still works like a charm. It's definitely built to last and withstands heavy wear and tear.",
            "I'm impressed by the versatility of this product! It's multi-functional, easy to use, and has become an indispensable tool in my daily life. I highly recommend it to everyone.",
            "The build quality of this product is exceptional! It's sturdy, well-made, and designed to withstand frequent use. I'm confident it will continue to perform well for years to come.",
            "I'm disappointed with the performance of this product. It's slow, unreliable, and doesn't deliver the results I was expecting. I expected better quality for the price.",
            "This product is a game-changer for my business! It's efficient, reliable, and has streamlined our operations. I don't know how we ever managed without it. Highly recommend!",
            "I'm impressed by the customer service for this product. They were responsive, helpful, and provided excellent support. I'm confident in their commitment to customer satisfaction.",
            "I'm thrilled with my purchase of this product! It's versatile, durable, and offers great value for the price. I use it every day and couldn't be happier with its performance.",
            "Unfortunately, this product didn't live up to my expectations. The design is outdated, and the functionality is lacking. I regret purchasing it and would not recommend it to others.",
        ];

        for ($i = 0; $i < count($reviews); $i++) {

            $product_id = Product::all()->random()->id;
            $review = $reviews[$i];
            $review_sentiment =  $this->reviewRepository->analyseReview($review);

            Review::create([
                'customer_id' => 1,
                'product_id' => $product_id,
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'rating' => '5',
                'review_text' => $review,
                'review_sentiment' => $review_sentiment
            ]);
        }
    }
}
