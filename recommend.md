# 建議事項
1. 背景圖bg1.jpg太大會影響頁面的載入速度，適度的縮小解析度(72dpi)，及調整檔案壓縮比。
2. 首頁檔名改為index.php
3. 上下頁的連結儘量使用相對連結，這樣檔名變動時，不用再去更改連結文字
```
<a href="perpetual_shihchen.php?month=......
    改成
<a href="?month=
```
4. ./css/google.css 是失效的連結，應該補回檔案或把這個設定移除    