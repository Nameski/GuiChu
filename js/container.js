/* 点击按钮，下拉菜单在 显示/隐藏 之间切换 */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}
function myFunction1() {
    document.getElementById("myDropdown").classList.toggle("show");
    a = document.getElementById("myDropdown");
    a.onmouseleave = function (e) {
        myDropdown.classList.remove('show');
    }
}
// 点击下拉菜单以外区域隐藏
//        window.onclick = function(e) {
//            if (!e.target.matches('.dropbtn')) {
//                var myDropdown = document.getElementById("myDropdown");
//                if (myDropdown.classList.contains('show')) {
//                    myDropdown.classList.remove('show');
//                }
//            }
//        }