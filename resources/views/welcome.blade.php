@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6">
                <div class="card border-primary">
                    <div class="card-body">
                        <h1>はてなブックマーク全削除</h1>
                        <p class="lead">全削除機能がいつまでも使えないままなので代わりに削除するツール。躊躇なく削除されるので注意。</p>
                        <p>
                            <a href="http://bookmark.hatenastaff.com/entry/2017/11/24/173417" target="_blank"
                               rel="noreferrer noopener">ブックマークの全削除が行えない不具合が発生しています -
                                はてなブックマーク開発ブログ</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-primary">
                    <div class="card-body">
                        <h2>使い方</h2>

                        <h3 class="border-bottom">ユーザー登録</h3>
                        <p>
                            <a href="{{ route('login') }}" class="btn btn-primary">はてなアカウントでログイン（OAuth認証）</a>
                        </p>
                        <p>
                            削除まで行うのでscopeは全部（read_public, write_public, read_private, write_private）
                        </p>

                        <h3 class="border-bottom">手動削除</h3>
                        <p>
                            <button class="btn btn-primary">最近の20件を削除</button>
                            で20件分削除。
                            {{ config('hatena.delete_days') }}日以内のブックマークは除くので毎日のブックマークが多すぎる場合は削除されない。そういう人は使わない想定。
                        </p>

                        <h3 class="border-bottom">自動削除</h3>
                        <p>
                            自分しか使わない想定なので<a href="https://www.pixiv.net/fanbox/creator/762638" target="_blank"
                                            rel="noreferrer noopener">pixivFANBOX</a>の支援者限定機能。設定ページでpixivFANBOXで取得した特典キーを入力したユーザーのみ自動削除が有効。
                            {{ config('hatena.delete_days') }}日以内の条件は同じ。1日1回程度のペースで20件分から自動削除。
                            3日で20件以下のユーザーなら自動で全部削除される設定。
                            この辺りは後で調整されるかもしれない。
                        </p>

                        <h3 class="border-bottom">通知</h3>
                        <p>削除されたURLは通知に一時的に残る。これも{{ config('hatena.delete_days') }}日後には削除される。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
