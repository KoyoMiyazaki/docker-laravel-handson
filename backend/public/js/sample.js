const tbodyRaw = document.getElementsByClassName('forum-title');
// console.log(tbodyRaw[0].textContent);

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
