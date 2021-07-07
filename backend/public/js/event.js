document.addEventListener("DOMContentLoaded", function() {
    // 投稿ボタンのイベント追加
    const createButton = document.getElementById('create-button');
    createButton.onclick = () => {
        if (confirm("掲示板を作成しますか？")) {
            // 投稿する
        } else {
            return false;
        }
    }
    
    // 掲示板削除ボタンのイベント追加
    const tbodyRaw = document.getElementsByClassName('forum-title');
    const delButtons = document.getElementsByClassName('btn-danger');
    for (let i = 0; i < delButtons.length; i++) {
        delButtons[i].onclick = () => {
            if (confirm(`"${tbodyRaw[i].textContent.trim()}"を削除しますか？`)) {
                // 削除実行
            } else {
                return false;
            }
        }
    }
});
