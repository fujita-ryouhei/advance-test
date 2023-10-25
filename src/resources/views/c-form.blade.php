<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/c-form.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="wrap">
        <div class="contents">
            <h2>お問い合わせ</h2>
            <form action="/contacts/confirm" method="post" class="c-form">
                @csrf
                <div class="c-form-inputs">
                    <!-- 氏名 -->
                    <div class="c-form-inputs__group">
                        <label class="c-form-inputs__label">お名前<span class="__required">※</span></label>
                        <div class="c-form-inputs__input">
                            <div class="names__input">
                                <div class="family_name__input">
                                    <input type="text" name="family_name" id="family_name" autocomplete="family_name" value="{{ old('family_name') }}">
                                    <div class="c-form-inputs__error-message" data-js-error-message="family_name">
                                        @error('family_name')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="c-form-inputs__caption"><small>例）山田</small></div>
                                </div>
                                <div class="name__input">
                                    <input type="text" name="name" id="name" autocomplete="name" value="{{ old('name') }}">
                                    <div class="c-form-inputs__error-message" data-js-error-message="name">
                                        @error('name')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="c-form-inputs__caption"><small>例）太郎</small></div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <!-- 性別 -->
                    <div class="c-form-inputs__group--checkbox">
                        <label class="c-form-inputs__label">性別<span class="__required">※</span></label>
                        <div class="c-form-inputs__input">
                            <div class="__gender">
                                <input type="radio" name="gender" id="gender-1" autocomplete="off" value="男性" checked><label for="gender-1">男性</label>
                                <input type="radio" name="gender" id="gender-2" autocomplete="off" value="女性"><label for="gender-2">女性</label>
                            </div>
                            <div class="c-form-inputs__error-message" data-js-error-message="email">
                                @error('gender')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
            
                    <!-- メールアドレス -->
                    <div class="c-form-inputs__group">
                        <label class="c-form-inputs__label">メールアドレス<span class="__required">※</span></label>
                        <div class="c-form-inputs__input">
                            <input type="email" name="email" id="email" required pattern="^[a-zA-Z0-9-_.]+@[a-zA-Z0-9-_.]+$"
                                title="メールアドレスの形式で入力してください" autocomplete="off" value="{{ old('email') }}">
                            <div class="c-form-inputs__error-message" data-js-error-message="email"></div>
                            <div class="c-form-inputs__caption"><small>例）test@example.com</small>
                                @error('email')
                                {{ $message }}
                                @enderror</div>
                        </div>
                    </div>
            
                    <!-- 郵便番号,住所 -->
                    <div class="c-form-inputs__group">
                        <label class="c-form-inputs__label">郵便番号<span class="__required">※</span></label>
                        <div class="c-form-inputs__input">
                            <label for="">〒</label>
                            <input type="text" class="js-input-number" inputmode="numeric" name="postal"
                                onKeyUp="AjaxZip3.zip2addr(this, '', 'address', 'address');" value="{{ old('postal') }}">
                            <div class="c-form-inputs__error-message" data-js-error-message="email">
                                @error('postal')
                                {{ $message }}
                                @enderror
                            </div>
                            <div class="c-form-inputs__caption"><small>例）123-4567</small></div>
                        </div>
                    </div>
                    <div class="c-form-inputs__group">
                        <label class="c-form-inputs__label">住所<span class="__required">※</span></label>
                        <div class="c-form-inputs__input">
                            <input type="text" name="address" value="{{ old('address') }}">
                            <div class="c-form-inputs__error-message" data-js-error-message="email"></div>
                            <div class="c-form-inputs__caption"><small>例）東京都渋谷区千駄ヶ谷1-2-3</small></div>
                        </div>
                    </div>
                    <script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>
                    <script>
                        const inputNumbers = document.querySelectorAll('.js-input-number');

                        for (const inputNumber of inputNumbers) {
                            inputNumber.addEventListener('input', convert_input_number);
                        }

                        function convert_input_number(e) {
                            let val = this.value;
                            // 全角数字を半角数字に変換
                            val = val.replace(/[０-９]/g, function (s) {
                                return '０１２３４５６７８９'.indexOf(s);
                            });
                            // 半角数字以外を除去
                            val = val.replace(/[^0-9]'-'/g, '');
                            this.value = val;
                        }
                    </script>
            
                    <!-- 建物名 -->
                    <div class="c-form-inputs__group">
                        <label class="c-form-inputs__label">建物名</label>
                        <div class="c-form-inputs__input">
                            <input type="text" name="building" id="building" autocomplete="off" value="{{ old('building') }}">
                            <div class="c-form-inputs__error-message" data-js-error-message="email">
                                @error('building')
                                {{ $message }}
                                @enderror
                            </div>
                            <div class="c-form-inputs__caption"><small>例）千駄ヶ谷マンション101</small></div>
                        </div>
                    </div>
            
                    <!-- ご意見 -->
                    <div class="c-form-inputs__group">
                        <label class="c-form-inputs__label">ご意見<span class="__required">※</span></label>
                        <div class="c-form-inputs__input">
                            <textarea type="text" name="opinion" id="opinion" autocomplete="off">{{ old('opinion') }}</textarea>
                            <div class="c-form-inputs__error-message" data-js-error-message="email">
                                @error('opinion')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
            
                    <!-- ボタン -->
                    <div class="c-form-inputs__button">
                        <button type="submit" class="__submit">確認</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>