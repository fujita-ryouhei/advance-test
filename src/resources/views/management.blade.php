<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/management.css') }}">
    <title>Document</title>
</head>

<body>
    <div class="management-content">
        <div class="m-heading">
            <h2>管理システム</h2>
        </div>
        <div class="search-content">
            <form action="/search" method="post" class="s-form">
                @csrf
                <div class="s-form-inputs">
                    <div class="s-form-inputs__group">
                        <div class="__name">
                            <label class="s-form-inputs__label">お名前</label>
                            <div class="s-form-inputs__input">
                                <input type="text" name="name" id="">
                            </div>
                        </div>
                    </div>
                    <div class="s-form-inputs__group">
                        <div class="__gender">
                            <label class="s-form-inputs__label">性別</label>
                        <div class="s-form-inputs__input">
                            <div class="gender">
                                <input type="radio" name="gender" id="gender-0" autocomplete="off" value="男性女性" checked><label for="gender-0">全て</label>
                                <input type="radio" name="gender" id="gender-1" autocomplete="off" value="男性"><label for="gender-1">男性</label>
                                <input type="radio" name="gender" id="gender-2" autocomplete="off" value="女性"><label for="gender-2">女性</label>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="s-form-inputs">
                    <div class="s-form-inputs__group">
                        <label class="s-form-inputs__label">登録日</label>
                        <div class="s-form-inputs__input">
                            <input type="date" name="start_date" id="">
                        </div>
                    </div>
                    <div class="s-form-inputs__group">
                        <label class="s-form-inputs__label">~</label>
                        <div class="s-form-inputs__input">
                            <input type="date" name="end_date" id="">
                        </div>
                    </div>
                </div>

                <div class="s-form-inputs">
                    <div class="s-form-inputs__group">
                        <label class="s-form-inputs__label">メールアドレス</label>
                        <div class="s-form-inputs__input">
                            <input type="email" name="email" id="">
                        </div>
                    </div>
                </div>

                <div class="s-form-inputs__button">
                    <button type="submit" class="__submit">検索</button>
                </div>

                <div class="s-form-inputs__reset">
                    <input type="reset" value="リセット">
                </div>
            </form>
        </div>

        {{ $contacts->links() }}
        <table>
        <tr>
            <th>ID</th>
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>住所</th>
            <th>ご意見</th>
            <th></th>
        </tr>
        @foreach ($contacts as $contact)
            <tr>
                <td>
                    {{$contact['id']}}
                </td>
                <td>
                    {{ $contact['family_name'].$contact['name'] }}
                </td>
                <td>
                    {{ $contact['gender'] }}
                </td>
                <td>
                    {{ $contact['email'] }}
                </td>
                <td>
                    {{ $contact['address'] }}
                </td>
                <td>
                    <?php echo mb_strimwidth($contact['opinion'], 0, 25, '…', 'UTF-8'); ?>
                </td>
                <td>
                    <form action="/delete" method="post" class="delete-form">
                        @method('DELETE')
                        @csrf
                        <div class="delete-form__button">
                            <input type="hidden" name="id" value="{{ $contact['id'] }}">
                            <button type="submit" class="delete-form__button--submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </table>
    </div>
</body>
</html>