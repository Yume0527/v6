<?php

use App\Models\Tweet;
use App\Models\User;

it('has tweet page', function () {
      // ユーザを作成
  $user = User::factory()->create();

  // ユーザを認証
  $this->actingAs($user);

  // Tweetを作成
  $tweet = Tweet::factory()->create();

  // GETリクエスト
  $response = $this->get('/tweets');

    $response->assertStatus(200);
    $response->assertSee($tweet->tweet);
    $response->assertSee($tweet->user->name);
});

it('can search tweets by content keyword', function () {
  $user = User::factory()->create();
  $this->actingAs($user);

  // キーワードを含むツイートを作成
  Tweet::factory()->create([
    'tweet' => 'This is a test tweet',
    'user_id' => $user->id,
  ]);

  // キーワードを含まないツイートを作成
  Tweet::factory()->create([
    'tweet' => 'This is another tweet',
    'user_id' => $user->id,
  ]);

  // キーワード "test" で検索
  $response = $this->get(route('tweets.search', ['keyword' => 'test']));

  $response->assertStatus(200);
  $response->assertSee('This is a test tweet');
  $response->assertDontSee('This is another tweet');
});

it('shows no tweets if no match found', function () {
  $user = User::factory()->create();
  $this->actingAs($user);

  Tweet::factory()->create([
    'tweet' => 'This is a tweet',
    'user_id' => $user->id,
  ]);

  // 存在しないキーワードで検索
  $response = $this->get(route('tweets.search', ['keyword' => 'nonexistent']));

  $response->assertStatus(200);
  $response->assertDontSee('This is a tweet');
  $response->assertSee('No tweets found.');
});

